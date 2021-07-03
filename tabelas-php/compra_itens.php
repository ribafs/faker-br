<?php

$compra_itens = "CREATE TABLE compra_itens (
    id int primary key auto_increment,
    quantidade int not null,
    preco_unitario numeric(12,2),
    compra_id int not null,
    produto_id int not null,
	constraint compra_fk foreign key (compra_id) references compras(id),  
	constraint produto_fk foreign key (produto_id) references produtos(id)
);
";

// Registros
$compra_itens .= "INSERT INTO compra_itens (quantidade, preco_unitario, compra_id, produto_id) VALUES \n";

for ($i=0; $i < 1000; $i++) {
    $quantidade = $faker->randomNumber($nbDigits = 3, $strict = false);
	$preco_unitario = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2000);
    $compra_id = $faker->numberBetween($min = 1, $max = 1000);
    $produto_id = $faker->numberBetween($min = 1, $max = 1000);

    if($i<999){
        $compra_itens .= "($quantidade,'$preco_unitario', $compra_id, $produto_id),\n";
    }else{
        $compra_itens .= "($quantidade,'$preco_unitario', $compra_id, $produto_id);\n";
    }
}
$fp = fopen("gerados/compra_itens.sql", "w");
fwrite($fp, $compra_itens);
fclose($fp);

print '<h3>Arquivo criado</h3>';
