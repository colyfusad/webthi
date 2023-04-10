<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <title>Change password</title>
</head>
<body>
	<?php
	session_start();
	if ((isset($_POST["reset"])) && ($_POST['us'] != '') && ($_POST['mkc'] != '') && ($_POST['mkm'] != '') && ($_POST['remkm'] != ''))
	{
		$us = $_POST['us'];
		$mkc = $_POST['mkc'];
		$mkm = $_POST['mkm'];
		$remkm = $_POST['remkm'];
		$kn = mysqli_connect("localhost", "root", "", "dbthitracnghiem") or die("Chưa kết nối được với Database");
		
		$check = "SELECT password FROM tbthongtin where username = '$us'";

		if (mysqli_num_rows(mysqli_query($kn, $check)) > 0){	
			$res = mysqli_query($kn, $check);
			$row = mysqli_fetch_assoc($res);
			if ($row['password'] == $mkc){
				if ($mkm == $remkm){
					$up = "UPDATE tbthongtin SET password = '$mkm' WHERE username = '$us'";
					mysqli_query($kn, $up);
					echo "<script>
						alert('Đổi mật khẩu thành công!');
						window.history.back();
					</script>";
					$_SESSION['username'] = $us;
					header('location: index.php');
				}
				else{
					echo "<script>
						alert('Mật khẩu mới không khớp!');
						window.history.back();
					</script>";
				}
			}
			else{
				echo "<script>
					alert('Mật khẩu cũ không đúng!');
					window.history.back();
				</script>";
			}
		}
		else{
			echo "<script>
				alert('Username không tồn tại');
				window.history.back();
			</script>";
		}
		mysqli_close($kn);
	}
	?>
	<?php
		require_once('header.php');
	?>
    <div id="box">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3 style="padding-bottom: 10px;">Change password</h3>
			<div class="form-group">
                <input type="text" name="us" required>
				<label for=""><?php if (isset($_SESSION['username'])) echo "".$_SESSION['username'].""?></label>
            </div>
            <div class="form-group">
                <input type="password" name="mkc" required>
                <label for="">Enter old password</label>
            </div>
            <div class="form-group">
                <input type="password" name="mkm" required>
                <label for="">Enter new password</label>
            </div>
			<div class="form-group">
                <input type="password" name="remkm" required>
                <label for="">Re-enter new password</label>
            </div>
			<div>
				<label name="thongbao" value="<?php if(isset($thongbao) && $kq == 0 ) echo 'Tài khoản hoặc mật khẩu sai' ?>"></label>
			</div>
            <input id="btn-login" type="submit" name="reset" value="Change">
        </form>
    </div>
</body>
</html>
	
