<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        //フォーム入力画面のviewを表示
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        //バリデーションを実行
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'building' => 'required',
            'opinion' => 'required|max120',
        ]);

        //フォームから受け取った全てのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('contact.confirm',[
            'inputs'=> $inputs,
        ]);
    }

    public function send(Request $request)
    {

    }
}
