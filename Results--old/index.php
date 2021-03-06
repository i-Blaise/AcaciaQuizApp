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
      $finalResult = round($rawResult, 0);
      // $finalResult = 50;
      
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttonStyle.css">



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
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a class="nav-title" href="http://localhost/acaciaQuizApp/">
            <img src="../Home/images/acacia.png" alt="" width="170">
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
         <?php if(isset($finalResult) && $finalResult >= '70') {?>
        <div class="left-col_wrapper">
               <h2 class="left-col_h2">Your Score is <?php echo $finalResult ?>%!! You???re a champ!</h2>
               <p class="left-col_p">We admire your dedication to your well-being;  you make conscious choices to ensure you're in good health. We encourage you to keep up the great work maintaining healthy lifestyles that promote healthy living.</p>
               <iframe src="https://giphy.com/embed/daxx90f4tsnraRxhZI" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/westvirginiau-wvu-mountaineer-mascot-daxx90f4tsnraRxhZI"></a></p>

                <p class="center-col_p">
          Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
          </p>
        </div>
         <?php } elseif(isset($finalResult) && $finalResult >= '50') {?>
          <div class="left-col_wrapper">
               <h2 class="left-col_h2">Your Score is <?php echo $finalResult ?>%! We admire your effort!</h2>
               <p class="left-col_p">You're off to a great start as far as wellbeing goes,  learn more ways to improve on your health choices,  because healthy choices promote better living.</p>
               <iframe src="https://giphy.com/embed/cdItLch8J2dBfAZJq4" width="270" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/gap-good-job-the-gap-cdItLch8J2dBfAZJq4"></a></p>

                <p class="center-col_p">
          Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
          </p>
        </div>
         <?php } elseif(isset($finalResult) && $finalResult >= '30') {?>
          <div class="left-col_wrapper">
               <h2 class="left-col_h2">Your Score is <?php echo $finalResult ?>%! Could be better!</h2>
               <p class="left-col_p">Practice more ways to ensure healthy living, get more in touch with your health with the consciousness that deliberate healthy choices promote healthy living. Be more deliberate.</p>
               <iframe src="https://giphy.com/embed/5pUHtgG70JjO9YHZPD" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/brooklynninenine-nbc-tv-show-brooklyn99-5pUHtgG70JjO9YHZPD"></a></p>

                <p class="center-col_p">
          Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
          </p>
        </div>
         <?php } elseif(isset($finalResult) && $finalResult < '30') {?>
          <div class="left-col_wrapper">
               <h2 class="left-col_h2">Your Score is <?php echo $finalResult ?>%! You could still make it!</h2>
               <p class="left-col_p">Did you know that your everyday choices determine and influence the outcome of your health? We create and sustain general wellness by making well informed decisions regarding our health and lifestyles. So, we encourage you, to get that meal plan, choose achievable cardio routines, get that membership, or find out ways you can improve your lifestyle that bests suit you. Remember to start small.</p>
                <iframe src="https://giphy.com/embed/12XDYvMJNcmLgQ" width="480" height="359" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/luck-good-im-rooting-for-you-12XDYvMJNcmLgQ"></a></p>

          <p class="center-col_p">
          Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
          </p>
        </div>
         <?php }?>


           <div class="right-col_wrapper">
               <h4 class="right-col_h4">Your Quiz Results!</h4>
               <h2 class="right-col_h2"></h2>
                <form id="results-form" method="POST" action="">
                    <label class="form-header">Entering your email below to <br> <span class="bold-q">recieve your quiz results</span> </label>
                    <input type="email" id="email" name="email" placeholder="Your email">
                    <input type="submit" id="submit" name="submit" value="Send Results To My Email">
                    <p class="c-ryt">By clicking the button above, you are creating an account with Acacia and agree to our <a href="">Privacy Policy</a> and <a href="">Terms of Use</a>, including receiving emails.</p>
                </form>
           </div>
       </div>
       <div class="socials">
        <a href="#" class="float" id="menu-share">Let's Get Social<i class="fa fa-share my-float"></i></a>
        <ul>
          <li><a href="https://web.facebook.com/acaciahealthinsurance" target="_blank"><i class="fa fa-facebook my-float"></i></a></li>
          <li><a href="https://www.instagram.com/acaciahealthinsurance/" target="_blank"><i class="fa fa-instagram my-float"></i></a></li>
          <li><a href="https://twitter.com/acaciahealth2?s=21" target="_blank"><i class="fa fa-twitter my-float"></i></a></li>
        </ul>
       </div>
       <footer></footer>
   </section> 
</body>
</html>