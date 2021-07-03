<?php

$compras = "CREATE TABLE compras (
    id int primary key auto_increment,
    data datetime not null
);
";

// Registros
$compras .= "INSERT INTO compras (data) VALUES \n";

for ($i=0; $i < 1000; $i++) {
    $data = $faker->date;

    if($i<1000-1){
        $compras .= "('$data'),\n";
    }else{
        $compras .= "('$data');\n";
    }
}
$fp = fopen("gerados/compras.sql", "w");
fwrite($fp, $compras);
fclose($fp);

print '<h3>Arquivo criado</h3>';
