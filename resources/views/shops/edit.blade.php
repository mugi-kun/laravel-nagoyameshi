@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <h1>店舗情報更新</h1>
 
     <form action="{{ route('shops.update',$shop->id) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="form-group">
             <label for="shop-name">店舗名</label>
             <input type="text" name="name" id="shop-name" class="form-control" value="{{ $shop->name }}">
         </div>
         <div class="form-group">
             <label for="shop-description">店舗説明</label>
             <textarea name="description" id="shop-description" class="form-control">{{ $shop->description }}</textarea>
         </div>
         <div class="form-group">
             <label for="shop-budget">予算</label>
             <input type="number" name="min_budget" id="shop-min-budget" class="form-control" value="{{ $shop->min_budget }}"><span>円〜</span>
             <input type="number" name="max_budget" id="shop-max-budget" class="form-control" value="{{ $shop->max_budget }}"><span>円</span>
         </div>
         <div class="form-group">
             <label for="shop-name">定休日</label>
             <input type="text" name="holiday" id="shop-holiday" class="form-control" value="{{ $shop->holiday }}">
         </div>
         <div class="form-group">
             <label for="shop-name">営業時間</label>
             <input type="text" name="opening_hour" id="shop-opening-hour" class="form-control" value="{{ $shop->opening_hour }}">
         </div>
         <div class="form-group">
             <label for="shop-category">カテゴリ</label>
             <select name="category_id" class="form-control" id="shop-category">
                 @foreach ($categories as $category)
                 @if ($category->id == $shop->category_id)
                 <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                 @else
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endif
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-danger">更新</button>
     </form>
 
     <a href="{{ route('shops.index') }}">商品一覧に戻る</a>
 </div>
 @endsection