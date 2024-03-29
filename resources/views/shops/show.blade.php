@extends('layouts.app')
 
 @section('content')
 
 <div class="d-flex justify-content-center">
     <div class="row w-75">
         <div class="col-5 offset-1">
             <img src="{{ asset('img/dummy.jpg')}}" class="w-100 img-fluid">
         </div>
         <div class="col">
             <div class="d-flex flex-column">
                 <h1 class="">
                     {{$shop->name}}
                 </h1>
                 <p class="">
                     {{$shop->description}}
                 </p>
                 <hr>
                 <p class="d-flex align-items-end">
                     予算：￥{{$shop->min_budget}} 〜 ￥{{$shop->max_budget}}
                 </p>
                 <p class="d-flex align-items-end">
                     定休日：{{$shop->holiday}}
                 </p>
                 <p class="d-flex align-items-end">
                     営業時間：{{$shop->opening_hour}}
                 </p>
                 <hr>
             </div>
             @auth
             <form mothod="POST" class="m-3 align-items-end" action="{{route('reservations.create', $shop->id)}}">
                 @csrf
                 <input type="hidden" name="id" value="{{$shop->id}}">
                 <input type="hidden" name="name" value="{{$shop->name}}">
                 <div class="row">
                     <div class="col-4"> 
                         <button type="submit" class="button-55 w-100" role="button">
                             予約する
                         </button>
                     </div>
                     <div class="col-4">
                     @if(Auth::user()->favorite_shops()->where('shop_id', $shop->id)->exists())
                                 <a href="{{ route('favorites.destroy', $shop->id) }}" class="button-55 w-100 text-center" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                                     <i class="fas fa-heart"></i>
                                     お気に入り解除
                                 </a>
                             @else
                                 <a href="{{ route('favorites.store', $shop->id) }}" class="button-55 w-100 text-center" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                                     <i class="far fa-heart"></i>
                                     お気に入り
                                 </a>
                             @endif
                     </div>
                     <div class="col-4">
                     @if(Auth::user()->visite_shops()->where('shop_id', $shop->id)->exists())
                                 <a href="{{ route('visited.destroy', $shop->id) }}" class="button-55 w-100 text-center" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                                     <i class="fas fa-check-square"></i>
                                     行った解除
                                 </a>
                     @else
                                 <a href="{{ route('visited.store', $shop->id) }}" class="button-55 w-100 text-center" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                                     <i class="far fa-check-square"></i>
                                     行った
                                 </a>
                     @endif
                        </div>

                    </div>
                </form>
                 <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                     @method('DELETE')
                 </form>
                 <form id="favorites-store-form" action="{{ route('favorites.store', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                 </form>
                 <form id="favorites-destroy-form" action="{{ route('visited.destroy', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                     @method('DELETE')
                 </form>
                 <form id="favorites-store-form" action="{{ route('visited.store', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                 </form>   
                 
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
             <h3 class="float-left">カスタマーレビュー</h3>
         </div>
 
         <div class="offset-1 col-10">
         <div class="row">
                 @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                     <h3 class="review-score-color">{{ str_repeat('★',$review->score)}}</h3>
                     <p class="h3">{{$review->title}}</p>
                     <p class="h3">{{$review->content}}</p>
                     <label>{{$review->created_at}} {{$review->user->name}}</label>
                 </div>
                 @endforeach
             </div><br />
 
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('reviews.store') }}">
                         @csrf
                       <div>
                         <h4>評価</h4>
                         <select name="score" class="form-control m-2 review-score-color">
                            <option value="5" class="review-score-color">★★★★★</option>
                            <option value="4" class="review-score-color">★★★★</option>
                            <option value="3" class="review-score-color">★★★</option>
                            <option value="2" class="review-score-color">★★</option>
                            <option value="1" class="review-score-color">★</option>
                         <select>
                         <h4>タイトル</h4>
                         @error('content')
                             <strong>タイトルを入力してください</strong>
                         @enderror
                         <input type="text" name="title" class="form-control">
                       </div>
                       <div>
                          <h4>レビュー内容</h4>
                         @error('content')
                             <strong>レビュー内容を入力してください</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                       </div>
                         <input type="hidden" name="shop_id" value="{{$shop->id}}">
                         <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
                     </form>
                 </div>
             </div>
             @endauth
         </div>
     </div>
 </div>
 @endsection
