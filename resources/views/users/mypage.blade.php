@extends('layouts.app')
 
 @section('content')
 <div class="container d-flex justify-content-center mt-3">
   <div class="w-50">
         <h3>マイページ</h3>
 
         <hr>

     <div class="list-group">
       <button type="button" class="list-group-item list-group-item-action"><a href="{{route('mypage.edit')}}">会員情報の変更</a></button>
       <button type="button" class="list-group-item list-group-item-action"><a href="#">予約一覧</a></button>
      <button type="button" class="list-group-item list-group-item-action"><a href="#">お気に入りリスト</a></button>
      <button type="button" class="list-group-item list-group-item-action"><a href="#">行ったリスト</a></button>
      <button type="button" class="list-group-item list-group-item-action"><a href="#">プラン変更</a></button>
     </div>
  </div>
</div>
 @endsection