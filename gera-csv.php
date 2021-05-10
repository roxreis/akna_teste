<?php 


function geraCsv(array $lista){

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
        $categoria[$prod] = $quantidade;
        fputcsv($csv, [$me,$cat,$prod,$quantidade]);
      }
      unset($meses[$cat]);
      $me = ucwords(str_replace("_", " ", $me));
      $meses[$cat] = $categoria;
    }
    $lista[$me] = $meses;
    
    // var_dump($lista[$me] );
  }
  fclose($csv);
}


 

// $headers = ['Mês', 'Categoria', 'Produto', 'Quantidade'];

// $arquivo = fopen("compras-do-ano.csv", "w");

// // Criar o cabeçalho
// fputcsv($arquivo , $headers);

// $mes = [];

// foreach ($lista as $valor => $linha) {
//   array_push($mes, $valor);
//   fputcsv($arquivo , $mes);
// }


// fclose($arquivo);


// $arquivo = fopen('file.csv', 'w');

// fputcsv($arquivo, $headers);

// // Popular os dados
// foreach ($dados as $linha) {
//     fputcsv($arquivo, $linha);
// }

// // Fechar o arquivo
// fclose($arquivo);



// $Mês = $listaCompras[1];
// var_dump($dados);
// $Categoria = [];
// $Produto = [];
// $Quantidade = [];

// // Get maximum size
// $maxLength = max(count($Mês), count($Categoria), count($Produto), count($Quantidade));

// // Write headers manually
// fputcsv($arquivo, ["Mês", "Categoria", "Produto", "Quantidade"]);

// for ($i = 0; $i < $maxLength; $i++) {
//   // If key does not exist use empty string
//   $data = [
//     $Mês[$i] ?? "",
//     $Categoria[$i] ?? "",
//     $Produto[$i] ?? "",
//     $Quantidade[$i] ?? ""
//   ];
  
//   fputcsv($arquivo, $data);
// }

 