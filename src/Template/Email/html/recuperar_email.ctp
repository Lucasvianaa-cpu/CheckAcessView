<h2>Olá <?=$nome?>, vamos ajuda-lo a recuperar sua conta.</h2>
<div>
    <p>
        Para realizar a alteração da sua senha é necessário que clique no link que se encontra abaixo:
        <br/>
        <?php 
            $root = pathinfo($_SERVER['HTTP_REFERER']);
            $link = $root['dirname'] . '/' . 'redefinir-senha?h=' . $hash . '&email=' . $email;
            echo $this->Html->link('Redefinir senha de usuário', $link);
        ?>
    </p>
</div>