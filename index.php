<?php /* Import HEAD */ include "./sources/includes/head.php"; ?>

<div class="cont-1300">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="cont-center">
          <div class="title">
            <h1 class="text-uppercase lato-bold" data-aos="zoom-in" >who killed who in?</h1>
            <h2 class="text-uppercase lato-light" data-aos="zoom-in" data-aos-delay="500">Trivia <strong>GOT</strong></h3>
          </div>
          <div class="text-center">
            <h6 data-aos="fade-right" data-aos-delay="1000"> The final proyect </h3>
            <h5 class="mb-4" data-aos="fade-right" data-aos-delay="1500"> This is CS50 </h1>

            <?php if(isset($_SESSION['idUser'])): ?>
            <a class="start lato-bold" data-aos="fade-up" data-aos-delay="2500" href="questions.php" >START</a>
            <?php else: ?>
            <div class="sing">
              <h5><a data-aos="zoom-in" data-aos-delay="2500" class="mx-4 text-light lato-bold" href="login.php">Sign in</a>
              <a data-aos="zoom-in" data-aos-delay="2500" class="mx-4 text-light lato-bold" href="register.php">Register</a></h5>
            </div>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /* Import Footer */ include "./sources/includes/footer.php"; ?>
    