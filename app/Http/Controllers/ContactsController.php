<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMail;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function process(Request $request)
    {
        $input  = $request->except('submit');

        if (isset($request->submit)) {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            // メール送信
            Mail::to($input['email'])->send(new ContactMail('mails.contact', 'お問い合わせありがとうございます', $input));

            return redirect()->route('complete');
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }

    public function complete()
    {
        return view('contacts.complete');
    }
}
