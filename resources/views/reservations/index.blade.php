@extends('layouts.app')

 @section('content')
  <div class=col-9>
    <div class="container">
      <div class="container mt-4" >
        <div class="row w-100"> 
        
          @foreach($reservations as $reservation)
          <div class="row">
            <div class="col-12">  
              @foreach($shop_names as $shop_name)
              <p class="nagoyameshi-shop-label mt-2">{{$shop_name}}<br></p>
              @endforeach 
             <ul>
                <li>予約日時:{{ $reservation->reserved_datetime }}</li>
                <li>予約人数:{{ $reservation->number_of_people }}</li>
                <li>承り日時{{ $reservation->created_at }}</li>
                </ul>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endsection