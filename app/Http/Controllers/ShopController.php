<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $min_budget = $request->min_budget;
        $max_budget = $request->max_budget;

        $keyword = $request->keyword;

        if($request->category !== null) {
            $shops = Shop::where('category_id', $request->category)->sortable()->paginate(15);
            $total_count = Shop::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } else if ($min_budget !== null || $max_budget !== null){
            $query = Shop::query();
            if($min_budget !== null){
                $query->where('min_budget', '>=', $min_budget);
            }
            if($max_budget !== null){
                $query->where('max_budget', '<=', $max_budget);
            }
            $shops = $query->sortable()->paginate(15);
            $total_count = $shops->total();
            $category = null;
            $keyword= null;

        } else if ($keyword !== null){
            $shops = Shop::where('name', 'like', "%{$keyword}%")->sortable()->paginate(15);
            $total_count = $shops->total();
            $category = null;
        } else {
            $shops = Shop::sortable()->paginate(15);
            $total_count = "";
            $category = null; 
        }
        $categories = Category::all();

        return view('shops.index', compact('shops', 'category', 'categories', 'total_count', 'keyword', 'min_budget', 'max_budget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('shops.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->name = $request->input('name');
        $shop->description = $request->input('description');
        $shop->min_budget = $request->input('min_budget');
        $shop->max_budget = $request->input('max_budget');
        $shop->holiday = $request->input('holiday');
        $shop->category_id = $request->input('category_id');
        $shop->post_code = $request->input('post_code');
        $shop->address = $request->input('address');
        $shop->phone = $request->input('phone');
        $shop->save();

        return to_route('shops.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $reviews = $shop->reviews()->get();
      

        return view('shops.show', compact('shop', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $categories = Category::all();

        return view('shops.edit', compact('shop', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->name = $request->input('name');
        $shop->description = $request->input('description');
        $shop->min_budget = $request->input('min_budget');
        $shop->max_budget = $request->input('max_budget');
        $shop->holiday = $request->input('holiday');
        $shop->category_id = $request->input('category_id');
        $shop->post_code = $request->input('post_code');
        $shop->address = $request->input('address');
        $shop->phone = $request->input('phone');
        $shop->update();

        return to_route('shops.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return to_route('shops.index');
    }

    public function reserve(Request $request)
    {
        $user = Auth::user();

        $shop = Shop::all();

        return view('shops.reserve', compact('request', 'user', 'shop'));
    }
}
