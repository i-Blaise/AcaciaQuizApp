<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();
	// For php mailer
	require_once '../vendor/autoload.php';

if(isset($_GET['code']))
{
  $emailSent = false;
  $unique_code = $_GET['code'];
  $result = $mainPlug->fetchAnswersWithCode($unique_code);
    $row = mysqli_fetch_array($result);
      $sumResult = $row['q1']+$row['q2']+$row['q3']+$row['q4']+$row['q5']+$row['q6']+$row['q7']+$row['q8'];
      $rawResult = $sumResult/16 * 100;
      // $finalResult = round($rawResult, 0);
      $finalResult = 70;
      
  $resultUpdate = $mainPlug->updateResults($unique_code, $finalResult);
  if($resultUpdate != 'good')
  {
    echo 'oopsss';
    // print_r($resultUpdate);
    die();
  }

  if(isset($finalResult) && $finalResult >= '70') {
  $scoreHeader = "Your Score is ".$finalResult."%!! You are a champ!";
  $scoreMessage = "We admire your dedication to your well-being; <br> you make conscious choices to ensure you're in good health. <br>We encourage you to keep up the great work maintaining healthy lifestyles that promote healthy living.";

  }elseif(isset($finalResult) && $finalResult >= '50') {
  $scoreHeader = "Your Score is ".$finalResult."%! We admire your effort!";
  $scoreMessage = "You're off to a great start as far as wellbeing goes, <br> learn more ways to improve on your health choices, <br> because healthy choices promote better living.";

  } elseif(isset($finalResult) && $finalResult >= '30') {
  $scoreHeader = "Your Score is ".$finalResult."%! Could be better!";
  $scoreMessage = "Practice more ways to ensure healthy living, get more in touch with your <br>health with the consciousness that deliberate healthy choices promote healthy living. <br>Be more deliberate.";

  } elseif(isset($finalResult) && $finalResult < '30') {
  $scoreHeader = "Your Score is ".$finalResult."%! You could still make it!";
  $scoreMessage = "Did you know that your everyday choices determine and influence the outcome of your health? <br>We create and sustain general wellness by making well informed decisions regarding our health and lifestyles.<br> So, we encourage you, to get that meal plan, choose achievable cardio routines, <br>get that membership, or find out ways you can improve your lifestyle that bests suit you. <br>Remember to start small.";
  }









}
          
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">




          <!-- Notification -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Live Healthy with Acacia </title>
</head>




<?php
  if(isset($_POST['submit']) && $_POST['submit'] == 'Send Results To My Email')
  {
    if(isset($_POST['email']))
    {
      $email = $_POST['email'];
  
      $emailResult = $mainPlug->sendEmail($email, $scoreHeader, $scoreMessage);
      if($emailResult == 'sent')
      {
        ?>
          <!-- Notification -->
          
  <script src="redirect_history.js"></script>
  
       <script type='text/javascript'>   
      $(document).ready(function() {      
      toastr.options.positionClass = "toast-top-right";
      toastr.options.closeButton = true;
      toastr.options.closeDuration = 300;
      toastr.success('We have emailed you your results!', 'Awesome!!');
  });
  </script>
       
         <?php
      }else{
        print_r($emailResult);
        die();
      }
    }
  }
?>


