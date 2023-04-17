<?php /* Import head */ include "./sources/includes/head.php"; ?>

    <div class="cont-1300">
        <div class="container">
            <div class="cont-center">
                <div class="title">
                    <h1 class="mb-2 lato-bold" data-aos="zoom-in-down" data-aos-delay="300">You have finished the trivia !!</h1>
                </div>
                <div class="text-center cont-points" data-aos="flip-left"  data-aos-duration="1000" >
                    <h3 class="mb-2" >Points<br><strong><?=$_SESSION['points']?></strong></h3>
                    <h3 class="mb-2 lato-light">Badge earned</h3>
                    <img style="max-width: 150px; border-radius: 50%" src="<?=$_SESSION['image']?>" alt="">
                </div>
                <div class="box-text">
                    <div class="w-600 text-center mb-3">
                        <h5 class="lato-light" data-aos="zoom-out-up" data-aos-delay="500">Thanks for participating</h5>
                    </div>
                    <div class="text-center">
                        <a class="start lato-bold" data-aos="fade-up" data-aos-delay="700" href="questions.php?sa=true" >START AGAIN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php /* Import Footer */ include "./sources/includes/celebrate.php" ?>
<?php /* Data user */ include "./sources/includes/brand.php" ?>
<?php /* Import Footer */ include "./sources/includes/footer.php" ?>

<style>
    .title {
        padding-bottom: 10px
    }
    .box-dataUser {
        display: none
    }
    .cont-points {
        background: rgba(0, 0, 0, 0.4);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px
    }
</style>