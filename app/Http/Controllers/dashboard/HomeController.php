<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $advertisements = Advertisement::where('approved', true)->orderBy('created_at', 'desc')->limit(15)->get();

        return view('store.home')->with(['categories' => Category::all(), 'advertisements' => $advertisements]);
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}