<?php

    // Import HEAD
    include "./sources/includes/head.php";

    // Import CLASS
    include "./controllers/serv.controller.php";
    include "./models/serv.model.php";

    
    // Check session
    if($_SESSION['idUser']) {
        
        // if GET sa, values en cero y comienza nuevamente
        if(isset($_GET['sa'])) {
            $dataUser = UserModel::getUser($_SESSION['idUser']);
            $newAgain = $dataUser['again'] += 1;
            $updateId = UserModel::resetQuestionUser($_SESSION['idUser'], $newAgain);
            if($updateId == 'ok') {
                // header("Location: questions.php");
                echo "<script>window.location = 'questions.php'</script>";
            }
        }

        // Busco el modelo para completar la data
        $model = UserController::getUser($_SESSION['idUser']);
        
        // Cuando finaliza, redirecciona 
        if(  $model['status'] == 'finalized' ) {
            $_SESSION['finalized'] = true;
            // header("Location: finalized.php");
            echo "<script>window.location = 'finalized.php'</script>";

        }

    } else {
        // No session, redirect to index
        echo "<script>window.location = 'index.php'</script>";
    }
    

?>


    <div class="cont-1300">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-6 offset-md-1 relative">
                    <div class="pl-4">
                        <h1 class="mb-2 lato-bold text-uppercase" data-aos="zoom-in-down" data-aos-delay="300">who killed who?</h1>
                        <h5 class="lato-light" data-aos="zoom-in-down" data-aos-delay="500">GAMES OF THRONES <?=$model['question']['id']?>/<?=$model['question']['total']?></h5>
                        <div class="question" data-aos="flip-left"  data-aos-duration="1000">
                            <!-- <h1>Murdered</h1> -->
                            <div class="d-flex">
                                <div class="col-6 px-0">
                                    <div class="box-image">
                                        <h1>Murdered</h1>
                                        <img class="img-response" src="<?=$model['murdered']['img']?>" alt="<?=$model['murdered']['name']?>">
                                    </div>
                                </div>
                                <div class="col-6 px-0">
                                    <div class="data-question">
                                        <p class="lato" data-aos="fade-right" data-aos-delay="100"><strong><?=$model['murdered']['name']?></strong></p>
                                        <p class="lato" data-aos="fade-right" data-aos-delay="300">Season: <strong><?=$model['question']['season']?></strong></p>
                                        <p class="lato" data-aos="fade-right" data-aos-delay="500">Episode: <strong><?=$model['question']['episode']?></strong></p>
                                        <p class="lato" data-aos="fade-right" data-aos-delay="700">Location: <strong><?=$model['question']['location']?></strong></p>
                                        <p class="lato" data-aos="fade-right" data-aos-delay="900">Method: <strong><?=$model['question']['method']?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="options">
                        <?php $delay=2300; foreach ( $model['question']['options'] as $row ): ?>
                        <button class="btn-page" data-aos="fade-left" data-aos-delay="<?=$delay?>" data-qid="<?=$model['question']['id']?>" data-oid="<?=$row['id']?>">
                            <div class="cont-img">
                                <img class="img-response" src="<?=$row['img']?>" alt="<?=$row['name']?>">
                            </div>
                            <p class="m-0"><?=$row['name']?></p>
                        </button>
                        <?php $delay += 200; endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php /* Import Footer */ include "./sources/includes/footer.php" ?>