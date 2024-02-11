@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-5">
             <span>
                 <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の変更
             </span>
 
             <h3 class="mt-3 mb-3">会員情報の変更</h3>
             <hr>
 
             <form method="POST" action="{{ route('mypage') }}">
                 @csrf
                 <input type="hidden" name="_method" value="PUT">
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="name" class="text-md-left nagoyameshi-edit-user-info-label">ユーザー名</label>
                     </div>
                     <div class="collapse show editUserName">
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">
                         @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>ユーザー名を入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>
 
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="email" class="text-md-left nagoyameshi-edit-user-info-label">メールアドレス</label>
                     </div>
                     <div class="collapse show editUserMail">
                         <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>メールアドレスを入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>
        <!-- <input type="hidden" value="{{ $user->password }}"> -->
                 <hr>
                 <button type="submit" class="btn nagoyameshi-submit-button mt-3 w-25">
                     変更
                 </button>
             </form>
         </div>
     </div>
 </div>
 @endsection
