@extends('layouts.app')
 
 @section('content')
 <div class="row">
    <div class="col-9">
        @component('components.sidebar',['categories' => $categories])
        @endcomponent
    </div>

     <div class="col-9">
        {{$min_budget}}
        {{$max_budget}}
        <div class="container">
             @if ($category !== null)
                <br>
                <a href="{{ route('shops.index') }}">トップ</a> > {{ $category->name }} 
                <h2>{{ $category->name }}の店舗一覧 {{$total_count}} 件</h2>
             @elseif ($keyword !== null)
                <br>
                <a href="{{ route('shops.index') }}">トップ</a> > 店舗一覧
                <h2>"{{ $keyword }}"の検索結果{{$total_count}}件</h2>
             @endif
         </div>
         <div class="container mt-4">
            並べ替え
            @sortablelink('created_at', '新着順')
         </div>
         <div class="container mt-4">
             <div class="row w-100">
                 @foreach($shops as $shop)
                 <div class="col-3">
                     <a href="{{route('shops.show', $shop)}}">
                         <img src="{{ asset('img/dummy.jpg')}}" class="img-thumbnail">
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="nagoyameshi-shop-label mt-2">
                                 {{$shop->name}}<br>
                                 <label>予算：￥{{$shop->min_budget}} ~  ￥{{$shop->max_budget}}</label>
                                 <label>定休日：{{ $shop->holiday }}</label><br>
                                 <label>営業時間：{{ $shop->opening_hour }}</label>
                             </p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
         <div class="container">
         {{ $shops->appends(request()->query())->links() }} <br>
        </div>
     </div>
 </div>
 @endsection