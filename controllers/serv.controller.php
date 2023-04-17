<?php

class QuestionController {

    
    static public function getUser($userId) {

        // Get data user
        $user = UserModel::getUser($userId);

        // Get data Questions
        $questionId = 1;
        if($user['nextQuestion']) {
            $questionId = $user['nextQuestion'];
        }
        $getQuestion = QuestionModel::getQuestion($questionId);
        $getCountQuestions = QuestionModel::getCountQuestions();

        // Get data Person Option
        if ($getQuestion){

            $optionsArray = json_decode($getQuestion['options']);
            $options = array();
            foreach($optionsArray as $person) {
                $getOptionsData = QuestionModel::getPerson($person);
                array_push($options, $getOptionsData);
            }
        
            // Get data Person Victim
            $getVictimData = QuestionModel::getPerson($getQuestion['victim']);

            // Prepare Data Model
            $model = array(
                'user' => $user,
                'murdered' => $getVictimData,
                'question' => array(
                    'id' => $getQuestion['id'],
                    'total' => $getCountQuestions['qs'],
                    'season' => $getQuestion['season'],
                    'episode' => $getQuestion['episode'],
                    'location' => $getQuestion['location'],
                    'method' => $getQuestion['method'],
                    'options' => $options
                ),
                'status' => 'running'
            );
        
            return $model;
        
        } else {

            $model = array(
                'user' => $user,
                'murdered' => null,
                'question' => [],
                'status' => 'finalized'
            );

            return $model;
        }
        
    }


    static public function setQuestion($userId, $questionId, $responseId) {
        
        $nextQuestion = $questionId+1;
        $response = QuestionModel::saveResponse($userId, $questionId, $responseId);

        if($response == 'ok'){
            // Save nextQuestion
            $responseNextQuestion = UserModel::setNextQuestion($userId, $nextQuestion);
            return $responseNextQuestion;
        }
    
    }


}