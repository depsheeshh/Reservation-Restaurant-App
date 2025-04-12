<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = Table::latest()->paginate(20);
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        //
        $request->validate([
            'table_number' => 'required',
            'capacity' => 'required',
            'status' => 'required',
        ]);
        Table::create([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,     
            'status' => $request->status,
        ]);
        return redirect()->route('table.index')->with('success','Table Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
        return view('table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTableRequest  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        //
        $request->validate([
            'table_number' => 'required',
            'capacity' => 'required',
            'status' => 'required',
        ]);
        
        $data = [
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ];


        // Update data produk
        $table->update($data);

        return redirect()->route('table.index')
            ->with('success','Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
        $table->delete();
        return redirect()->route('table.index')->with('success','Table Deleted Successfully');
    }
}
