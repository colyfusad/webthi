<!--Chạy code này ít nhất 1 lần để đồng bộ database cho các máy, test cũng dễ hơn-->
<!--Nếu cân bổ sung dữ liệu thì cứ thêm bớt thoải mái, sẽ được Chiến và Phú review sau-->

<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) die("Couldn't connect to MySQL.");

//Nêu có sẽ xoá database cũ, tạo cái mới
mysqli_query($conn, "DROP database webthi");
mysqli_query($conn, "CREATE DATABASE webthi");

$conn_db = mysqli_connect("localhost", "root", "", "webthi");
if (!$conn_db) die("Couldn't connect to database.");

//Bảng dữ liệu đăng nhập (login_infos)
mysqli_query($conn_db, 'CREATE TABLE login_infos (
                
    id         INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username   VARCHAR(32)  NOT NULL UNIQUE,
    pass       VARCHAR(32)  NOT NULL,
    q1_index   INTEGER,
    first_ans  VARCHAR(100),
    q2_index   INTEGER,
    second_ans VARCHAR(100)

)') or die("Error while creating the table.");

//Thêm dữ liệu mẫu vào bảng login_infos
mysqli_query($conn_db, "INSERT INTO login_infos (username, pass) VALUES ('test1', 'test1pass')");
mysqli_query($conn_db, "INSERT INTO login_infos (username, pass) VALUES ('test2', 'test2pass')");
mysqli_query($conn_db, "INSERT INTO login_infos (username, pass) VALUES ('test3', 'test3pass')");
mysqli_query($conn_db, "INSERT INTO login_infos (username, pass) VALUES ('test4', 'test4pass')");
mysqli_query($conn_db, "INSERT INTO login_infos (username, pass) VALUES ('test5', 'test5pass')");

//Bảng thông tin người dùng (user_infos)
mysqli_query($conn_db, 'CREATE TABLE user_infos (

    username   VARCHAR(32)  NOT NULL UNIQUE,
    gender     BOOLEAN,
    adrs       VARCHAR(100),
    phone      VARCHAR(10),
    email      VARCHAR(100),
    lvl        INTEGER

)') or die("Error while creating the table.");

//Thêm dữ liệu mẫu vào bảng user_infos
mysqli_query($conn_db, "INSERT INTO user_infos VALUES ('test1', true,  'address of test1', '0111111111', 'test1mail@gmail.com', 10)");
mysqli_query($conn_db, "INSERT INTO user_infos VALUES ('test2', false, 'address of test2', '0222222222', 'test2mail@gmail.com', 11)");
mysqli_query($conn_db, "INSERT INTO user_infos VALUES ('test3', true,  'address of test3', '0333333333', 'test3mail@gmail.com', 12)");
mysqli_query($conn_db, "INSERT INTO user_infos VALUES ('test4', false, 'address of test4', '0444444444', 'test4mail@gmail.com', 11)");
mysqli_query($conn_db, "INSERT INTO user_infos VALUES ('test5', true,  'address of test5', '0555555555', 'test5mail@gmail.com', 10)");

?>