<?php if(isset($_SESSION['idUser'])):
$user = UserModel::getUser($_SESSION['idUser']);
$value = $user['points'];

switch ($value) {
    case 0:
        $image = 'sources/images/initial.png';
        break;
    case $value >= 30 && $value < 70:
        $image = 'sources/images/pro.png';
        break;
    case $value >= 70 && $value < 100:
        $image = 'sources/images/master.png';
        break;
    case 100:
        $image = 'sources/images/mastrer_plus.png';
        break;
    default:
        $image = 'sources/images/initial.png';
        break;
}

$_SESSION['points'] = $value;
$_SESSION['image'] = $image;

?>
<div class="box-dataUser">
    <h5 data-aos="fade-zoom-in" data-aos-delay="300" class="lato-light text-uppercase"><?=$user['username']?></h5>
    <p data-aos="flip-right"  data-aos-delay="500" class="lato-bold my-0"><?=$user['points']?> points</p>
    <img class="insignia" data-aos="flip-down" data-aos-delay="1000" src="<?=$image?>" alt="">
    <!-- <p><?=$user['level']?></p> -->
</div>
<?php endif ?>
