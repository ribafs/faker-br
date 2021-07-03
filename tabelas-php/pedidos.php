<?php

$pedidos = "CREATE TABLE pedidos (
    id int primary key auto_increment,
    data date not null,
    quantidade int,
    produto_id int not null,
    CONSTRAINT `fk-produto` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);\n\n";

$pedidos .= "INSERT INTO pedidos (data, quantidade, produto_id) VALUES \n";

for ($i=0; $i < 1000; $i++) {   
    $data = $faker->date;
    $quantidade = $faker->numberBetween($min = 1, $max = 1000);
    $produto_id = $faker->numberBetween($min = 1, $max = 1000);

    if($i<999){
        $pedidos .= "('$data','$quantidade', '$produto_id'),\n";
    }else{
        $pedidos .= "('$data','$quantidade', '$produto_id');\n";
    }
}

$fp = fopen("gerados/pedidos.sql", "w");
fwrite($fp, $pedidos);
fclose($fp);


