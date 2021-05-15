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
   <section>
     <h2 class="quiz_h2">When taking snacks, I’ll prefer…</h2>
     <p class="quiz_p">Let's get to know you a little better.</p>
     <div class="quiz_inner-wrapper">
        <input type="radio" id="fruit" name="q1" value="1" required/>
        <label for="">Fruit, veg, nuts, popcorn or yogurt </label>
     </div> 
    <div class="quiz_inner-wrapper">
        <input type="radio" id="buscuits" name="q1" value="2" /> 
        <label for="">Processed biscuits, sweets, shawarma, chocolate </label>
    </div>
     <div class="quiz_inner-wrapper">
        <input type="radio" id="dont" name="q1" value="3" />
        <label for="">I don’t snack</label>
     </div>  
   </section>
   
   <section>
    <h2 class="quiz_h2">When I’m done eating…</h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="fill" name="q2" value="1" required/>
       <label for="">Fill my glass please (wine, beverage etc)  </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="drink" name="q2" value="2"  /> 
       <label for="">I drink water right after </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio"  id="wait" name="q2" value="3" />
       <label for="">I wait for a while and drink water </label>
    </div>  
  </section>
   
  <section>
    <h2 class="quiz_h2">Which will you use? </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="staircase" name="q3" value="1"  required/>
       <label for="">Staircase </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="elevator" name="q3" value="2"  /> 
       <label for="">Elevator</label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="crush" name="q3" value="3"  />
       <label for="">I’ll crush at the ground floor </label>
    </div>  
  </section>
   
  <section>
    <h2 class="quiz_h2">During my day, I take time to stretch and relax </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="me" name="q4" value="1"  required/>
       <label for="">Yeah that’s me  </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="remember" name="q4" value="2"  /> 
       <label for="">When I remember  </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="fridge" name="q4" value="3"  />
       <label for="">Only to the fridge and back </label>
    </div>  
  </section>

  <section>
    <h2 class="quiz_h2">To exercise my brain, I </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="games" name="q5" value="1"  required/>
       <label for="">Play lots of games, puzzles, and quizzes  </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="music" name="q5" value="2"  /> 
       <label for="">Listen to music and/or dance </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="sleep" name="q5" value="3"  />
       <label for="">Sleep</label>
    </div>  
  </section>
  
  <section>
    <h2 class="quiz_h2">I visit the hospital regularly for checkups </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="doctor" name="q6" value="1"  required/>
       <label for="">Oh yes. My doctor is my friend (often) </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="sometimes" name="q6" value="2" /> 
       <label for="">Sometimes </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="unwell" name="q6" value="3" />
       <label for="">Unless I’m unwell (when there’s a need)</label>
    </div>  
    <div class="quiz_inner-wrapper">
        <input type="radio" id="visits" name="q6" value="4" />
        <label for="">Eeerrmm…. Next question please (never visits) </label>
     </div>  
  </section>

  <section>
    <h2 class="quiz_h2">To ease my headaches and pains, I </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="doctor" name="q7" value="1" required/>
       <label for="">Prefer natural remedies  </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="med" name="q7" value="2" /> 
       <label for="">Medications</label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="die" name="q7" value="3" />
       <label for="">Forget it, I won’t die </label>
    </div>  
  </section>

  <section>
    <h2 class="quiz_h2">When I’m overly stressed, …. </h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="breath" name="q8" value="1" required/>
       <label for="">I practice breathing exercises</label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="hand" name="q8" value="2" /> 
       <label for="">I throw my hand </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="go" name="q8" value="3" />
       <label for="">I let go</label>
    </div>
    <div class="quiz_inner-wrapper">
      <input type="radio" id="cry" name="q8" value="4" />
      <label for="">I go to the washroom and cry </label>
   </div>   
  </section>

  <section>
    <h2 class="quiz_h2">I have difficulty sleeping</h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="sleep" name="q9" value="1" required/>
       <label for="">Yes, I almost never sleep  </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="hit" name="q9" value="2" /> 
       <label for="">Just when I hit the bed, I’m gone  </label>
   </div>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="worry" name="q9" value="3" />
       <label for="">It will take some time but I will sleep eventually without much worry </label>
    </div>  
  </section>

  <section>
    <h2 class="quiz_h2">Which one are you?</h2>
    <p class="quiz_p">Let's get to know you a little better.</p>
    <div class="quiz_inner-wrapper">
       <input type="radio" id="behind" name="q10" value="1" required/>
       <label for="">Seated properly behind the desk </label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="radio" id="bent" name="q10" value="2"  /> 
       <label for="">Seated with neck bent over  </label>
   </div> 
  </section>

  <section>
   <h2 class="quiz_h2">Which one are you?</h2>
   <p class="quiz_p">Let's get to know you a little better.</p>
   <div class="quiz_inner-wrapper">
      <input type="radio" id="screen" name="q11" value="1"  required/>
      <label for="">Seated away from screen</label>
   </div> 
  <div class="quiz_inner-wrapper">
      <input type="radio" id="close" name="q11" value="2"  /> 
      <label for="">Seated almost close to the screen </label>
  </div> 
 </section>
   
     <div class="button" id="prev">&larr; Previous</div>
   <div class="button" id="next">Next &rarr;</div>
   <!-- <div class="button" type="submit" id="submit" value="sumbit">Submit answers</div> -->
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