<body>
   <section id="main-wrapper">
    <div class="nav animate__animated animate__slideInDown">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a class="nav-title" href="#">
            <img src="images/acacia.png" alt="" width="200">
          </a>
        </div>
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        <div class="nav-links">
          <a href="#" target="_blank">Contact Us</a>
          <a href="#" target="_blank">Help Center</a>
        </div>
      </div>
       <div class="inner-wrapper">
        <div class="left-col_wrapper">
          <h3 class="left-col_h3 animate__animated animate__lightSpeedInLeft">Your Quiz Results!</h3>
          <?php if(isset($finalResult) && $finalResult >= '70') {?>
               <h2 class="left-col_h2 animate__animated animate__lightSpeedInLeft">Your Score is <?php echo $finalResult ?>%! <br>
               You’re a champ!</h2>
               <p class="left-col_p animate__animated animate__lightSpeedInLeft">We admire your dedication to your well-being;  you make conscious choices to ensure you're in good health. We encourage you to keep up the great work maintaining healthy lifestyles that promote healthy living.</p>
               <img class="gif-img animate__animated animate__lightSpeedInLeft" src="images/account-created.gif" alt="" width="450">
          <?php } elseif(isset($finalResult) && $finalResult >= '50') {?>
            <h2 class="left-col_h2 animate__animated animate__lightSpeedInLeft">Your Score is <?php echo $finalResult ?>%! <br>
                We admire your effort.</h2>
               <p class="left-col_p animate__animated animate__lightSpeedInLeft">You're off to a great start as far as wellbeing goes, learn more ways to improve on your health choices, because healthy choices promote better living.</p>
               <img class="gif-img animate__animated animate__lightSpeedInLeft" src="images/account-created.gif" alt="" width="450">
          <?php } elseif(isset($finalResult) && $finalResult >= '30') {?><h2 class="left-col_h2 animate__animated animate__lightSpeedInLeft">Your Score is <?php echo $finalResult ?>%! <br>
            Could be better!</h2>
               <p class="left-col_p animate__animated animate__lightSpeedInLeft">Practice more ways to ensure healthy living, get more in touch with your health with the consciousness that deliberate healthy choices promote healthy living. Be more deliberate.</p>
               <img class="gif-img animate__animated animate__lightSpeedInLeft" src="images/account-created.gif" alt="" width="450">
          <?php } elseif(isset($finalResult) && $finalResult < '30') {?><h2 class="left-col_h2 animate__animated animate__lightSpeedInLeft">Your Score is <?php echo $finalResult ?>%! <br>
            You could still make it!</h2>
               <p class="left-col_p animate__animated animate__lightSpeedInLeft">Did you know that your everyday choices determine and influence the outcome of your health? We create and sustain general wellness by making well informed decisions regarding our health and lifestyles. So, we encourage you, to get that meal plan, choose achievable cardio routines, get that membership, or find out ways you can improve your lifestyle that bests suit you. Remember to start small.</p>
               <img class="gif-img animate__animated animate__lightSpeedInLeft" src="images/account-created.gif" alt="" width="450">
          <?php } ?>
              </div>
              <div class="right-col_wrapper animate__animated animate__slideInRight">
               <h3 class="right-col_h3">Ready to see which areas of your health to improve?</h3>
                <form id="results-form" method="POST" action="">
                     <input type="email" id="email" name="email" placeholder="Enter your email">
                    <input type="submit" id="submit" name="submit" value="Send results">
                    <!-- <p class="c-ryt">By clicking the button above, you are creating an account with Acacia and agree to our <a href="">Privacy Policy</a> and <a href="">Terms of Use</a>, including receiving emails.</p> -->
                </form>
                <div class="container">
                <div class="row" >
                  <h3 class="right-col_h3">Take a minute to ....</h3>
                <p class="center-col_p">
                  Follow our social media pages for more information on <br>
                  our health policies and learn more ways to improve your <br>
                  lifestyle and live a healthier happier life for yourself and <br>
                  your loved ones
                </p>
                <div class="social-wrapper">
                  <a class="social-icon" href="#"><img src="images/facebook-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" href="#"><img src="images/instagram-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" href="#"><img src="images/twitter-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" href="#"><img src="images/youtube-brands.svg" alt="" width="60"></a>
                </div>
                <div class="web-mess">
                  <p>To learn more about Acacia Health Insurance</p>
                  <a href="">Click here.</a>
                </div>
                </div>
                </div>
           </div>
       </div>
   </section> 
</body>
</html>