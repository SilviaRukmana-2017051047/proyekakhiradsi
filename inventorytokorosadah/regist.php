<?php

include 'dbconnect.php';

if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=md5($_POST['password']);
$nickname=$_POST['nickname'];
$role=$_POST['role'];
	  
$query = mysqli_query($conn,"insert into slogin values('','$username','$password', '$nickname','$role')");
if ($query) {
  echo "Data Berhasil Disimpan <a href='index.php'>Login</a>";
 
  exit;
}else {
  echo "Gagal menyimpan data";
  exit;
}

}

?>
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="jquery.min.js"></script>
	<style>body{background-image:url("bkg.jpg");}
	@media screen and (max-width: 600px) {
h4{font-size:85%;}
}
	</style>
	<link rel="icon" 
      type="image/png" 
      href="favicon.png">
  </head>
  <body>
  
  <div align="center">

  <img src="logo rosadah.png" width="30%" style="margin-top:5%" \>

	<br \><br \>
			<div class="container">
					<div style="color:grey">
					<label>Silahkan daftar</label><br \>
					</div>
                <form method="post">
				<div class="form-group">
                        <input type="text" class="form-control" placeholder="Nickname" name="nickname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
					<div class="form-group">
          <select name="role" class="form-control" required>
							<option value="">Pilih User</option>
							<option value="admin">Admin</option>
							<option value="pelanggan">Pelanggan</option>
						
						</select>
                    </div>
					
                    <button type="submit" class="btn btn-primary" name="submit"><a style="color:white">Daftar</a></button>
                    <p> sudah punya akun?
                  <a href="index.php">Login</a>
                </p>
                </form>
			
			<br \>
        </div></div>
       
     
	
	
  </body>
</html>
