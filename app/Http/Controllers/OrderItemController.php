<?php

namespace App\Http\Controllers;

use App\Models\Order_item;
use App\Models\Order;
use App\Models\Menu;
use App\Http\Requests\StoreOrder_itemRequest;
use App\Http\Requests\UpdateOrder_itemRequest;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_items = Order_item::latest()->paginate(20);
        return view('order_item.index', compact('order_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $menus = Menu::all();
        return view('order_item.create', compact('orders', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrder_itemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_itemRequest $request)
{
    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Cari menu yang dipilih
    $menu = Menu::findOrFail($request->menu_id);
    // Hitung harga berdasarkan jumlah
    $price = $menu->price * $request->quantity;

    // Hitung diskon jika quantity >= 3
    $discount = ($request->quantity >= 3) ? ($price * 0.1) : 0;
    $final_price = $price - $discount;

    // Simpan item order
    $order_item = Order_item::create([
        'order_id' => $request->order_id,
        'menu_id' => $request->menu_id,
        'quantity' => $request->quantity,
        'price' => $price,
        'discount' => $discount,
        'final_price' => $final_price,
    ]);

    // Update harga total order
    $this->calculateTotalPrice($request->order_id);

    return redirect()->route('order_item.index')->with('success', 'Data Order Item Berhasil Disimpan');
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_item $order_item)
    {
        $orders = Order::all();
        $menus = Menu::all();
        return view('order_item.edit', compact('order_item', 'menus', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_itemRequest  $request
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_itemRequest $request, Order_item $order_item)
{
    $request->validate([
        'order_id' => 'required',
        'menu_id' => 'required',
        'quantity' => 'required',
        'price' => 'required',
    ]);

    // Cari menu dan hitung harga berdasarkan kuantitas
    $menu = Menu::findOrFail($request->menu_id);
    $price = $menu->price * $request->quantity;

    // Hitung diskon jika kuantitas >= 3
    $discount = ($request->quantity >= 3) ? ($price * 0.1) : 0;
    $final_price = $price - $discount;

    // Update data order item
    $order_item->update([
        'order_id' => $request->order_id,
        'menu_id' => $request->menu_id,
        'quantity' => $request->quantity,
        'price' => $price,
        'discount' => $discount,
        'final_price' => $final_price,
    ]);

    // Update harga total order
    $this->calculateTotalPrice($request->order_id);

    return redirect()->route('order_item.index')->with('success', 'Order Item successfully updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_item $order_item)
    {
        // Get the associated order id to recalculate total
        $order_id = $order_item->order_id;

        // Delete the order item
        $order_item->delete();

        // Recalculate total price in the order after deletion
        $this->calculateTotalPrice($order_id);

        return redirect()->route('order_item.index')->with('success', 'Order Item successfully deleted');
    }

    /**
     * Recalculate total price and discount for the given order.
     *
     * @param  int  $order_id
     * @return void
     */
    public function calculateTotalPrice($order_id)
    {
        $order = Order::findOrFail($order_id);

        // Calculate total price and total discount
        $total_price = $order->order_item()->sum('final_price');
        $total_discount = $order->order_item()->sum('discount');
        $final_price = $total_price - $total_discount;

        // Update the order with new totals
        $order->update([
            'total_price' => $total_price,
            'discount' => $total_discount,
            'final_price' => $final_price
        ]);
    }
}
