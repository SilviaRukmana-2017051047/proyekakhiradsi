<?php
session_start();
include 'dbconnect.php';


if(isset($_POST['btn-login']))
{
 $uname = mysqli_real_escape_string($conn,$_POST['username']);
 $upass = mysqli_real_escape_string($conn,md5($_POST['password']));
 $urole = mysqli_real_escape_string($conn,$_POST['role']);

 // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from slogin where username='$uname' and password='$upass' and role='$urole';");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
 if($data['role']=="admin"){
		// buat session login dan username
		$_SESSION['user'] = $data['nickname'];
		$_SESSION['user_login'] = $data['username'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = "admin";
		header("location:admin");

 }else if($data['role']=="pelanggan"){
	// buat session login dan username
	$_SESSION['user'] = $data['nickname'];
	$_SESSION['user_login'] = $data['username'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['role'] = "pelanggan";
	header("location:pelanggan");

}
 else
 {
 
  header("location:index.php?pesan=gagal");
  }
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
					<label>Silahkan masukkan username & password</label><br \>
					</div>
                <form method="post">
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
                    <button type="submit" class="btn btn-primary" name="btn-login">Login</button>
					<p> Belum punya akun?
                  <a href="regist.php">Daftar di sini</a>
                </p>
                </form>
                <!-- <br>
                <button type="submit" class="btn btn-primary" name="btn-regis"><a href="regist.php" style="color:white;">Registrasi</a></button> -->
			
			<br \>
        </div></div>
       
     
	
	
  </body>
</html>
