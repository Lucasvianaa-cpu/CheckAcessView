<?php

namespace App\View\Helper;

use Cake\View\Helper\FormHelper;

class Form2Helper extends \Cake\View\Helper\FormHelper {

    public function data_personalizada($nome, $label, $tipo, $placeholder, $required, $valor) {

        $nome_convertido = $nome;
        $nome_convertido = str_replace('_', '-', $nome_convertido);
    
        echo '
            <label for="' . $nome_convertido . '" class="form-label">' . $label . '</label>
            <input type="' . $tipo . '" class="form-control" id="' . $nome_convertido . '" name="' . $nome . '" value="' . $valor . '" placeholder="' . $placeholder . '" required="' . $required . '">
        ';
    }
    
}

