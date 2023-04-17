<?php



if(isset($_POST['register'])) {

    $username = $_POST['inputUsername'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $repeatpassword = $_POST['inputRepeatPassword'];

    $response = UserController::setUser($username, $email, $password, $repeatpassword);
    
    if($response == 'ok') {
        echo "<script>window.location = 'login.php'</script>";
        //header("Location: questions.php");
    } else {
        echo $response;
    }

}