<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', compact('user'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->paid = $request->input('paid') ? $request->input('paid') : $user->paid;
        $user->update();

        return to_route('mypage');
    }

    public function favorite()
    {
        $user = Auth::user();
        $favorite_shops = $user->favorite_shops;

        return view('users.favorite', compact('favorite_shops'));
    }

    public function reserve()
    {

        $user = Auth::user();

        $reserve_shops = $user->reserve_shops()->get();

        $reservations = Reservation::with('shop:id,name')->paginate(15);


        return view('users.reserve', compact('user','reserve_shops', 'reservations'));
    }
}