<?php
namespace App\Mailer;
use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public static $name = 'User';

    public function welcome($user)
    {
        $this->to($user->email)
        ->profile('checkAcessViewEmail')
        ->emailFormat('html')
        ->template('welcome_email')
        ->layout('default')
        ->viewVars(['nome' => $user->nome])
        ->subject(sprintf('Bem-vindo, %s', $user->nome));
    }

    public function recovery($user)
    {
        $this->to($user[0]['email'])
        ->profile('checkAcessViewEmail')
        ->emailFormat('html')
        ->template('recuperar_email')
        ->layout('default')
        ->viewVars(['nome' => $user[0]['nome'], 'email' => $user[0]['email'], 'hash' => substr($user[0]['password'], 0, 25)])
        ->subject('Recuperação de senha');
    }
}
