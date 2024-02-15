<!-- 有料会員のみアクセスできるページ -->

@extends('layouts.app')

 @section('content')

 <div class="container">
     <h3>予約フォーム</h3>
 
     <form action="{{ route('reservations.show', $shops->id) }}" method="GET">
         @csrf
         <div class="form-group">
             <label for="reserved-shop-name">{{ $shops->name }}のご予約</label>
             <input type="hidden" name="shop_id" value="{{$reservations->shop_id}}">
         </div>
         <div class="form-group">
             <label for="reserved-datetime">予約日時</label>
             <input type="datetime" name="reserved-datetime" id="reserved-datetime" class="form-control">
         </div>
         <div class="form-group">
             <label for="number-of-people">予約人数</label>
             <select name="number-of-people" class="form-control" id="reserved-number-of-people">
                 @for($i = 1; $i <= 10; $i++)
                     <option>{{ $i }}</option>
                 @endfor
             </select>
         </div>
         <!-- クリックしたらreservations/show.blade.phpへ遷移させたい -->
         <button type="submit" class="btn btn-success">予約確認画面へ</button>
     </form>
 
     <a href="{{ route('shops.index') }}">店舗一覧に戻る</a>
 </div>


 @endsection