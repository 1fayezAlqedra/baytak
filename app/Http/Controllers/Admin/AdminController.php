<?php

namespace App\Http\Controllers\Admin; // لازم يكون Admin

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
        public function index()
    {
        return response()->json(
            Booking::orderBy('created_at', 'desc')->get()
        );

    }

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function loginSubmit()
    {

        return view('admin.index');

    }
    public function logout()
    {

        Auth::logout();

        return redirect()->route('admin.login');

    }

}
