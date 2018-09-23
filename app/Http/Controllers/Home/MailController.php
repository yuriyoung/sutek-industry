<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function send(Request $request)
    {
        //return response('aaaaaaaa', 200);

        $subject = $request->post('subject');
        $data = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'subject' => $subject,
            'content' => $request->post('message'),
        ];

        $to = [
            'service@sutek-industry.com',
            'sutek@sutek-industry.com',
            'yuri.young@qq.com',
            'york.young@sutek-industry.com',
        ];

        Mail::send('emails.default', $data, function ($message) use ($to, $subject){
            $message->to($to)->subject('来自sutek-industry.com的留言邮件:' . $subject);
        });

        $msg =  count(Mail::failures()) < 1 ? 'Your message was successfully sent' : 'Your message was failure sent';
        return response($msg, 200);
    }
}
