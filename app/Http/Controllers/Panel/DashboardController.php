<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function adminDashboard()
{
    $totalOrders = Card::count(); // Count all orders
    $totalEarnings = Card::join('subscription_types', 'cards.subscription_type_id', '=', 'subscription_types.id')
                  ->sum('subscription_types.price');

    $totalUsers = User::count(); // Count all registered users

    return view('pages.admin.dashboard.dashboard', compact('totalOrders', 'totalEarnings', 'totalUsers'));
}

    public function userDashboard()
    {
        $userName = Auth::user()->firstname; // Assuming the user's name is stored in the 'name' column

        return view('pages.user.dashboard', compact('userName'));
    }
}
