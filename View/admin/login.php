<?php
//require_once("Model/connection/db.php");
//require_once("Model/login/Login.php");
//una vez agregada las clases se pueden utilizar sus metodos
/*$login = new xLogin();
  if($login->loggedIn()==true){
      header("location: View/admin/home.php");
  }else{*/
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.css" type="text/css">
      <link rel="stylesheet" href="<?php echo RUTA_DOCS ?>signin/signin.css" type="text/css">
      <link rel="stylesheet" href="<?php echo RUTA_FONTS ?>font-awesome.css" type="text/css">
      <link rel="stylesheet" href="<?php echo RUTA_CSS ?>bk_style.css" type="text/css">
      <link rel="stylesheet" href="<?php echo RUTA_CSS ?>font-family.css" type="text/css">
      
    </head>
    <body>
        <div id="login-video"> 
          <video id="bgvid" playsinline="" autoplay="" muted="" loop="">
            <source data-src="<?php echo RUTA_CSS?>images/papachossignin/papachos.mp4" type="video/webm" src="https://papachos.com/wp-content/themes/papachos/video/video.webm">
            <source data-src="<?php echo RUTA_CSS?>images/papachossignin/papachos.mp4" type="video/mp4" src="https://papachos.com/wp-content/themes/papachos/video/video.mp4">
          </video>
        </div>
        <div class="container signin-container">
          <form class="form-signin" method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" >
					  
					<?php 
          
          if(!empty($error)){
            echo("<div class='alert alert-danger alert-dismissible' role='alert'>");
            echo("<strong>Error!</strong>");
	          foreach ($error as $err) {
							  echo $err;
            }
            echo("</div>");
           // echo("<script>console.log('PHP: ".json_encode($error)."');</script>");
          }
					
					?>
					<?php
					    
					  if (!empty($message)) {
					?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<strong>Aviso!</strong>
					<?php
						foreach ($message as  $msm) {
							echo $msm;
						  }
					?>
				</div> 
					<?php 
					    }
				    
          ?>
          <img src="<?php echo RUTA_IMG?>iconos/papachos.png" alt="">
          <h2 class="form-signin-heading">Ingresar</h2>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" name="user_name" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="user_password" class="form-control" placeholder="Password" required>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg" type="submit" name="login" id="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
    <script src="<?php echo RUTA_JS?>jquery.min.js"></script>
    <script src="<?php echo RUTA_JS?>bootstrap.js"></script>
    <script src="<?php echo RUTA_JS?>javascript.js"></script>
    <script>

    </script>
  </body>
</html>
<?php
//}
?>