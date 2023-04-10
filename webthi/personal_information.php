<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <title>Personal Information</title>
</head>
<body>
    <?php
		require_once('header.php');	
	?>
    <div id="box">
    <?php
        session_start();
        $usk = $_SESSION['username'];
        $_SESSION['username'] = $usk;
        if (isset($_POST['change'])){
            $firstN = $_POST['firstName'];
            $lastN = $_POST['lastName'];
            $cla = $_POST['class'];
            $gen = $_POST['gender'];
            $umail = $_POST['email'];
            if ($gen == NULL){
                echo "<script>
                        alert('Please enter gender!');
                        window.history.back();
                    </script>";
            }
            else{
                $connect = mysqli_connect("localhost", "root", "", "dbthitracnghiem");

                $sql = "UPDATE tbthongtin SET ho = '$firstN', ten = '$lastN', sex = $gen, level = '$cla', mail = '$umail' WHERE username = $usk";

                mysqli_query($connect, $sql);
                echo "<script>
                        alert('Change information correct!');
                        window.history.back();
                    </script>";
            }

        }
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3 style="padding-bottom: 10px;">Personal information: <?php if (isset($_SESSION['username'])) echo "".$_SESSION['username'].""; else echo "Error!";?></h3>
            <div class="form-group">
                <input type="text" name="firstName" required>
                <label for="firstName">First Name</label>
            </div>

            <div class="form-group">
                <input type="text" name="lastName" required>
                <label for="lastName">Last Name</label>
            </div>

            <div  class="form-group">
                <table>
                    <tr>
                        <th>
                            <p style="font-size: 20px;">Class: </p>
                        </th>
                        <th>
                            <select style="margin-left: 20px; width: 100%; font-size: 20px;" name="class" required>
                                <option value="class10" checked>Lớp 10</option>
                                <option value="class11">Lớp 11</option>
                                <option value="class12">Lớp 12</option>
                                <option value="class12">Giáo viên</option>
                            </select>
                        </th>
                    </tr>
                </table>
            </div>

            <div>

            </div>

            <div class="form-group">
                <table>
                    <tr>
                        <th><p>Gender: </p></th>
                        <th>
                            <input type="radio" name="gender" value="Nam"></input>Nam
                            <input type="radio" name="gender" value="Nữ"></input>Nữ
                            <input type="radio" name="gender" value="Khác"></inputid=>Khác
                        </th>
                    </tr>
                </table>    
            </div>

            <div class="form-group">
                <input type="email" name="email" required>
                <label for="email">Email</label>
            </div>

            <input id="btn-login" type="submit" name="change" value="Change">
            
        </form>
    </div>
</body>
</html>