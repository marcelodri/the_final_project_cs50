<?php

class UserController {


    static public function setUser($username, $email, $password, $repeatpassword) {
        
        //controla campos vacíos
        if($username == '' || $password == '' || $repeatpassword == '') {
            return '<div class="bg-danger text-white p-2 my-2 rounded">Los campos (*) son requeridos</div>';
        } 
        // que sean iguales
        if( $password !== $repeatpassword ) {
            return '<div class="bg-danger text-white p-2 my-2 rounded">Contraseñas no son uiguales</div>';
        } 
        // qreemplaza equitecas html en caracteres 
        if (preg_match('/[^\w\s]/', $username) || preg_match('/[^\w\s]/', $email)) {
            return '<div class="bg-danger text-white p-2 my-2 rounded">No se permite caracteres espoeciales</div>';
        }

        $existing = UserModel::getUserLogin($username);
        if($existing) {
            return '<div class="bg-danger text-white p-2 my-2 rounded">Existing User</div>';
        }

        $encrypPassword = md5($password);

        $response = UserModel::setUser($username, $email, $encrypPassword);
        return $response;

    }


    static public function getLogin($username, $password) {

        // validation
        if($username == '' || $password == '') {
            return '<div class="bg-danger text-white p-2 my-2 rounded">Los campos (*) son requeridos</div>';
        } 

        // Get data user
        $user = UserModel::getUserLogin($username);

        if( $user ) {
            
            $userPassword = $user['password'];
            $encrypPassword = md5($password);

            if($userPassword == $encrypPassword) {

                // init session
                $_SESSION['idUser'] = $user['id'];
                return 'ok';

            } else {
 
                return '<div class="bg-danger text-white p-2 my-2 rounded">Usuario inexistente</div>';
 
            }

        } else {
 
            return '<div class="bg-danger text-white p-2 my-2 rounded">Usuario inexistente</div>';
 
        }

    }


    static public function getUser($userId) {

        // Get data user
        $user = UserModel::getUser($userId);

        // Get data Questions
        $questionId = $user['nextQuestion'];
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
        $response = UserModel::saveResponse($userId, $questionId, $responseId);

        if($response == 'ok'){
            // Save nextQuestion
            $responseNextQuestion = UserModel::setNextQuestion($userId, $nextQuestion);
            return $responseNextQuestion;
        }
    
    }

}