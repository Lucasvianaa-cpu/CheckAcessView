<?php $this->layout = false; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Holerite</title>
 
    
    <style>
        /* Estilos gerais para a página */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0 auto;
            width: 90%;
            height: 100vh;

        }

        .botao-imprimir {
            padding-top: 10px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        /* Estilos para a área do holerite */
        .holerite {
            
            margin: 0 auto;
            padding: 10px;
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
            padding: 8px;
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
            margin-top: 20px;
            text-align: center;
        }

        /* Estilos para a assinatura */
        .rodape-assinatura {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="botao-imprimir">
        <button onclick="">Retornar para Holerites</button>
        <button onclick="window.print()">Imprimir Holerite</button>
    </div>
        <table id="tabela">
            <thead>
                <tr>
                    <th colspan="5">Gigatron Franchising Ltda</th>
                </tr>
                <tr>
                    <th colspan="3" id="cnpj">CNPJ: 03.368.152/0001-30</th>
                    <th colspan="2" id="folha-mensal">Folha Mensal</th>
                </tr>
                <tr>
                    <th colspan="5" id="mes">Maio de 2023</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td colspan="3" id="nome-funcionario">Lucas Viana Rodrigues</td>
                    <td colspan="2" id="admissao">Admissão: 03/08/2020</td>
                </tr>
                <tr>
                    <td colspan="5" id="cargo">Suporte Tecnico</td>
                </tr>
                <tr id="coluna">
                    <td class="alinhar-centro">Código</td>
                    <td class="alinhar-centro">Descrição</td>
                    <td class="alinhar-centro">Referência</td>
                    <td class="alinhar-centro">Vencimentos</td>
                    <td class="alinhar-centro">Descontos</td>

                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom">1</td>
                    <td class="retirar-border-bottom">Salário do mês</td>
                    <td class="alinhar-direita retirar-border-bottom">31,00</td>
                    <td class="alinhar-direita retirar-border-bottom">1721,35</td>
                    <td class="alinhar-direita retirar-border-bottom"></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">250</td>
                    <td class="retirar-border-bottom retirar-border-top">Reflexo DSR</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">0,00</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">6,66</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">370</td>
                    <td class="retirar-border-bottom retirar-border-top">Adicional de Sobreaviso</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">4:00</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">10,09</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>  
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">204</td>
                    <td class="retirar-border-bottom retirar-border-top">Hora Extra 60%</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">2:00</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">25,04</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">545</td>
                    <td class="retirar-border-bottom retirar-border-top">Hora extra 80%</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">0:41</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">9,58</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                </tr>
                <tr>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">998</td>
                    <td class="retirar-border-bottom retirar-border-top">I.N.S.S.</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">7,88</td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top"></td>
                    <td class="alinhar-direita retirar-border-bottom retirar-border-top">139,74</td>
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
                    <td class="alinhar-centro-valor retirar-border-top">1772,72</td>
                    <td class="alinhar-centro-valor retirar-border-top">139,74</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="alinhar-centro">Valor Líquido</td>
                    <td class="alinhar-centro-valor">1632,98</td>
                </tr>
                <tr>
                    <td class="alinhar-centro">Salário Base</td>
                    <td class="alinhar-centro">Sal. Contr. INSS</td>
                    <td class="alinhar-centro">Base Cálc. FGTS</td>
                    <td class="alinhar-centro">F.G.T.S do Mês</td>
                    <td class="alinhar-centro">Valor IRRF</td>
                </tr>
                <tr>
                    <td class="alinhar-centro-valor">1721,35</td>
                    <td class="alinhar-centro-valor">1772,72</td>
                    <td class="alinhar-centro-valor">1772,72</td>
                    <td class="alinhar-centro-valor">141,81</td>
                    <td class="alinhar-centro-valor">0,00</td>
                </tr>

            </tbody>
        </table>
        <div class="rodape">
            <p>Declaro ter recebido a importância líquida determinada neste recibo.</p>
        </div>
        <div class="rodape-assinatura">
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
</body>
</html>







