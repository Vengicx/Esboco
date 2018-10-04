<?php
	$codigo = $_POST["codigo"];

    foreach ($codigo as $values){

    	echo $values;
    	echo "<br>";

    }

    $i = count($codigo);
    echo $i;
	