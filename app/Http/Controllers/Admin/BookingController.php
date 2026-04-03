<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $patientData = [
                'name' => $request->full_name ?? 'غير محدد',
                'age' => $request->age ?? 'غير محدد',
                'phone' => $request->phone ?? 'غير محدد',
                'apply_date' => now()->format('Y-m-d H:i'),
            ];

            Mail::to('fayez.mona123@gmail.com')->send(new BookingMail($patientData));
            // إرسال الإيميل
            Mail::to('fayez.mona123@gmail.com')->send(new BookingMail($patientData));

            return response()->json([
                'message' => 'Success'
            ]);
        }
    }
    public function weeklyStats()
    {
        $data = \App\Models\Booking::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($data);
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
