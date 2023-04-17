<?php /* Import HEAD */ include "./sources/includes/head.php"; ?>

<div class="cont-1300">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cont-center">
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" name="inputUsername" placeholder="Username (*)">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email (Not required)">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" name="inputPassword" placeholder="Password (*)">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputRepeatPassword">Repeat Password</label>
                            <input type="password" class="form-control" name="inputRepeatPassword" placeholder="Password (*)">
                        </div>
                        <input class="btn btn-dark w-100 mb-3" type="submit" name="register" value="Send">
                        
                        <!-- Import Form Register -->
                        <?php include "./forms/form.register.php"; ?>

                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>.cont-menu{display: none}</style>