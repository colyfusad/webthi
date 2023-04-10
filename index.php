<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - GGC</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body>
    <div id="container">
        <div class="header">
            <div id="header-top">
				<a href="index.php">
					<img src="img/logox.png" alt="Trường Đại Học Quy Nhơn" title="Trường Đại Học Quy Nhơn">
				</a>
                <div id="banner">
                    <div id="para">Ôn tập và thi trắc nghiệm Vật Lí online</div>
                </div>
                <button id="button-hello">
                    <?php if(isset($_SESSION['username'])) echo "User: ".$_SESSION['username'].""; else echo "-----> User name <-----" ?>
                </button>
                
                <?php
                    if (isset($_SESSION['username'])){
                        unset($_SESSION['username']);
                ?>
                            <a href="index.php"><button id="button-dangxuat" name="xuli">Log out</button></a>
                            <script>
                                reload('index.php');
                            </script>
                <?php
                    }
                    else{
                        ?>
                            <a href="sign_in.php"><button id="button-dangxuat" name="xuli">Sign up</button></a>
                <?php
                    }
                ?>
            </div>

            <div id="header-bottom">
                <ul id="nav">
                    <li><a href="">Trang chủ</a></li>
                    <li>
                        <a href="">Lớp 10 ▼</a>
                        <ul class="subnav10">
                            <li><a href="#">Chương 1: Mở đầu</a></li>
                            <li><a href="#">Chương 2: Động học</a></li>
                            <li><a href="#">Chương 3: Động lực học</a></li>
                            <li><a href="#">Chương 4: Năng lượng, công, công suất</a></li>
                            <li><a href="#">Chương 5: Động lượng</a></li>
                            <li><a href="#">Chương 6: Chuyển động tròn</a></li>
                            <li><a href="#">Chương 7: Biến dạng của vật rắn. Áp suất chất lỏng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 11 ▼</a>
                        <ul class="subnav11">
                            <li><a href="#">Chương 1: Điện Tích. Điện trường</a></li>
                            <li><a href="#">Chương 2: Dòng điện không Đổi</a></li>
                            <li><a href="#">Chương 3: Dòng điện Trong Các Mội Trường</a></li>
                            <li><a href="#">Chương 4: Từ trường</a></li>
                            <li><a href="#">Chương 5: Cảm ứng điện từ</a></li>
                            <li><a href="#">Chương 6: Khúc Xạ Ánh Sáng</a></li>
                            <li><a href="#">Chương 7: Mắt. Các Dụng Cụ Quang</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 12 ▼</a>
                        <ul class="subnav12">
                            <li><a href="#">Chương 1: Dao Động Cơ</a></li>
                            <li><a href="#">Chương 2: Sóng Cơ và Sóng Âm</a></li>
                            <li><a href="#">Chương 3: Dòng điện xoay chiều</a></li>
                            <li><a href="#">Chương 4: Dao Động và Sóng Điện Tử</a></li>
                            <li><a href="#">Chương 5: Sóng Ánh Sáng</a></li>
                            <li><a href="#">Chương 6: Lượng Tử Ánh Sáng</a></li>
                            <li><a href="#">Chương 7: Hạt Nhân Nguyên Tử</a></li>
                            <li><a href="#">Chương 8: Từ Vĩ Mô Đến Vĩ Mô</a></li>
                        </ul>
                    </li>
                    <li><a href="">Ôn thi tốt nghiệp</a></li>
                    <li><a href="">Liên hệ</a></li>
                    <li><a href="">Tài liệu</a></li>
                </ul>

            </div>
        </div>

        <div class="container-content">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Trang chủ</a>
                    </li>
    
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                          </svg>  
                    </li>
    
                    <li>
                        <a href="#">Lớp Z</a>
                    </li>
    
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                          </svg>  
                    </li>
    
                    <li>
                        <a href="#">Chương Y</a>
                    </li>
                </ul>
    
            </div>

            <div class="box-content">

            </div>
        </div>
        <footer class="footer-container">
            <div class="footer-left">
                <h3>Goblins<span> Go </span>Code</h3>
                <p class="footer-links">
                    <a href="index.php">Home</a>
                    |
                    <a href="contact.php">Contact</a>
                    |
                    <a href="#">Blog</a>
                </p>
                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
    
            <div class="footer-center">
              <p class="footer-about">
                  <span>About Team</span>
                  <strong></strong>Trần Đình Chiến
                  <br>Bùi Thanh Phú
                  <br>Phạm Duy Hưng
                  <br>Nguyễn Lê Hoàng Vinh
                  <br>Nguyễn Đặng Toàn Thắng
              </p>
          </div>
            <div class="footer-right">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>QUY NHON</span>
                        Binh Dinh</p>
                </div>
    
                <div>
                    <i class="fa fa-phone"></i>
                    <p>0326513767</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="goblinsgocode@gmail.com">Email: goblinsgocode@gmail.com</a></p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>