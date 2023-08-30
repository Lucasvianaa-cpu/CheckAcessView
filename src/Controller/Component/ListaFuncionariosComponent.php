<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\FrozenDate;
use Cake\ORM\TableRegistry;
use DateTime;

class ListaFuncionariosComponent extends Component
{
    public function ListaFuncionariosGrafico($id_empresa)
    {
        $ano = date("Y");
        $meses = [];

        for ($mes = 1; $mes <= 12; $mes++) {
            $data_inicial = date("$ano-" . sprintf('%02d', $mes) . "-01");
            $data_final = date('Y-m-t', strtotime($data_inicial));

            $funcionariosTable = TableRegistry::getTableLocator()->get('Funcionarios');
            $query = $funcionariosTable->find();
            $resultado = $query
                ->select(['contagem' => $query->func()->count('id')])
                ->where([
                    'created >=' => $data_inicial,
                    'created <=' => $data_final,
                    'empresa_id' => $id_empresa,
                ])
                ->first();


            $meses[$mes] = $resultado['contagem'] ?? 0;

        }
        return $meses;
    }
}
