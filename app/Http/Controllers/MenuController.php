<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\File;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::latest()->paginate(20);
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $file = $request->file('image');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'Menu_img';
        $file->move($tujuan_upload, $nama_file);
        Menu::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $nama_file,      
        ]);
        return redirect()->route('menu.index')->with('success','Data Menu Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        $categories = Category::all();
        $menus = Menu::all();
        return view('menu.edit', compact('menu', 'categories', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto menjadi opsional
        ]);
        
        // Data yang akan diupdate
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
        ];

        // Jika ada file foto baru yang diupload
        if ($request->hasFile('image')) {
            if($menu->image){
                File::delete('Menu_img/'.$menu->image);
            }
            $file = $request->file('image');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'Menu_img';
            $file->move($tujuan_upload, $nama_file);
            $data['image'] = $nama_file;
        }

        // Update data produk
        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success','Menu successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        if($menu->image){
            File::delete('Menu_img/'.$menu->image);
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('success','Menu successfully deleted');
    }
}
