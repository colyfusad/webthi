<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <title>Sign in</title>
</head>
<body>
    <?php
		require_once('header.php');	
	?>
    <div id="box">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3 style="padding-bottom: 10px;">Sign in</h3>
            <div class="form-group">
                <input type="text" name="taikhoan" required>
                <label for="taikhoan">Username</label>
            </div>

            <div class="form-group">
                <input type="password" name="matkhau" required>
                <label for="matkhau">Password</label>
            </div>

            <input id="btn-login" type="submit" name="dangnhap" value="Sign in">
            <div class="loginbox">
                <div style="height: 10px"></div> 
                <a href="#">Forgot your password?</a>
                <div style="height: 5px"></div>
                <a href="sign_up.php">Don't have an account?</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
	if ((isset($_POST["dangnhap"])) && ($_POST['taikhoan'] != '') && ($_POST['matkhau'] != ''))
	{
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		$kn = mysqli_connect("localhost", "root", "", "dbthitracnghiem") or die("Chưa kết nối được với Database");
		
		$sql = "SELECT * FROM tbthongtin where username = '$us' and password = '$ps'";
		
		$user = mysqli_query($kn, $sql);

		if (mysqli_num_rows($user) > 0){
            $_SESSION['username'] = $us;
			header("location: index.php");
		} else{
			echo "<script>
					alert('username or password incorrect!');
					window.history.back();
				</script>";
		}
		mysqli_close($kn);
	}
	?>
