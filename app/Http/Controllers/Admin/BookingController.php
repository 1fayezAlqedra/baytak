<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function showBookingForm()
    {

        return view('welcome');

    }



    public function submitBooking(Request $request)
    { {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string',
                'challenge' => 'required|string',
                'goals' => 'required|string',
                'contact_method' => 'required|string',
            ]);

            if ($request->contact_method === 'other') {
                $validated['contact_method'] = $request->otherContactMethod;
            }

            Booking::create($validated);

            return response()->json([
                'message' => 'Success'
            ]);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'booking' => $booking
        ]);
    }
}
