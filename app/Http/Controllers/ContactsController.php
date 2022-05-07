<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function index()
    {
        //フォーム入力画面のviewを表示
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('contact.confirm',[
            'inputs'=> $inputs,
        ]);
    }

    public function send(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('contact.index')->withInput();
        }
        $input = $request->all();
        unset($input['_token']);
        unset($input['last-name']);
        unset($input['first-name']);
        unset($input['action']);
        Contact::create($input);
        return view('thanks');
    }
    public function manage()
    {
        $result = Contact::paginate(10);
        return view('management', ['inputs' => $result]);
    }

    public function search(Request $request)
    {
        unset($request['_token']);
        if ($request->gender == '0') {
            if ($request->created_from == null && $request->created_to !== null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                    ->whereDate('created_at', '<=', "{$request->created_to}")
                    ->where('email', 'LIKE', "%{$request->email}%")
                    ->paginate(10);
                return view('management', ['forms' => $result]);
            } elseif ($request->created_from !== null && $request->created_to == null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                    ->whereDate('created_at', '>=', "{$request->created_from}")
                    ->where('email', 'LIKE', "%{$request->email}%")
                    ->paginate(10);
                return view('management', ['forms' => $result]);
            } elseif ($request->created_from == null && $request->created_to == null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                    ->where('email', 'LIKE', "%{$request->email}%")
                    ->paginate(10);
                return view('management', ['forms' => $result]);
            } else {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                    ->whereDate('created_at', '<=', "{$request->created_to}")
                    ->whereDate('created_at', '>=', "{$request->created_from}")
                    ->where('email', 'LIKE', "%{$request->email}%")
                    ->paginate(10);
                return view('management', ['forms' => $result]);
            }
        }
        if ($request->created_from == null && $request->created_to !== null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->where('gender', $request->gender)
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
            return view('management', ['forms' => $result]);
        } elseif ($request->created_from !== null && $request->created_to == null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->where('gender', $request->gender)
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
            return view('management', ['forms' => $result]);
        } elseif ($request->created_from == null && $request->created_to == null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->where('gender', $request->gender)
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
            return view('management', ['forms' => $result]);
        } else {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->where('gender', $request->gender)
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
            return view('management', ['forms' => $result]);
        }
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        if ($request->currentPage == 1) {
            return redirect($request->firstPage);
        } else {
            return back();
        }
    }
}

