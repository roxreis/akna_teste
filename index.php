<?php 
include_once "src/gera-csv.php";
include_once "model/connection.php";


$lista = include_once "src/lista-de-compras.php";


$geraSql = salvaSql($lista);
if ($geraSql) {
  echo "<h3> Cadastrado no banco de dados com sucesso! <h3>";
}

$geraCsv = geraCsv($lista);
if ($geraSql) {
  echo "<h3> Criado arquivo csv com sucesso! <h3>";
}

 
