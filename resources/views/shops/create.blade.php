@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <h1>新しい店舗を追加</h1>
 
     <form action="{{ route('shops.store') }}" method="POST">
         @csrf
         <div class="form-group">
             <label for="shop-name">店舗名</label>
             <input type="text" name="name" id="shop-name" class="form-control">
         </div>
         <div class="form-group">
             <label for="shop-description">商品説明</label>
             <textarea name="description" id="shop-description" class="form-control"></textarea>
         </div>
         <div class="form-group">
             <label for="shop-budget">予算</label>
             <input type="number" name="min_budget" id="shop-min-budget" class="form-control"><span>円〜</span>
             <input type="number" name="max_budget" id="shop-max-budget" class="form-control"><span>円</span>
         </div>
         <div class="form-group">
             <label for="shop-name">定休日</label>
             <input type="text" name="holiday" id="shop-holiday" class="form-control">
         </div>
         <div class="form-group">
             <label for="shop-name">営業時間</label>
             <input type="text" name="opening_hor" id="shop-opening-hour" class="form-control">
         </div>
         <div class="form-group">
             <label for="shop-category">カテゴリ</label>
             <select name="shop_id" class="form-control" id="shop-category">
                 @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-success">店舗を登録</button>
     </form>
 
     <a href="{{ route('shops.index') }}">商品一覧に戻る</a>
 </div>
 @endsection
