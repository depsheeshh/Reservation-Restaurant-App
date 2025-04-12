<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::latest()->paginate(20);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'image' => 'required',
        ]);
        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'Employees_img';
        $file->move($tujuan_upload, $nama_file);
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'image' => $nama_file,
        ]);
        return redirect()->route('employee.index')->with('success','Employee Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto menjadi opsional
        ]);
        
        // Data yang akan diupdate
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ];

        // Jika ada file foto baru yang diupload
        if ($request->hasFile('image')) {
            if($employee->image){
                File::delete('Employees_img/'.$employee->image);
            }
            $file = $request->file('image');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'Employees_img';
            $file->move($tujuan_upload, $nama_file);
            $data['image'] = $nama_file;
        }

        // Update data produk
        $employee->update($data);

        return redirect()->route('employee.index')
            ->with('success','Employee successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        if($employee->image){
            File::delete('Employees_img/'.$employee->image);
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee Deleted Successfully');
    }
}
