<?php

require_once('MainClass.php');
$testDBcon = new mainClass();



// $result = $testDBcon->dbtest();
// $result = $testDBcon->updateResults($unique_code, $finalResult);
// $row = json_encode($result);
// foreach ($result as $port) 
// 		{
//             echo $port['question'];
//         }
// while($row = mysqli_fetch_array($result))
// {
//     echo $row['unique_code'];

// }
// echo $result;
// print_r($row);
// var_dump($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Covid Test Portal - The Trust Hospital</title>
	<link rel="icon" type="image/png" href="img/trust-logo.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

/*h2, h3{*/
/*  text-align: center;*/
/*  margin-left: auto;*/
/*  margin-right: auto;*/
/*}*/

h1 {
    font-family: Montserrat, sans-serif;
    margin-bottom: .5rem!important;
    font-weight: 700;
    color: darkgray;
}

h2 {
    font-family: Montserrat, sans-serif;
    text-align: left!important;
    margin: 2rem 0 .5rem !important;
    width: 80%;
    font-size: 27px;
    font-weight: 500;
}
h3 {
    font-family: Montserrat, sans-serif;
    text-align: left!important;
    margin: 1.5rem 0!important;
    width: 80%;
    font-size: 16px;
    color: darkorange;
}
.h3-one {
    margin: 0 0 1.5rem!important;
}

/*Mobile Style*/

@media only screen and (max-width: 767px) {
   body {
    max-width: 100vw;
}
.multi-button {
    display: flex;
    width: 100%;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}
h2 {
    width: 100%;
}
h3 {
    width: 100%;
}
}

</style>
</head>
<body>

<table>
  <tr>
    <th>Full Name: </th>
    <td id="name">ok</td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td id="email">ok</td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td id="phone">ok</td>
  </tr>
  <tr>
    <th>Gender: </th>
    <td><ok</td>
  </tr>
  <tr>
    <th>Passport ID: </th>
    <td>ok</td>
  </tr>

</table>
</body>
<html>