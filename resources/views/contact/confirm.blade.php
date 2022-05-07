@extends('common')

@section('main')

<div class="container">
  <h1>内容確認</h1>
  <form action="contact.send" method="post">
    @csrf

    <div class="tittle">
      <label for="fullname">お名前</label>
      {{ $inputs['last-name'] }}
      <span></span>
      {{ $inputs['first-name'] }}
      <input name="fullname" value="{{ $inputs['last-name'] }}{{ $inputs['first-name'] }}" type="hidden">
    </div>

    <div class="tittle">
      <label for="gender">性別</label>
      {{ $inputs['gender'] }}
      <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
      @if ($input ['gender'] === '1')
      <span>男性</span>
      @elseif ($input ['gender'] === '2')
      <span>女性</span>
      @endif
    </div>

    <div class="tittle">
      <label for="email">メールアドレス</label>
      {{ $inputs['email'] }}
      <input name="email" value="{{ $inputs['email'] }}" type="hidden">
    </div>

    <div class="tittle">
      <label for="postcode">郵便番号</label>
      {{ $inputs['postcode'] }}
      <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
    </div>

    <div class="tittle">
      <label for="address">住所</label>
      {{ $inputs['address'] }}
      <input name="address" value="{{ $inputs['address'] }}" type="hidden">
    </div>

    <div class="tittle">
      <label for="building">建物名</label>
      {{ $inputs['building'] }}
      <input name="building" value="{{ $inputs['building'] }}" type="hidden">
    </div>

    <div class="tittle">
      <label for="opinion">ご意見</label>
      {{ $inputs['opinion'] }}
      <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
    </div>

    <button type="submit" name="action">送信</button>
    <a href="/contact">修正する</a>
  </form>
</div>

@endsection