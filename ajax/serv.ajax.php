<?php

include "../controllers/serv.controller.php";
include "../models/serv.model.php";
include "../controllers/user.controller.php";
include "../models/user.model.php";

session_start();
$userId = $_SESSION['idUser'];

if(isset($_POST['SAVE'])) {

    $data = json_decode($_POST['SAVE'], true);
    $questionId = $data['questionId'];
    $responseId = $data['responseId'];
    
    // Save Responses
    $response = QuestionController::setQuestion($userId, $questionId, $responseId);

    if($response == 'ok') {

        $dataResponseCorrect = QuestionModel::getQuestion($questionId);
        $responseCorrect = $dataResponseCorrect['response'];

        if($responseCorrect==$responseId) {

            $getPointUser = UserModel::getUser($userId);
            $newValue = $getPointUser['points']+10;
            $setPointUser = UserModel::updatePointUser($userId, $newValue);
            
            $result = array( 
                'idResponse' => $responseCorrect,
                'idSelected' => $responseId,
                'className' => 'correct'
            );

            echo json_encode($result);

        } else {
            
            $result = array(
                'idResponse' => $responseCorrect,
                'idSelected' => $responseId,
                'className' => 'incorrect'
            );

            echo json_encode($result);
        }
        
    }

}


