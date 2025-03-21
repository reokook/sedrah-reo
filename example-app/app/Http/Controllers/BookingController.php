<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // عرض نموذج الحجز
    public function create()
    {
        $barbers = User::where('role', 'barber')->get(); // الحصول على قائمة الحلاقين
        return view('bookings.create', compact('barbers'));
    }

    // حفظ الحجز
    public function store(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:users,id',
            'booking_date' => 'required|date',
        ]);  

        Booking::create([
            'user_id' => auth()->id(),
            'barber_id' => $request->barber_id,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'تم الحجز بنجاح!');
    }

    // عرض الحجوزات للمشرفين
    public function index()
    {
        $bookings = Booking::with(['user', 'barber'])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // تحديث حالة الحجز
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.bookings.index')->with('success', 'تم تحديث الحجز بنجاح!');
    }
}

