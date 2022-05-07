@extends('common')

@section('main')

<h1>管理システム</h1>
<form action="contact.search" method="post" class="contact-manage">
  @csrf
  <div>
    <label for="fullname" class="title">お名前</label>
    <input type="text" name="fullname" id="fullname" />
    <span class="title-gender">性別</span>
    <input type="radio" name="gender" value="0" id="all" checked /><label for="all">全て</label>
    <input type="radio" name="gender" value="1" id="male" /><label for="male">男性</label>
    <input type="radio" name="gender" value="2" id="female" />女性
  </div>
  <div>
    <label for="created_input" class="title">登録日</label>
    <input type="date" name="created_input" id="created_input" />
    <span> 〜 </span>
    <input type="date" name="created_to" id="created_to" />
  </div>
  <div>
    <label for="email" class="title">メールアドレス</label>
    <input type="text" name="email" id="email" />
  </div>
  <div class="confirm">
    <button type="submit" name="action" value="post">検索</button><br>
    <button type="submit" formaction= "contact.manage" name="action" value="back">リセット</button>
  </div>
</form>
<div class="table-page">
  <div>
    @if (count($input) > 0)
    <p>全{{ $inputs->total() }}件中
      {{ ($inputs->currentPage() - 1) * $inputs->perPage() + 1 }}〜
      {{ ($inputs->currentPage() - 1) * $inputs->perPage() + 1 + (count($inputs) - 1) }}件
    </p>
    @else
    <p>データがありません。</p>
    @endif
  </div>
  <div>
    {{ $inputs->appends(request()->input())->links('pagination::bootstrap-4') }}
  </div>
</div>
<div class="input-table">
  <table>
    <tr class="table-title">
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach ($inputs as $input)
    <form action="contact.delete" method="POST">
      @csrf
      <tr>
        <input type="hidden" name="firstPage" value="{{ $inputs->url(1) }}">
        <input type="hidden" name="currentPage" value="{{ $inputs->currentPage() }}">
        <td><input type="hidden" name="id" value="{{ $input->id }}">{{ $input->id }}</td>
        <td>{{ $input->fullname }}</td>
        <td>
          @if ($input->gender == '1')
          男性
          @elseif ($input->gender =='2')
          女性
          @endif
        </td>
        <td>{{ $input->email }}</td>
        <td class="opinion">{{ $input->opinion }}</td>
        <td class="delete"><button type="submit">削除</button></td>
      </tr>
    </form>
    @endforeach
  </table>
</div>
@endsection