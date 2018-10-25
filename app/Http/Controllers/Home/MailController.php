<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $subject = $request->post('subject');
        $name = $request->post('name');
        $email = $request->post('email');
        $data = [
            'name' => $name,
            'email' => $email,
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

        if (count(Mail::failures()) < 1)
        {
            $msg =  'Your message was successfully sent';

            // save the email to a user if dons't exists
            $user = User::firstOrNew(['email' => $email]);
            if (!$user->exists)
            {
                $user->name = $name;
                $user->email = $email;
                $user->password = bcrypt($email);
                $user->save();

                $role = Role::findOrCreate('客户');
                $user->assignRole($role->name);
            }
        }
        else
        {
            $msg =  'Your message was failure sent';
        }
        return response($msg, 200);
    }

    public function subscribe()
    {
        $email = \request()->get('email');
        // save the email to a user if dons't exists
        $user = User::firstOrNew(['email' => $email]);
        if (!$user->exists)
        {
            $user->name = str_before($email, '@');
            $user->email = $email;
            $user->password = bcrypt($email);
            $user->save();

            $role = Role::findOrCreate('订阅者');
            $user->assignRole($role->name);

            return response()->json(['subscribe successfully'], 200);
        }

        return response()->json(['you have been subscribed'], 200);
    }

}
