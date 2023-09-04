<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Holerite</title>
    <style>
        /* Estilos gerais para a página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilos para a área do holerite */
        .holerite {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Estilos para o cabeçalho do holerite */
        .cabecalho {
            text-align: center;
            padding: 10px;
        }

        .cabecalho h1 {
            font-size: 24px;
        }

        .cabecalho p {
            font-size: 16px;
        }

        /* Estilos para a tabela de informações do holerite */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para o rodapé do holerite */
        .rodape {
            margin-top: 20px;
            text-align: center;
        }

        /* Estilos para a assinatura */
        .assinatura {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <button onclick="imprimirHolerite()">Imprimir</button>

    <div class="holerite">
        <div class="cabecalho">
            <h1>Holerite</h1>
            <p>Nome: John Doe</p>
            <p>Departamento: Recursos Humanos</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salário Base</td>
                    <td>R$ 5.000,00</td>
                </tr>
                <tr>
                    <td>Horas Extras</td>
                    <td>R$ 500,00</td>
                </tr>
                <tr>
                    <td>Descontos</td>
                    <td>R$ 200,00</td>
                </tr>
                <tr>
                    <td>Total Líquido</td>
                    <td>R$ 5.300,00</td>
                </tr>
            </tbody>
        </table>
        <div class="rodape">
            <p>Este é um holerite de exemplo</p>
        </div>
        <div class="assinatura">
            <p>___________________________</p>
            <p>Assinatura</p>
        </div>
    </div>
</body>
</html>
