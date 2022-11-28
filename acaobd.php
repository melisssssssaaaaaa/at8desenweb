<?php
include_once('conf.inc.php');

try {
    //cria a conexão com o banco de dados
    $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

    // montar consulta
    $consulta = 'SELECT * FROM contato';

    // prepara a consulta para executar
    $comando = $conexao->prepare($consulta);

    //executa a consulta
    $comando->execute();

    //pega retorno da consulta
    $listacontatos = $comando->fetchAll();
    echo "<pre>";
    var_dump($listacontatos);

    echo "<table>";
    foreach($listacontatos as $contato){
        echo "<tr>";
        echo "<td>".$contato['id']."</td><td>".$contato['nome'].
                                 "</td><td>".$contato['sobrenome']."</td>";
        echo "</tr>";
    }
    echo "</table>";


} catch (PDOException $e) { // se ocorrer algum erro na execução da conexão com o banco
   print ("Erro ao conectar com o banco de dados... <br>".$e->getMessage());
   die(); 
}
