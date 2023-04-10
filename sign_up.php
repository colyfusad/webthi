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
    <title>Sign up</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
	<?php
		require_once('header.php');	
	?>	
	<div id="box">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<h3 style="padding-bottom: 10px;">Sign up</h3>

			<div class="form-group">
				<input type="text" name="uname" required>
				<label for="uname">Username</label>
			</div>

			<div class="form-group">
				<input type="password" name="upassword" required>
				<label for="upassword">Password</label>
			</div>

			<div class="form-group">
				<input type="password" name="confirm_password" required>
				<label for="confirm_password">Re-enter password</label>
			</div>

			<div class="form-group">
				<input type="text" name="uemail" required>
				<label for="uemail">Email</label>
			</div>

			<input type="submit" name="create" value="Sign up" id="btn-login">

			<div class="loginbox" >
                <div style="height: 5px"></div>
                <a href="sign_in.php">Already have an account?</a>
            </div>
		</form>
	</div>
</body>
</html>
<?php
	if (isset($_POST['create'])) {

		$uname     = $_POST['uname'];
		$_SESSION['username'] = $uname;
		$upassword = $_POST['upassword'];
		$uemail    = $_POST['uemail'];

		$connect = mysqli_connect("localhost", "root", "", "dbthitracnghiem") or die("Connect't to database");
		
		$check = "SELECT * from tbthongtin";
		$num = mysqli_num_rows(mysqli_query($connect, $check));
	
		$sql = "INSERT INTO tbthongtin (ID, username, password, mail) VALUES ($num, '".$uname."', '".$upassword."', '".$uemail."')";
		
		// check username
		$checkUser = "SELECT username FROM tbthongtin WHERE username = '".$uname."'";
		$tmp = mysqli_query($connect, $checkUser);
		$dong = mysqli_num_rows($tmp);
		
		if ($dong > 0){
			echo "<script>;
					alert('username đã tồn tại');
					window.history.back();
				</script>";
		}
		else{
			if ($upassword == $_POST['confirm_password']){
				$tmp1 = mysqli_query($connect, $sql);
				header('location: wait.php');
			}
			else{
				echo "<script>
						alert('Mật khẩu không khớp');
						window.history.back();
					</script>";
			}
		}
		mysqli_close($connect);
	}
?>