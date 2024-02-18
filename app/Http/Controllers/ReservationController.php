<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use Illiminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop_id)
    {
        
       

        return view('reservations.create', compact('shop_id'));


    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'reservation_date' => 'required|date_format:Y-m-d',
            'reservation_time' => 'required|date_format:H:i',
            'number_of_people' => 'required|digits_between:1,50'
        ]);

        $reservation = new Reservation();
        $reservation->reserved_datetime = $request->input('reserved_datetime');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->shop_id = $request->input('shop_id');
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        


        return view('users.reserve', compact('reservation'))->with('flash_message', '予約が完了しました');
    
    }

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        if('user_id' ==! $request->user_id)
        {
            return redirect('users.reserve')->session()->with('error_message', '不正なアクセスです');
        } else {
            $reservation->delete();

            return redirect('users.reserve')->with('flash_message', '予約をキャンセルしました。');
        }
    }
}
