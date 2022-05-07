@extends('common')

@section('main')

  <div class="form-group row">
    <h1>お問合せ</h1>
    <form action="confirm" method="post">
      @csrf
      <div class="tittle">
        <label for="fullname">お名前</label>
        <span class="alert">※</span>
        <input type="text" name="last-name" value="{{old('last-name')}}">
        <input type="text" name="first-name" value="{{old('first-name')}}">
        <div class="name-sample">
          <span class="last-name">例）山田</span>
          <span class="first-name">例）太郎</span>
        </div>
        @error('last-name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('first-name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="tittle">
        <label for="gender">性別</label>
        <span class="alert">※</span>
        <input type="radio" name="gender" value="1" checked>男性
        <input type="radio" name="gender" value="2">女性
      </div>

      <div class="tittle">
        <label for="email">メールアドレス</label>
        <span class="alert">※</span>
        <input type="text" name="email" value="{{old('email')}}">
        <div class="mail-sample">
          <span class="mail-sample">例）test@example.com</span>
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="tittle">
        <label for="postcode">郵便番号</label>
        <span class="alert">※</span>
        <span>〒</span>
        <input type="text" name="postcode" Valu="{{old('postcode')}}" pattern="\d{3}-\d{4}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" />
        <div class="post-sample">
          <span class="post-sample">例）123-4567</span>
        </div>
        @error('postcode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="tittle">
        <label for="address">住所</label>
        <span class="alert">※</span>
        <input type="text" name="address" value="{{old('address')}}">
        <div class="address-sample">
          <span class="address-sample">例）東京都渋谷区千駄ヶ谷1-2-3</span>
        </div>
        @error('adress')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="tittle">
        <label for="building">建物名</label>
        <span class="alert">※</span>
        <input type="text" name="building" value="{{old('building')}}">
        <div class="building-sample">
          <span class="building-sample">例）千駄ヶ谷マンション101</span>
        </div>
        @error('building')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="tittle">
        <label for="opinion">ご意見</label>
        <span class="alert">※</span>
        <textarea name="opinion" id="" value="{{old('opinion')}}" cols="30" rows="4"></textarea>
        @if ($errors->has('opinion'))
        <P class="error-message">{{ $errors-first('opinion') }}</P>
        @endif
      </div>

      <button type="submit" name="btn_confirm">確認</button>

    </form>
  </div>
  @endsection