<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public static $name = 'User';

    public function welcome($user)
    {
        $this
            ->setTo($user->email)
            ->setProfile('checkAcessViewEmail')
            ->setEmailFormat('html')
            ->setSubject(sprintf('Bem-vindo, %s', $user->nome))
            ->setViewVars(['nome' => $user->nome])
            ->viewBuilder()
            ->setTemplate('welcome_email')
            ->setLayout('default');
    }
    
    public function recovery($user)
    {
        $this
            ->setTo($user[0]['email'])
            ->setProfile('checkAcessViewEmail')
            ->setEmailFormat('html')
            ->setSubject('Recuperação de senha')
            ->setViewVars(['nome' => $user[0]['nome'], 'email' => $user[0]['email'], 'hash' => substr($user[0]['password'], 0, 25)])
            ->viewBuilder()
            ->setTemplate('recuperar_email')
            ->setLayout('default');
        }
}