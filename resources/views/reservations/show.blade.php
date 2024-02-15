@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <div class="col">
    <h3>予約確認<span>＊まだ予約は完了していません</span></h3>

    <form action="{{ route('reservasions.store',$shops->id)}}" method="post">
      <h5>ご予約店舗</h5>
      <p>{{$reserved_shop->name}}</p>
      <input type="hidden" name="shop_id" value="{{$reservasion->shop_id}}">
      <hr>
      <h5>ご予約日時</h5>
      <p>{{$reservasion->reserved_datetime}}</p>
      <input type="hidden" name="reserved_datetime" value="{{$reservasion->$reserved_datetime}}">
      <h5>ご予約人数</h5>
      <p>{{$reservasion->number_of_people}}名様</p>
      <input type="hidden" name="number-of-people" value="{{$reservasion->number-of-people}}">
      <button type="submit" class="btn btn-success">予約確認画面へ>上記の内容で予約する</button>
</form>
<a href=" {{route('reservations.create')}}">予約フォームへ戻る</a>
  </div>
</div>