<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();


if(isset($_POST['submit']) && $_POST['submit'] == 'Submit answers')
{
   $result = $mainPlug->saveQuizzInput($_POST);
   if(isset($result) && $result == 'good')
   {
   header('Location: http://localhost/acaciaQuizApp/Results/');
   // print_r($result);
   die();
   }else{
      echo 'oops';
      die();
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Acacia Health Quizz</title>
</head>
<body>
    <div id="svg_wrap"></div>

    <form name="healthQuizz" onsubmit="return validateForm()" method="POST">
<?php

$result = $mainPlug->fetchQuestionsAndOptions();
while($row = mysqli_fetch_array($result))
{?>
   <section>
     <h2 class="quiz_h2"><?php echo $row['question']; ?> </h2>
     <p class="quiz_p">Let's get to know you a little better.</p>


    <div class="quiz_inner-wrapper">
        <input type="radio" id="fruit" name="<?php echo $row['code']; ?>" value="1" required/>
        <label for=""><?php echo $row['option1']; ?>  </label>
    </div> 
    <div class="quiz_inner-wrapper">
        <input type="radio" id="buscuits" name="<?php echo $row['code']; ?>" value="2" /> 
        <label for=""><?php echo $row['option2']; ?> </label>
    </div>
    <?php if(!empty($row['option3'])){ ?>
    <div class="quiz_inner-wrapper">
       <input type="radio"  id="wait" name="<?php echo $row['code']; ?>" value="3" />
       <label for=""><?php echo $row['option3']; ?> </label>
    </div>  
    <?php } ?>
    <?php if(!empty($row['option4'])){ ?>
    <div class="quiz_inner-wrapper">
       <input type="radio"  id="wait" name="<?php echo $row['code']; ?>" value="4" />
       <label for=""><?php echo $row['option4']; ?> </label>
    </div>  
    <?php } ?>
   </section>

   <?php

}
?>
     <div class="button" id="prev">&larr; Previous</div>
   <div class="button" id="next">Next &rarr;</div>
   <div>
      <input  class="button" id="submit" type="submit" name="submit" value="Submit answers">
   </div>
</form>
   
</body>
<script src="main.js" type="text/javascript" defer="defer"></script>
<script>
function validateForm() {
//   var x = document.forms["healthQuizz"]["q1"].value;
//   if (x) {
//     alert("Please fill out each section");
//     return false;
//   }else{
//    alert("section");
//   }


if( !document.healthQuizz.q1.value ) {
            alert( "Please provide your name!" );
            document.healthQuizz.q1.focus() ;
            return false;
         }
}
</script>
</html>