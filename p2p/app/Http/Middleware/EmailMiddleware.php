<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Nette\Mail\SmtpMailer;
use Nette\Mail\Message;

class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rs = $next($request);


        $mail = new Message;
        $mail->setFrom('zk <947514405@qq.com>')
            ->addTo($request->user()->email)
            ->setSubject('注册邮箱测试')
            ->setBody("中间件真好用啊");

            $mailer = new SmtpMailer(array(
                    'host' => 'smtp.qq.com',
                    'username' => '947514405@qq.com',
                    'password' => 'jxkgefwzjydkbdai',
                    'secure' => 'ssl',
            ));
            $mailer->send($mail);
            return $rs;
    }
}
