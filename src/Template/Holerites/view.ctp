<?php $this->layout = false; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite</title>
    <style>
        /* Estilos para a página A4 */
        @page {
            size: A4;
            margin: 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .page {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Estilos para o conteúdo do holerite */
        .holerite {
            padding: 20mm; /* Margens para o conteúdo */
        }

        /* Botão de impressão */
        .print-button {
            margin: 20px;
            text-align: center;
        }
        
        /* Estilos de impressão */
        @media print {
            .page {
                box-shadow: none;
                margin: 0;
                width: 100%;
                height: auto;
            }
            table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            margin: 0;
        }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="holerite">
        <h1>Seu Holerite</h1>
    <table>
        <tr>
            <th>Descrição</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Data:</td>
            <td>04 de setembro de 2023</td>
        </tr>
        <tr>
            <td>Salário:</td>
            <td>R$ 3.000,00</td>
        </tr>
        <tr>
            <td>Descontos:</td>
            <td>R$ 500,00</td>
        </tr>
        <tr>
            <td>Salário Líquido:</td>
            <td>R$ 2.500,00</td>
        </tr>
    </table>
        </div>
    </div>

    
</body>
    <div class="print-button">
        <button onclick="window.print()">Imprimir Holerite</button>
    </div>
</html>
