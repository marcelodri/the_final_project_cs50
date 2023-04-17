<?php



if(isset($_POST['login'])) {

    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    $response = UserController::getLogin($username, $password);
    
    if($response == 'ok') {
        // header("Location: index.php");
        echo "<script>window.location = 'index.php'</script>";

    } else {
        echo $response;
    }

}