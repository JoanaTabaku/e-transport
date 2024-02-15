<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\SubscriptionType;
use App\Http\Controllers\Controller;


class SubscriptionsController extends Controller
{
    public function index()
    {
        $subscriptions = SubscriptionType::all();
        return view('panel.subscriptions.index', compact('subscriptions'));
    }

    public function new()
    {
        return view('panel.subscriptions.new');
    }


}
