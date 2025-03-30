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
    <form id="form_cadastro_departamento" class="_form_cadastro" method="post" action="cadastrar_departamento.php">
        <fieldset>
            <legend>Cadastro de departamento</legend>
            <table>
                <tr> <td><label>Departamento</label></td> <td><input type="text" name="departamento"></td> </tr>
            </table>
            <input type="submit" name="cadastrar_departamento" value="cadastrar"/>
        </fieldset>
    </form>
    <form id="form_cadastro_lista_de_trabalho" class="_form_cadastro" method="post" action="cadastrar_lista_de_trabalho.php">
        <fieldset>
            <legend>Cadastro de lista_de_trabalho</legend>
            <table>
                <tr> <td><label>Lista de trabalho</label></td> <td><input type="text" name="lista_de_trabalho"></td> </tr>
                <tr> <td><label>Funcionário</label></td> <td><select style="width:95%" name="funcionário"></select></td> </tr>
                <tr> <td><label>Dia</label></td> <td><input type="date" name="dia"></td> </tr>
                <tr> <td><label>Hora</label></td> <td><input style="width:15%" type="number" name="hora"><span style="font-size:24px">:</span><input style="width:15%" type="number" name="minuto"></td> </tr>
                <tr> <td><label>Tarefa</label></td> <td><input type="text" name="tarefa"></td> </tr>
            </table>
            <input type="submit" name="cadastrar_lista_de_trabalho" value="cadastrar"/>
        </fieldset>
    </form>
    <div id="div_departamentos">
        
    </div>
    <?php
        require("objects.php");
    ?>

</body>
</html>