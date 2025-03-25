<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários e departamentos</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <form id="form_cadastro_funcionario" class="_form_cadastro" method="post" action="cadastrar_funcionario.php">
        <fieldset>
            <legend>Cadastro de funcionários</legend>
            <table>
                <tr> <td><label>Nome</label></td> <td><input type="text" name="nome"></td> </tr>
                <tr> <td><label>E-mail</label></td> <td><input type="e-mail" name="e-mail"></td> </tr>
                <tr> <td><label>CPF</label></td> <td><input type="number" name="cpf"></td> </tr>
                <tr> <td><label>Idade</label></td> <td><input type="number" name="idade"></td> </tr>
                <tr> <td><label>Departamento de trabalho</label></td> <td><select style="width:95%" name="departamentos"></select></td> </tr>
            </table>
            <input type="submit" value="cadastrar"/>
        </fieldset>
    </form>
    <form id="form_cadastro_funcionario" class="_form_cadastro" method="post" action="cadastrar_departamento.php">
        <fieldset>
            <legend>Cadastro de departamento</legend>
            <table>
                <tr> <td><label>Nome</label></td> <td><input type="text" name="departamento"></td> </tr>
            </table>
            <input type="submit" name="cadastrar_departamento" value="cadastrar"/>
        </fieldset>
    </form>

    <?php
        require("objects.php");
        // $dept1 = new Departamento("dept1");
        // $dept2 = new Departamento("dept2");
        // $vitor = new Funcionario("Vitor", "email@gmail.com", "00000000000", "29", $dept1);
        // $joao = new Funcionario("João", "email@gmail.com", "00000000000", "30", $dept2);
        // $andre = new Funcionario("Andre", "email@gmail.com", "00000000000", "28", $dept1);
        // $pedro = new Funcionario("Pedro", "email@gmail.com", "00000000000", "29", $dept2);
        // //print_r($vitor->lista_de_trabalho);
        // $lista1 = new ListaDeTrabalho($vitor);
        // //print_r($lista1->funcionario);
        // $lista1->atribuir_dia_hora_tarefa("2025-04-01","10:00","Limpar o escritório.");
        // $lista1->atribuir_dia_hora_tarefa("2025-04-01","12:00","Elaborar planilhas.");
        // $lista1->remover_dia_hora_tarefa("2025-04-01");
        // $dept1->remove_funcionario($vitor);
        // print_r($vitor->lista_de_trabalho->gerar_lista()["2025-04-01"]);
    ?>

</body>
</html>