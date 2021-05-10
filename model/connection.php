<?php 

try {
  $dns = "mysql:dbname=akna_teste;host=localhost";
  $user = "root";
  $pass = "1206";
} catch (PDOException $e) {
  echo "Erro: " . $e->getMessage();  
}