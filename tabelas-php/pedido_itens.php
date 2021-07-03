<?php

$pedido_itens = "CREATE TABLE pedido_itens (
    id int primary key auto_increment,
    quantidade int not null,
    preco_venda numeric(12,2) not null,
    estoque_id int not null,
    pedido_id int not null,
    CONSTRAINT `fk-estoque` FOREIGN KEY (`estoque_id`) REFERENCES `estoques` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk-pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);\n\n";

$pedido_itens .= "INSERT INTO pedido_itens (quantidade, preco_venda, estoque_id, pedido_id) VALUES \n";

for ($i=0; $i < 1000; $i++) {   
    $quantidade = $faker->randomNumber($nbDigits = 4, $strict = false);
    $preco_venda = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2000);
    $estoque_id = $faker->numberBetween($min = 1, $max = 1000);
    $pedido_id = $faker->numberBetween($min = 1, $max = 1000);

    if($i<999){
        $pedido_itens .= "($quantidade,'$preco_venda', $estoque_id, $pedido_id),\n";
    }else{
        $pedido_itens .= "($quantidade,'$preco_venda', $estoque_id, $pedido_id);\n";
    }
}

$fp = fopen("gerados/pedido_itens.sql", "w");
fwrite($fp, $pedido_itens);
fclose($fp);

print "<h3>Arquivo criado</h3>";
