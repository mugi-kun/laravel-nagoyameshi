@extends('layouts.app')

 @section('content')
  <div class=col-9>
    <div class="container">
      <div class="container mt-4" >
        <div class="row w-100">
          @foreach($reservations as $reservation)
          <div class="row">
            <div class="col-12">
              <p class="nagoyameshi-shop-label mt-2">
                {{ $reservation->shop_id->name }}<br>
                <label>予約日時:{{ $reservation->reserved_datetime }}</label>
                <label>予約人数:{{ $reservation->number_of_people }}</label>
                <label>承り日時{{ $reservation->created_at }}</label>
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endsection