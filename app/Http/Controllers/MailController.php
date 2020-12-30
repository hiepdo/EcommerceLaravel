<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function SendEmail()
    {
        //send mail
        $to_name = "Đỗ Tiến Hiệp";
        $to_email = "ltweb1082@gmail.com";//send to this email
        $data = array("name"=>"Xác nhận tài khoản đăng ký","body"=>'Mail xác nhận tài khoản đăng ký'); //body of mail.blade.php
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

            $message->to($to_email)->subject('Xác nhận tài khoản đăng ký');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        return redirect('/')->with('message','');
        //--send mail
    }
}
