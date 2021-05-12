<?php

require_once('DatabaseCon.php');

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

    function saveQuizzInput($quizzAnswers)
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
            $q11 = $quizzAnswers['q11'];

            $myQuery = "INSERT INTO quizz_answers  (
                q1,
                q2,
                q3,
                q4,
                q5,
                q6,
                q7,
                q8,
                q9,
                q10,
                q11) VALUES (
                '$q1',
                '$q2',
                '$q3',
                '$q4',
                '$q5',
                '$q6',
                '$q7',
                '$q8',
                '$q9',
                '$q10',
                '$q11')";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }

}