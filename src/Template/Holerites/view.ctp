
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Holerite</title>

    <?= $this->Html->css('corporate-ui-dashboard.css?v=1.0.0') ?>
    <?= $this->Html->css('corporate-ui-dashboard.css.map') ?>
 
    
    <style>
        /* Estilos gerais para a página */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0 auto;
            width: 95%;
            height: 100vh;
        }

        @media print {
            body {
                width: 100%;
            }
            
            /* Adicione estilos específicos para impressão aqui */
        
            .imprimir, .navbar-nav, .navegacao {
                display: none;
            }
        }

        .imprimir {
            width: 100%;
            text-align: right;
        }


        /* Estilos para a área do holerite */
        .holerite {
            
            margin: 0 auto;
            padding: 5px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Estilos para a tabela de informações do holerite */
        table {
            width: 100%;
            border: 1;
            border-collapse: collapse;
            margin-top: 10px;
        }

        

        th, td {
            border: 1px solid #ccc;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #cnpj {
            border-right: none;
            border-bottom: none; 
        }

        #folha-mensal {
            border-left: none;
            border-bottom: none; 
            text-align: right;
        }
        #mes {
            border-top: none;
            text-align: right;
        }

        #nome-funcionario {
            border-right: none;
            border-bottom: none; 
        }

        #admissao {
            border-left: none;
            border-bottom: none; 
            text-align: right;
        }
        #cargo {
            border-top: none;
        }

        #coluna {
            font-weight: bold;
            
        }
        .alinhar-centro {
            text-align: center;
            font-weight: bold;
        }
        .alinhar-centro-valor {
            text-align: center;
        }
        .alinhar-direita {
            text-align: right;
        }

        .retirar-border-bottom {
            border-bottom: none; 
        }
        .retirar-border-top {
            border-top: none; 
        }

        

        /* Estilos para o rodapé do holerite */
        .rodape {
            margin-top: 4px;
            text-align: center;
        }

        /* Estilos para a assinatura */
        .rodape-assinatura {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navegacao" aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
                  <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">Dashboard</a></li>
                      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Holerites', 'action' => 'index'])); ?>">Holerites</a></li>
                      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Visualizar</li>
                  </ol>
                  <h6 class="font-weight-bold mb-0">Holerites</h6>
                </nav>
    
        <table id="tabela">
            <thead>
                <tr>
                    <th colspan="5"><?= $holerite->funcionario->empresa->razao_social ?></th>
                </tr>
                <tr>
                    <th colspan="3" id="cnpj"><?= formatarCnpj($holerite->funcionario->empresa->cnpj) ?></th>
                    <th colspan="2" id="folha-mensal">Folha Mensal</th>
                </tr>
                <tr>
                    <th colspan="5" id="mes"><?= $holerite->mes ?></th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td colspan="3" id="nome-funcionario"><?= $holerite->funcionario->user->nome ?></td>
                    <td colspan="2" id="admissao">Admissão: <?php
                            // Converte a data para um timestamp
                            $timestamp = strtotime($holerite->data_admissao);

                            // Formata a data no novo formato
                            $formatted_date = date('d/m/Y', $timestamp);

                            // Exibe a data formatada
                            echo '<span style="font-size: 14px">' . $formatted_date . '</span>';
                        ?></td>
                </tr>
                <tr>
                    <td colspan="5" id="cargo"><?= $holerite->funcionario->cargo->nome ?></td>
                </tr>
                <tr id="coluna">
                    <td class="alinhar-centro">Código</td>
                    <td class="alinhar-centro">Descrição</td>
                    <td class="alinhar-centro">Referência</td>
                    <td class="alinhar-centro">Vencimentos</td>
                    <td class="alinhar-centro">Descontos</td>

                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom"><?= $holerite->salario_codigo ?></td>
                    <td class="retirar-border-bottom"><?= $holerite->salario_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom"><?= $holerite->salario_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom"><?= number_format($holerite->salario_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom"><?= number_format($holerite->salario_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->dsr_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->dsr_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->dsr_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->dsr_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->dsr_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->adc_sobre_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->adc_sobre_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->adc_sobre_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->adc_sobre_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->adc_sobre_desconto, 2, ',', '.') ?></td> 
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr50_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->hr50_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr50_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr50_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr50_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr80_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->hr80_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr80_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr80_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr80_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr100_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->hr100_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->hr100_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr100_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->hr100_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->ferias_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->ferias_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->ferias_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->ferias_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->ferias_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->vale_alimentacao_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->vale_alimentacao_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->vale_alimentacao_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->vale_alimentacao_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->vale_alimentacao_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->adiantamento_codigo ?></td>
                    <td class="retirar-border-bottom retirar-border-top"><?= $holerite->adiantamento_descricao ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= $holerite->adiantamento_referencia ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->adiantamento_vencimento, 2, ',', '.') ?></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"><?= number_format($holerite->adiantamento_desconto, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                    <td class="retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td colspan="3" class="retirar-border-bottom"></td>
                    <td class="alinhar-centro retirar-border-bottom">Total de Vencimentos</td>
                    <td class="alinhar-centro retirar-border-bottom">Total de Descontos</td>
                </tr>
                <tr>
                    <td colspan="3"  class="retirar-border-top"></td>
                    <td class="alinhar-centro-valor retirar-border-top"><?= number_format($holerite->total_vencimentos, 2, ',', '.') ?></td>
                    <td class="alinhar-centro-valor retirar-border-top"><?= number_format($holerite->total_descontos, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="alinhar-centro">Valor Líquido</td>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->liquido, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class="alinhar-centro">Salário Base</td>
                    <td class="alinhar-centro">Sal. Contr. INSS</td>
                    <td class="alinhar-centro">Base Cálc. FGTS</td>
                    <td class="alinhar-centro">F.G.T.S do Mês</td>
                    <td class="alinhar-centro">Valor IRRF</td>
                </tr>
                <tr>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->salario_base, 2, ',', '.') ?></td>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->base_inss, 2, ',', '.') ?></td>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->base_fgts, 2, ',', '.') ?></td>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->fgts, 2, ',', '.') ?></td>
                    <td class="alinhar-centro-valor"><?= number_format($holerite->ir, 2, ',', '.') ?></td>
                </tr>

            </tbody>
        </table>
        <div class="rodape" id="rodape">
            <p>Declaro ter recebido a importância líquida determinada neste recibo.</p>
        </div>
        <div class="rodape-assinatura" id="rodape-assinatura">
            <div class="data">
                <p>__/__/____</p>
                <p>Data</p>
            </div>
            <div class="assinatura">
                <p>___________________________</p>
                <p>Assinatura do Funcionário</p>
            </div>
        </div>
    </div>
    <div class="botao-imprimir imprimir">
        <button class="btn btn-dark" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; margin-bottom: -5px"  onclick="imprimirTabela()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
            Imprimir Tabela
        </button>
        <a class="btn btn-dark" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; margin-bottom: -5px; margin-left: 10px;" href="<?= $this->Url->build(['action' => 'index']); ?>">Voltar</a>
    </div>
    

    <script>
        function imprimirTabela() {
            // Selecione a tabela que você deseja imprimir
            var tabela = document.getElementById('tabela');
            var rodape = document.getElementById('rodape');
            var rodape_assinatura = document.getElementById('rodape-assinatura');

            // Imprima a tabela
            window.print();
        }
    </script>
    <?php
        function formatarCnpj($cnpj) {
            // Remove qualquer caracter não numérico
            $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

            // Aplica a máscara de CNPJ: XX.XXX.XXX/XXXX-XX
            return substr($cnpj, 0, 2) . '.' .
                substr($cnpj, 2, 3) . '.' .
                substr($cnpj, 5, 3) . '/' .
                substr($cnpj, 8, 4) . '-' .
                substr($cnpj, 12, 2);
        }
    ?>

</body>
</html>







