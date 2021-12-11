<?php
    session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    $user = $HomeModel->getUserById($_SESSION['lgUserID']);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="./public/css/profile.css">
<div class="padding">
    <?php 
        if (!empty($user)) {
            ?>
    <div class="col-md-8">
        <!-- Column -->
        <div class="card"> <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user"></div>
                <h3 class="m-b-0"><?= $user[0]['username'] ?></h3>
                <p><?= $user[0]['information']?> &amp; Developer</p> 
              
                    <a href="index.php"
                    class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Quay
                    lại</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="" style="color:black;text-decoration: none;"><small>Facebook</small></a>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="" style="color:black;text-decoration: none;"><small>Github</small></a>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="" style="color:black;text-decoration: none;"><small>Youtube</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>