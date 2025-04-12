<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::latest()->paginate(20);
        return view('reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tables = Table::all();
        $users = User::all();
        return view('reservation.create', compact('tables', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        //
        $request->validate([
            'table_number' => 'required',
            'user_id' => 'required',
            'reservation_name' => 'required',
            'reservation_date' => 'required',
            'status' => 'required',
        ]);
        Reservation::create([
            'table_number' => $request->table_number,
            'user_id' => $request->user_id,
            'reservation_name' => $request->reservation_name,
            'reservation_date' => $request->reservation_date,
            'status' => $request->status,
        ]);
        return redirect()->route('reservation.index')->with('success','Reservation Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
        $tables = Table::all();
        $users = User::all();
        $reservations = Reservation::all();
        return view('reservation.edit', compact('reservation', 'tables', 'users', 'reservations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
        $request->validate([
            'table_number' => 'required',
            'user_id' => 'required',
            'reservation_name' => 'required',
            'reservation_date' => 'required',
            'status' => 'required',
        ]);
        
        // Data yang akan diupdate
        $data = [
            'table_number' => $request->table_number,
            'user_id' => $request->user_id,
            'reservation_name' => $request->reservation_name,
            'reservation_date' => $request->reservation_date,
            'status' => $request->status,
        ];


        // Update data produk
        $reservation->update($data);

        return redirect()->route('reservation.index')
            ->with('success','Reservation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success','Reservation Deleted Successfully');
    }
}
