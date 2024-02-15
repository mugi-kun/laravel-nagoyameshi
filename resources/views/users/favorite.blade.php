@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>お気に入りリスト</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($favorite_shops as $favorite_shop)
                 <div class="col-md-7 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $favorite_shop->id) }}" class="w-25">
                             <img src="{{ asset('img/dummy.jpg')}}" class="img-fluid w-100">
                         </a>
                         <div class="container mt-3">
                             <h5 class="w-100 nagoyameshi-favorite-item-text">{{ $favorite_shop->name }}</h5>
                             <h6 class="w-100 nagoyameshi-favorite-item-text">予算：&yen;{{ $favorite_shop->min_budget }} 〜 &yen;{{ $favorite_shop->max_budget}}</h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-2 d-flex align-items-center justify-content-end">
                     <a href="{{ route('favorites.destroy', $favorite_shop->id) }}" class="samuraimart-favorite-item-delete" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                         削除
                     </a>
                     <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $favorite_shop->id) }}" method="POST" class="d-none">
                         @csrf
                         @method('DELETE')
                     </form>
                 </div>
                 <div class="col-md-3 d-flex align-items-center justify-content-end">
                     <button type="submit" class="btn nagoyameshi-favorite-reserve">予約する</button>
                 </div>
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection
