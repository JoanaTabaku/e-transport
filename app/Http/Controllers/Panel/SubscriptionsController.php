<?php

namespace App\Http\Controllers\Panel;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\SubscriptionType;
use App\Models\Card;
use App\Http\Controllers\Controller;
use App\Services\PayPalService;

class SubscriptionsController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function index()
    {
        $subscriptions = SubscriptionType::all();
        return view('pages.admin.subscriptions.subscriptions', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = SubscriptionType::find($id);
        $roles = Role::all();

        if (!$subscription) {
            return redirect()->route('admin.subscriptions')->with('error', 'Subscription not found.');
        }

        return view('pages.admin.subscriptions.single', compact('subscription', 'roles'));
    }

    public function new()
    {
        $roles = Role::all();
        return view('pages.admin.subscriptions.new', compact('roles'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'duration_in_days' => 'required|integer',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $data = $request->except('_token');
        SubscriptionType::create($data);

        return redirect()->route('admin.subscriptions')->with('success', 'Subscription created successfully.');
    }

    public function edit($id)
    {
        $subscription = SubscriptionType::find($id);
        $roles = Role::all();

        if (!$subscription) {
            return redirect()->route('admin.subscriptions')->with('error', 'Subscription not found.');
        }

        return view('pages.admin.subscriptions.edit', compact('subscription', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $subscription = SubscriptionType::find($id);

        if (!$subscription) {
            return redirect()->route('admin.subscriptions')->with('error', 'Subscription not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'duration_in_days' => 'required|integer',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $data = $request->except('_token');
        $subscription->update($data);

        return redirect()->route('admin.subscriptions')->with('success', 'Subscription updated successfully.');
    }

    public function delete($id)
    {
        $subscription = SubscriptionType::find($id);

        if (!$subscription) {
            return redirect()->route('admin.subscriptions')->with('error', 'Subscription not found.');
        }
        $subscription->delete();

        return redirect()->route('admin.subscriptions')->with('success', 'Subscription deleted successfully.');
    }

    // user methods
    public function userSubscriptions()
    {
        $lastBoughtSubscriptionId = null;
        $subscriptions = SubscriptionType::where('role_id', auth()->user()->role_id)->get();
        $lastBoughtCard = auth()->user()->cards()->latest()->first();

        if ($lastBoughtCard && $lastBoughtCard->status === 'active') {
            $lastBoughtSubscriptionId = $lastBoughtCard->subscriptionType->id;
        }

        return view('pages.user.subscriptions.subscriptions', compact('subscriptions', 'lastBoughtSubscriptionId'));
    }

    public function purchaseSubscription($subscriptionId)
    {
        $subscription = SubscriptionType::find($subscriptionId);

        // Use PayPalService to create a payment and redirect to PayPal
        $approvalUrl = $this->paypalService->createOrder($subscription);
        return redirect($approvalUrl);
    }

    public function handlePaymentCallback($subscriptionId)
    {
        if (!$subscriptionId) {
            return redirect()->route('user.subscriptions')->with('error', 'Subscription not found.');
        }

        // disable the last active card
        $lastBoughtCard = auth()->user()->cards()->latest()->first();
        if ($lastBoughtCard && $lastBoughtCard->status === 'active') {
            $lastBoughtCard->update(['status' => 'disabled']);
        }

        // create a new card
        $subscription = SubscriptionType::find($subscriptionId);
        $card = Card::create([
            'serial_number' => uniqid(),
            'start_date' => now(),
            'end_date' => now()->addDays($subscription->duration_in_days),
            'status' => 'active',
            'user_id' => auth()->id(),
            'subscription_type_id' => $subscription->id,
        ]);

        return redirect()->route('user.subscriptions')->with('success', 'Subscription purchased successfully. A new virtual card has been created.');
    }

}
