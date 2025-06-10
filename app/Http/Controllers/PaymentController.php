<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_item;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::latest()->paginate(20);
        $orders = Order::all();
        return view('payment.index', compact('payments', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $orders = Order::all();
        return view('payment.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        //
        $request->validate([
            'order_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
        Payment::create([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);
        return redirect()->route('payment.index')->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        $orders = Order::all();
        return view('payment.edit', compact('payment', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
        $request->validate([
            'order_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
        
        // Data yang akan diupdate
        $data = [
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'status' => $request->status,
        ];


        // Update data produk
        $payment->update($data);

        return redirect()->route('payment.index')
            ->with('success','Payment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
        $payment->delete();
        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully');
    }
}
