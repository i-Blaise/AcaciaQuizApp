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

    function saveBrandQuestionInput($quizzBrandAnswers, $unique_code)
    {

        if(is_object($quizzBrandAnswers) || is_array($quizzBrandAnswers))
        {
            $s1 = $quizzBrandAnswers['s1'];
            $s2_option1 = (!empty($quizzBrandAnswers['s2_option1'])) ? $quizzBrandAnswers['s2_option1'] : NULL;
            $s2_option2 = (!empty($quizzBrandAnswers['s2_option2'])) ? $quizzBrandAnswers['s2_option2'] : NULL;
            $s2_option3 = (!empty($quizzBrandAnswers['s2_option3'])) ? $quizzBrandAnswers['s2_option3'] : NULL;
            $s2_option4 = (!empty($quizzBrandAnswers['s2_option4'])) ? $quizzBrandAnswers['s2_option4'] : NULL;
            $s2_option5 = (!empty($quizzBrandAnswers['s2_option5'])) ? $quizzBrandAnswers['s2_option5'] : NULL;
            $s3_option1 = (!empty($quizzBrandAnswers['s3_option1'])) ? $quizzBrandAnswers['s3_option1'] : NULL;
            $s3_option2 = (!empty($quizzBrandAnswers['s3_option2'])) ? $quizzBrandAnswers['s3_option2'] : NULL;
            $s3_option3 = (!empty($quizzBrandAnswers['s3_option3'])) ? $quizzBrandAnswers['s3_option3'] : NULL;

            $myQuery = "INSERT INTO quizz_brand_answers (
                unique_code,
                s1,
                s2_option1,
                s2_option2,
                s2_option3,
                s2_option4,
                s2_option5,
                s3_option1,
                s3_option2,
                s3_option3) VALUES (
                '$unique_code',
                '$s1',
                '$s2_option1',
                '$s2_option2',
                '$s2_option3',
                '$s2_option4',
                '$s2_option5',
                '$s3_option1',
                '$s3_option2',
                '$s3_option3');";

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

    function fetchLastUserUniqueCode()
    {
        $myQuery = "SELECT unique_code FROM quizz_answers ORDER BY id DESC";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchFirstSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchSecondSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 2";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchThirdSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 3";
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
    
    $mail->Subject = "Living Healthy with Acacia";
    // $mail->Body = '<h2> '.$scoreHeader.'<h2> <br> <br> <p>'.$scoreMessage.'</p>';
    $mail->Body = '<!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <!--[if mso]>
        <noscript>
            <xml>
                <o:OfficeDocumentSettings>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
        </noscript>
        <![endif]-->
        <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
        </style>
    </head>
    <body style="margin:0;padding:0;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                        <tr>
                            <td align="center" style="padding:40px 0 30px 0;background:#fcfcfc;">
                                <img src="https://acaciaquizz.sonzie.online/Home/images/acacia.png" alt="" width="300" style="height:auto;display:block;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:36px 30px 42px 30px;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding:0 0 36px 0;color:#153643;">
                                            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">'. $scoreHeader .'</h1>
                                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">'. $scoreMessage .'</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0;">
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr><h2>These are the best answers to the Quiz Questions</h2></tr>
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">1. Do you think exercises are relevant to general well-being?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, to stay healthy one must keep fit <br>- Yes, I take walks as cardio </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">2. What is your go to work out routine?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Jogs and different work out routines <br>- I have a gym membership, I don’t play </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">3. How many hours of sleep do you get daily?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Solid 6/8 hours of sleep </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">4. Do you have scheduled sleep and rest patterns?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, I do, sleep and rest times are important  <br>-  I don’t have a timetable, but I do get enough sleep </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">5. How many meals do you have daily?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- 1-1-1 I ensure to have three whole meals everyday </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">6. Do you subscribe to balanced diets?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, I ensure my meals are healthy and a balanced mix of food classes </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">7. When are you most productive at work?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- In the morning, that’s my most productive time of the day </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">8. Do you have good sitting/working posture?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, I sit up right <br>- I view my work screens from calculated angles </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">9. Do you pay attention to mental health and therapy? </p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, and I have therapy sessions when necessary <br>- Yes, I meditate and do yoga </p>
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <table role="presentation" style="width:100%;border-collapse:collapse;border-bottom:1px solid black;border-spacing:0;">
                                                <tr>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">10. Do you think mental health influences your relationship with people?</p>
                                                    </td>
                                                    <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                    <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">- Yes, it influences my relationships and productivity a great deal <br>- Yes, mental health is just as important as physical health </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background:#683191;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                    <tr>
                                        <td style="padding:0;width:50%;" align="left">
                                            <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                &reg; Acacia Health Insurance 2021<br/><a href="https://ahighana.com/" style="color:#ffffff;text-decoration:underline;">Visit Acacia</a>
                                            </p>
                                        </td>
                                        <td style="padding:0;width:50%;" align="right">
                                            <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                <tr>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                        <a href="https://twitter.com/health_acacia" style="color:#ffffff;"><img src="https://acaciaquizz.sonzie.online/emailTemp/images/twitter.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                        <a href="https://web.facebook.com/acaciahealthinsurance" style="color:#ffffff;"><img src="https://acaciaquizz.sonzie.online/emailTemp/images/facebook.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';
    // $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            return 'sent';
        }else{
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }


}