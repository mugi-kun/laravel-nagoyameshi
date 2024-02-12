<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use Illiminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(15);

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::all();

        return view('reservations.create');


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
        $reservation->number_of_people = $request->input('number_od_people');
        $reservation->shop_id = $request->input('shop_id');
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        return redirect('reservations.index')->with('flash_message', '予約が完了しました');


    
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
            return redirect('reservation.index')->session()->with('error_message', '不正なアクセスです');
        } else {
            $reservation->delete();

            return redirect('reservation,index')->with('flash_message', '予約をキャンセルしました。');
        }
    }
}
