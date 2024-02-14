<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('pages.admin.dashboard.dashboard');
    }

    public function userDashboard()
    {
        return view('pages.user.dashboard');
    }
}
