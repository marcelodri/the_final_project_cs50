<?php 

/* Import HEAD */
include "./sources/includes/head.php";

/* get all users */
$data = UserModel::getUser(null);

?>

<div class="cont-1300">
    <div class="container">

        <div class="title">
            <h1 class="lato-bold" data-aos="zoom-in-down" data-aos-delay="100">Users point</h1>
        </div>
        
        <div class="content" id="tableResult" data-aos="zoom-in">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Again</th>
                        <th scope="col">Point</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody id="tbody_result" data-aos="fade-up" data-aos-delay="300">

                    <?php /* completo info de users */ 

                    foreach($data AS $index => $row ): 
                        $nro = $index+1;
                        $value = intval($row['points']);

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
                    
                    ?>
                    <tr class="<?= $row['id'] == $_SESSION['idUser'] ? 'active' : ''; ?>" >
                        <th scope="row"><?=$nro?></th>
                        <td class="text-uppercase"><?=$row['username']?></td>
                        <td><?=$row['again']?></td>
                        <td><?=$row['points']?></td>
                        <td><img style="max-width: 35px; border-radius: 50%" src="<?=$image?>" alt=""></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php /* Import Footer */ include "./sources/includes/footer.php"; ?>



