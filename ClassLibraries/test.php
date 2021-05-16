<?php

require_once('MainClass.php');
$testDBcon = new mainClass();



// $result = $testDBcon->dbtest();
$result = $testDBcon->fetchQuestionsAndOptions();
// $row = json_encode($result);
// foreach ($result as $port) 
// 		{
//             echo $port['question'];
//         }
while($row = mysqli_fetch_array($result))
{
    echo $row['question'];

}
// echo $result;
// print_r($row);
// var_dump($result);