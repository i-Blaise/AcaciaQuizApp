<?php

require_once('DatabaseCon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mainClass extends DataBase{

    function dbtest(){
        $result = $this->dbh;
        return $result;
    }

    function anotherTest(){
        $myQuery = "SELECT * FROM id ORDER BY DESC";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function saveQuizzInput($quizzAnswers, $unique_code)
    {

        if(is_object($quizzAnswers) || is_array($quizzAnswers))
        {
            $q1 = $quizzAnswers['q1'];
            $q2 = $quizzAnswers['q2'];
            $q3 = $quizzAnswers['q3'];
            $q4 = $quizzAnswers['q4'];
            $q5 = $quizzAnswers['q5'];
            $q6 = $quizzAnswers['q6'];
            $q7 = $quizzAnswers['q7'];
            $q8 = $quizzAnswers['q8'];
            $q9 = $quizzAnswers['q9'];
            $q10 = $quizzAnswers['q10'];

            $myQuery = "INSERT INTO quizz_answers  (
                unique_code,
                q1,
                q2,
                q3,
                q4,
                q5,
                q6,
                q7,
                q8,
                q9,
                q10) VALUES (
                '$unique_code',
                '$q1',
                '$q2',
                '$q3',
                '$q4',
                '$q5',
                '$q6',
                '$q7',
                '$q8',
                '$q9',
                '$q10')";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }


    function fetchQuestionsAndOptions()
    {
        $myQuery = "SELECT * FROM quizz_questions";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchAnswersWithCode($unique_code)
    {
        $myQuery = "SELECT * FROM quizz_answers WHERE unique_code = '$unique_code'";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }


    function updateResults($unique_code, $finalResult)
    {
        $myQuery = "UPDATE quizz_answers
        SET results = '$finalResult'
        WHERE unique_code = '$unique_code';";
        $result = mysqli_query($this->dbh, $myQuery);
        if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }
    }




    function sendEmail($email, $scoreHeader, $scoreMessage)
    {
  
  
    //PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
    

    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'test@acaciaquizz.sonzie.online';
    $mail->Password = 'Mennia123';
    
    
    //From email address and name
    $mail->From = "test@acaciaquizz.sonzie.online";
    $mail->FromName = "Acacia Health Quizz";
    
    //To address and name
    $mail->addAddress($email);
    // $mail->addAddress("menniablaise@hotmail.com");
    
    //Address to which recipient will reply
    // $mail->addReplyTo("menniablaise@yahoo.com", "Reply");
    
    //CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    
    $mail->Subject = "Acacia Health Quiz Results";
    $mail->Body = '<h2> '.$scoreHeader.'<h2> <br> <br> <p>'.$scoreMessage.'</p>';
    // $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            return 'sent';
        }else{
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }


}