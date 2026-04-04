<?php

namespace App\Http\Controllers\Admin; // لازم يكون Admin

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public function index(Request $request)
{
    $perPage = $request->get('per_page', 10);

    $bookings = \App\Models\Booking::latest()->paginate($perPage);

    return response()->json($bookings);
}

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function loginSubmit()
    {

        $totalBookings = Booking::count();

        $contacted = Booking::where('status', 'contacted')->count();

        $completed = Booking::where('status', 'completed')->count();

        $thisMonth = Booking::whereMonth('created_at', now()->month)->count();
        $pending = Booking::where('status', 'pending')->count();
        $pendingRate = $totalBookings > 0
            ? round(($pending / $totalBookings) * 100)
            : 0;
        $contactRate = $totalBookings > 0
            ? round(($completed / $totalBookings) * 100)
            : 0;

        return view('Admin.index', compact(
            'totalBookings',
            'contacted',
            'completed',
            'thisMonth',
            'contactRate',
            'pending',
            'pendingRate'
        ));
    }
    public function logout()
    {

        Auth::logout();

        return redirect()->route('admin.login');

    }


}
