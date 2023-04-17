<?php

    require_once "conexion.php";

    class UserModel {


        static public function setUser($username, $email, $password) {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO users (username, email, nextQuestion, points, level, password, again) VALUES (:username, :email, '1', '0', 'initial', :password, '0')");
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    
            if($stmt -> execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;

        }


        static public function getUserLogin($username) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE username = :username");
			$stmt -> bindParam(":username", $username);
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);

        }


        static public function getUser($userId) {

            if($userId != null) {
                $stmt = Conexion::conectar()->prepare("SELECT id, username, email, points, level, nextQuestion, again FROM users WHERE id = :id");
                $stmt -> bindParam(":id", $userId);
                $stmt -> execute();
                return $stmt -> fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT id, username, points, level, again FROM users ORDER BY points DESC");
                $stmt -> execute();
                return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }

        }


        static public function setNextQuestion($userId, $nextQuestion) {

            $stmt = Conexion::conectar()->prepare("UPDATE users SET nextQuestion = :nextQuestion WHERE id = :id");
            $stmt->bindParam(":nextQuestion", $nextQuestion, PDO::PARAM_INT);
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
    
            if($stmt -> execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;

        }


        static public function updatePointUser($userId, $newValue){
            
            $stmt = Conexion::conectar()->prepare("UPDATE users SET points = :points WHERE id = :id");
            $stmt->bindParam(":points", $newValue, PDO::PARAM_INT);
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
    
            if($stmt -> execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;

        }

        static public function updateLevelUser($userId, $newValue){

            $stmt = Conexion::conectar()->prepare("UPDATE users SET level = :level WHERE id = :id");
            $stmt->bindParam(":level", $newValue, PDO::PARAM_INT);
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
    
            if($stmt -> execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;
            
        }


        static public function resetQuestionUser($userId, $newAgain){

            $stmt = Conexion::conectar()->prepare("UPDATE users SET points = '0', nextQuestion = '1', again = :again WHERE id = :id");
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":again", $newAgain, PDO::PARAM_INT);

            if($stmt->execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;

        }

        
    }
