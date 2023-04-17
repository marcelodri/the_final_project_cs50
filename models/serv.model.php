<?php

    require_once "conexion.php";

    class QuestionModel {

        static public function getQuestion($questionId) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM questions WHERE id = :id");
			$stmt -> bindParam(":id", $questionId);
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);
            
        }

        static public function getCountQuestions() {

            $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) qs FROM questions");
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);

        }

        static public function saveResponse($userId, $questionId, $responseId) {
            
            $stmt = Conexion::conectar()->prepare( "INSERT INTO responses (idUser, idQuestion, idResponse) VALUES (:idUser, :idQuestion,:idResponse)" );
            $stmt->bindParam(":idUser", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":idQuestion", $questionId, PDO::PARAM_INT);
            $stmt->bindParam(":idResponse", $responseId, PDO::PARAM_INT);

            if($stmt->execute()){
                return "ok";
            }else{
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;

        }

        static public function getPerson($idPerson) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM people WHERE id = :id");
			$stmt -> bindParam(":id", $idPerson);
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);

        }

    }
