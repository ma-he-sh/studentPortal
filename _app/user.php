<?php
    /**
     * User Query
     */

    if(isset($_POST['submitQuestion']) && $_POST['postQuestion'] != null){
        $questID = uniqueID();
        $postQuestion = $_POST['postQuestion'];

        $sql = "INSERT INTO `question`(`id`, `email`, `question`, `answer`) 
                VALUES ('$questID', '$user_email', '$postQuestion', 'null')";

        if($conn->query($sql) === TRUE){
            echo "QUESTION SUBMITTED";
            header('Location: ../_user/portal');
        }else{
            echo "FAILED";
            header('Location: ../_user/portal');
        }
    }

    //delete unanswered question
    if(isset($_POST['btnDeleteQuestion'])){
        $questID = $_POST['questionID'];

        $sql = "DELETE FROM `question` WHERE `id`='".$questID."'";

        if($conn->query($sql) === TRUE){
            echo "QUESTION DELETED";
            header('Location: ../_user/portal');
        }else{
            echo "FAILED";
            header('Location: ../_user/portal');
        }
    }