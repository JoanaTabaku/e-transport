<?php

namespace App\Http\Controllers\Panel;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\SubscriptionType;
use App\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{
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
}
