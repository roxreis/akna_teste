<?php 

function salvaSql(array $lista)
{

  try {
    $dns = "mysql:dbname=akna_teste;host=localhost";
    $user = "root";
    $pass = "1206";
    $conn = new PDO($dns, $user, $pass);
    return $conn;
  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();  
    return null;
  }
  

  $corrigePalavras = [
    "Papel Hignico" => "Papel Higiênico",
    "Brocolis" => "Brócolis",
    "Chocolate ao leit" => "Chocolate ao leite",
    "Sabao em po" => "Sabão em pó",
  ];
 
  foreach ($lista as $me => $meses) {
    $stmt = $conn->prepare("INSERT INTO lista_compras (mes) VALUES ('$me')");
    $stmt->execute();
    
    foreach($meses as $cat => $categoria){
      $cat = str_replace("_", " ", $cat);
      $stmt = $conn->prepare("INSERT INTO lista_compras (categoria) VALUES ('$cat')");
      $stmt->execute();

      foreach($categoria as $prod => $quantidade){
        unset($categoria[$prod]);
        if (array_key_exists($prod, $corrigePalavras)) {
          return $prod = $corrigePalavras[$prod];
        }
        $stmt = $conn->prepare("INSERT INTO lista_compras (produto, quantidade) VALUES ('$prod', '$quantidade')");
        $stmt->execute();

      }
    }
  }
}
  
