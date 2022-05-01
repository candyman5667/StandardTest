<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問合せフォーム　確認面</title>
</head>

<body>
  <div class="contact">
    <h1>内容確認</h1>
    <form action="contact.send" method="post">
      <div class="fullname">
        <label for="fullname">お名前</label>
        {{ $inputs['fullname'] }}
        <input name="fullname" value="{{ $inputs['fullname'] }}" type="hidden">
      </div>

      <div class="gender">
        <label for="gender">性別</label>
        {{ $inputs['gender'] }}
        <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
      </div>

      <div class="email">
        <label for="email">メールアドレス</label>
        {{ $inputs['email'] }}
        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
      </div>

      <div class="postcode">
        <label for="postcode">郵便番号</label>
        {{ $inputs['postcode'] }}
        <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
      </div>

      <div class="address">
        <label for="address">住所</label>
        {{ $inputs['address'] }}
        <input name="address" value="{{ $inputs['address'] }}" type="hidden">
      </div>

      <div class="building">
        <label for="building">建物名</label>
        {{ $inputs['building'] }}
        <input name="building" value="{{ $inputs['building'] }}" type="hidden">
      </div>

      <div class="opinion">
        <label for="opinion">ご意見</label>
        {{ $inputs['opinion'] }}
        <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
      </div>

      <button type="submit" name="action">送信</button>
      <button type="submit" name="action">修正する</button>
    </form>
  </div>
</body>

</html>