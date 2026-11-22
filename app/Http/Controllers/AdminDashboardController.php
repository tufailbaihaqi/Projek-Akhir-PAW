<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    // Gambar 2.3: Halaman Dashboard Admin (Reservasi & Operasional)
    public function dashboard(Request $request)
    {
        $date = $request->input('date', now()->toDateString());
        $search = $request->input('search');

        $query = Booking::with('service')->whereDate('booking_date', $date);

        if ($search) {
            $operator = DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $operator) {
                $q->where('customer_name', $operator, "%{$search}%")
                  ->orWhere('customer_phone', $operator, "%{$search}%");
            });
        }

        $bookings = $query->orderBy('time_slot')->get();
        $totalReservations = Booking::whereDate('booking_date', $date)->where('status', '!=', 'canceled')->count();
        $totalCanceled = Booking::whereDate('booking_date', $date)->where('status', 'canceled')->count();

        return view('admin.dashboard', compact('bookings', 'totalReservations', 'totalCanceled', 'date', 'search'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => ['required', 'in:pending,confirmed,completed,canceled'],
            'payment_status' => ['required', 'in:unpaid,paid,refunded'],
        ]);

        $booking->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'Status reservasi pelanggan berhasil diperbarui.');
    }
}
