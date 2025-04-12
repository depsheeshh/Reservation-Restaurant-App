<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(20);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $reservations = Reservation::all();
        $users = User::all();
        return view('order.create', compact('reservations', 'users'));
    }

    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'nullable|exists:users,id',
        'reservation_id' => 'required|exists:reservations,id',
        'order_name' => 'required',
        'total_price' => 'required|numeric',
        'status' => 'required',
        'discount' => 'required|numeric|min:0|max:100',
    ]);

    $finalPrice = $request->total_price - ($request->total_price * ($request->discount / 100));

    Order::create([
        'user_id' => $request->user_id,
        'reservation_id' => $request->reservation_id,
        'order_name' => $request->order_name,
        'total_price' => $request->total_price,
        'status' => $request->status,
        'discount' => $request->discount,
        'final_price' => round($finalPrice),
    ]);

    return redirect()->route('order.index')->with('success', 'Order created successfully');
}


    public function edit(Order $order)
    {
        $reservations = Reservation::all();
        $users = User::all();
        return view('order.edit', compact('order', 'reservations', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'order_name' => 'required',
            'total_price' => 'required|numeric',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
            'discount' => 'required|numeric|min:0|max:100',
        ]);
        
        // Perhitungan final price setelah diskon
        $finalPrice = $request->total_price - ($request->total_price * ($request->discount / 100));
        
        // Memperbarui data order dengan nilai yang telah diperbarui
        $order->update([
            'reservation_id' => $request->reservation_id,
            'order_name' => $request->order_name,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'discount' => $request->discount,
            'final_price' => round($finalPrice, 2), // Membulatkan hasil final price
        ]);
        
        return redirect()->route('order.index')->with('success', 'Order successfully updated');
    }
    
    

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order deleted successfully');
    }
}
