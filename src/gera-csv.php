<?php 


function geraCsv(array $lista)
{   
  $corrigePalavras = [
    "Papel Hignico" => "Papel Higiênico",
    "Brocolis" => "Brócolis",
    "Chocolate ao leit" => "Chocolate ao leite",
    "Sabao em po" => "Sabão em pó",
  ];

  $csv = fopen("compras-do-ano.csv", 'w');
  fputcsv($csv, ['Mês','Categoria','Produto','Quantidade']);
  foreach ($lista as $me => $meses) {
    foreach($meses as $cat => $categoria){
      foreach($categoria as $prod => $quantidade){
        unset($categoria[$prod]);
        if (array_key_exists($prod, $corrigePalavras)) {
          $prod = $corrigePalavras[$prod];
        }
        $cat = str_replace("_", " ", $cat);
        fputcsv($csv, [ucwords($me), ucwords($cat), ucwords($prod), ucwords($quantidade)]);
      }
    }
  }
  fclose($csv);
}


 