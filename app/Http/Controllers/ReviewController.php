<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Menu;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::latest()->paginate(20);
        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $reviews = Review::latest()->paginate(20);
        $menus = Menu::all();
        return view('review.create', compact('reviews', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'menu_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);
        Review::create([
            'name' => $request->name,
            'menu_id' => $request->menu_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        return redirect()->route('review.index')->with('success','Review successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
        $reviews = Review::latest()->paginate(20);
        $menus = Menu::all();
        return view('review.edit', compact('review', 'menus', 'reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
        $request->validate([
            'name' => 'required',
            'menu_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);
        
        // Data yang akan diupdate
        $data = [
            'name' => $request->name,
            'menu_id' => $request->menu_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ];


        // Update data produk
        $review->update($data);

        return redirect()->route('review.index')
            ->with('success','Review successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
        $review->delete();
        return redirect()->route('review.index')->with('success','Review successfully deleted');
    }
}
