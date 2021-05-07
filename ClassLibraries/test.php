<?php

require_once('MainClass.php');
$testDBcon = new mainClass();



// $result = $testDBcon->dbtest();
$result = $testDBcon->anotherTest();

var_dump($result);