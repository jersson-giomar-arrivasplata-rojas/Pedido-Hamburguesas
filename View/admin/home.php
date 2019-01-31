<?php
    session_start();
    if(!isset($_SESSION['user_login_status'])AND
        $_SESSION['user_login_status']!=1){
        header("location: login.php");
        exit;
    }
?>
<?php
    include_once ("Model/connection/db.php");//necesario
    include ("header.php");
?>
<figure>
    <div class="figure-img"><div class="img-papachos"></div><div>
</figure>
<?php
    include ("footer.php");
?>
