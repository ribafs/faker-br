<?php
$estoques = "CREATE TABLE estoques (
    id int primary key auto_increment,
    quantidade int not null,
    quantidade_min int not null,
    data datetime,
    compra_id int not null,
	constraint compra_fk foreign key (compra_id) references compras(id)
);
";

// Registros
$estoques .= "INSERT INTO estoques (quantidade, quantidade_min, data, compra_id) VALUES \n";

for ($i=0; $i < 1000; $i++) {
    $quantidade = $faker->randomNumber($nbDigits = 3, $strict = false);
    $quantidade_min = $faker->randomNumber($nbDigits = 2, $strict = false);
	$data = $faker->date;
    $compra_id = $faker->numberBetween($min = 1, $max = 1000);

    if($i<1000-1){
        $estoques .= "($quantidade, $quantidade_min, '$data', $compra_id),\n";
    }else{
        $estoques .= "($quantidade, $quantidade_min, '$data', $compra_id);\n";
    }
}
$fp = fopen("gerados/estoques.sql", "w");
fwrite($fp, $estoques);
fclose($fp);

print '<h3>Arquivo criado</h3>';
