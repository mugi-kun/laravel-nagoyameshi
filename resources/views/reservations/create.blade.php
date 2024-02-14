<!-- 有料会員のみアクセスできるページ -->

@extends('layouts.app')

 @section('content')

 <div class="container">
     <h3>予約フォーム</h3>
 
     <form action="{{ route('reservations.store',$shops->id) }}" method="POST">
         @csrf
         <div class="form-group">
             <label for="reserved-shop-name">{{ $reservation->shop_id->name }}のご予約</label>
             <input type="hidden" name="name" id="reserved-shop-name" class="form-control">
         </div>
         <div class="form-group">
             <label for="reserved-datetime">予約日時</label>
             <input type="datetime" name="reserved-datetime" id="reserved-datetime" class="form-control">
         </div>
         <div class="form-group">
             <label for="reserved-number-of-people">予約人数</label>
             <input type="number" name="reserved-number-of-people" id="reserved-number-of-people" class="form-control"><span>名様</span>
         </div>
         <div class="form-group">
             <label for="reserved-number-of-people">予約人数</label>
             <select name="reserved-number-of-people" class="form-control" id="reserved-number-of-people">
                 @for($i = 1; $i <= 10; $i++)
                     <option>{{ $i }}</option>
                 @endfor
             </select>
         </div>
         <!-- クリックしたらreservations/show.blade.phpへ遷移させたい -->
         <button type="submit" class="btn btn-success" oncilck="">予約確認画面へ</button>
     </form>
 
     <a href="{{ route('shops.index') }}">店舗一覧に戻る</a>
 </div>


 @endsection