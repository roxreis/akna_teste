<?php 
include_once "gera-csv.php";
 

$lista = include_once "lista-de-compras.php";
 
$csv = geraCsv($lista);

// $ajuste = ajustaPalavras($lista);
