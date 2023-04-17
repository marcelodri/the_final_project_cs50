<?php /* Import HEAD */ include "./sources/includes/head.php"; ?>

<div class="cont-1300">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="cont-center">
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" name="inputUsername" aria-describedby="emailHelp" placeholder="Enter username">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" name="inputPassword" placeholder="Password">
                        </div>
                        <input class="btn btn-dark w-100 mb-3" type="submit" name="login" value="Send">
                        
                        <!-- Import Form Login -->
                        <div><?php include "./forms/form.login.php"; ?></div>
                        
                        <a href="index.php">Home</a>
                        <a href="register.php">Register</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<style>.cont-menu{display: none}</style>