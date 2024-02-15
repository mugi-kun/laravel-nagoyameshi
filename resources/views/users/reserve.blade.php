@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>予約一覧</h1>
 
         <hr>
 
         <div class="row">
            @foreach ($reserve_shops as $reserve_shop)
             @foreach ($reserve_contents as $reserve_content)
                 <div class="col-md-7 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $reserve_shop->id) }}" class="w-25">
                             <img src="{{ asset('img/dummy.jpg')}}" class="img-fluid w-100">
                         </a>
                         <div class="container mt-3">
                             <h5 class="w-100 nagoyameshi-favorite-item-text">{{ $reserve_content->name }}</h5>                          
                             <h6 class="w-100 nagoyameshi-favorite-item-text">予約日時:{{ $reserve_content->reserved_datetime }}</h6>
                             <h6 class="w-100 nagoyameshi-favorite-item-text">人数:{{ $reserve_content->number_of_people }}名様 </h6>
                             <h6 class="w-100 nagoyameshi-favorite-item-text">承り日時:{{ $reserve_content->created_at }}</h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-2 d-flex align-items-center justify-content-end">
                     <a href="#" class="nagoyameshi-favorite-item-delete" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                         キャンセル
                     </a>
                      <form id="reservations-destroy-form" action="#" method="POST" class="d-none"> 
                         @csrf 
                         @method('DELETE')
                     </form> 
                 </div>
             @endforeach
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection
