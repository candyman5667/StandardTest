<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問合せフォーム　入力画面</title>
</head>
<style>
  .contact {
    text-align: center;
  }

  .first-name {
    display: inline-block
  }
  .second-name {
    display: inline-block;
  }

</style>

<body>
  @if (count($errors)>0)
  <p>入力に問題があります</p>
  @endif

  <div class="contact">
    <h1>お問合せ</h1>
    <form action="contact.confirm" method="post">
      @csrf
      <div class="fullname">
        <label for="fullname">お名前</label>
        <input type="text" name="first-name" value="{{old('first-name')}}">
        <input type="text" name="second-name" value="{{old('second-name')}}">
        <div class="name-sample">
          <p class="first-name">例）山田</p>
          <p class="second-name">例）太郎</p>
        </div>
        @if ($errors->has('fullname'))
        <P class="error-message">{{ $errors-first('fullname') }}</P>
        @endif
      </div>

      <div class="gender">
        <label for="gender">性別</label>
        <input type="radio" name="gender" value="男性" checked>男性
        <input type="radio" name="gender" value="女性">女性
      </div>

      <div class="email">
        <label for="email">メールアドレス</label>
        <input type="text" name="email" value="{{old('email')}}">
        <div class="mail-sample">
          <p class="mail-sample">例）test@example.com</p>
        </div>
        @if ($errors->has('email'))
        <P class="error-message">{{ $errors-first('email') }}</P>
        @endif
      </div>

      <div class="postcode">
        <label for="postcode">郵便番号</label>
        <span>〒</span>
        <input type="text" name="postcode" Valu="{{old('postcode')}}" pattern="¥d{3}-¥d{4}[a-z¥d]">
        <div class="post-sample">
          <p class="post-sample">例）123-4567</p>
        </div>
        @if ($errors->has('postcode'))
        <P class="error-message">{{ $errors-first('postcode') }}</P>
        @endif
      </div>

      <div class="address">
        <label for="address">住所</label>
        <input type="text" name="address" value="{{old('address')}}">
        <div class="address-sample">
          <p class="address-sample">例）東京都渋谷区千駄ヶ谷1-2-3</p>
        </div>
        @if ($errors->has('address'))
        <P class="error-message">{{ $errors-first('address') }}</P>
        @endif
      </div>

      <div class="building">
        <label for="building">建物名</label>
        <input type="text" name="building" value="{{old('building')}}">
        <div class="building-sample">
          <p class="building-sample">例）千駄ヶ谷マンション101</p>
        </div>
        @if ($errors->has('building'))
        <P class="error-message">{{ $errors-first('building') }}</P>
        @endif
      </div>

      <div class="opinion">
        <label for="opinion">ご意見</label>
        <textarea name="opinion" id="" value="{{old('opinion')}}" cols="30" rows="4"></textarea>
        @if ($errors->has('opinion'))
        <P class="error-message">{{ $errors-first('opinion') }}</P>
        @endif
      </div>

      <button type="submit" name="btn_confirm">確認</button>

    </form>
  </div>
</body>

</html>