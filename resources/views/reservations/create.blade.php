<!-- 有料会員のみアクセスできるページ -->

@extends('layouts.app')

 @section('content')

 <div class="container">
     <h3>予約フォーム</h3>
 
     <form action="{{ route('reservations.store', $shop_id) }}" method="POST">
         @csrf
         <div class="form-group">
             <label for="reserved-shop-name">のご予約</label>
             <input type="hidden" name="shop_id" value="{{$shop_id}}">
         </div>
         <div class="form-group">
             <label for="reserved-datetime">予約日時</label>
             <input type="date" name="reserved-datetime" id="reserved-datetime" class="form-control">
         </div>
         <div class="form-group">
             <label for="number-of-people">予約人数</label>
             <select name="number-of-people" class="form-control" id="reserved-number-of-people">
                 @for($i = 1; $i <= 10; $i++)
                     <option>{{ $i }}</option>
                 @endfor
             </select>
         </div>
         <button type="submit" class="btn btn-success">予約する</button>
     </form>
 
     <a href="{{ route('shops.index') }}">店舗一覧に戻る</a>
 </div>


 @endsection