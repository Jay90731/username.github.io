<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php if(isset($_POST['submit'])) 
{ 
    $server="localhost";//主機
    $db_username="root";//你的資料庫使用者名稱
    $db_password="";//你的資料庫密碼
    $con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
    if(!$con){
    die("can't connect");//如果連結失敗輸出錯誤
    }
    mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）

    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }//判斷是否有submit操作
    $name=$_POST['name'];//post獲取表單裡的name
    $account=$_POST['account'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $permission=$_POST['permission'];
    $phone=$_POST['phone'];
    $grade=$_POST['grade'];
    $q="insert into user(name,account,password,email,permission,phone,grade) values ('$name','$account','$password','$email','$permission','$phone','$grade')";//向資料庫插入表單傳來的值的sql
    $reslut=mysqli_query($con,$q);//執行sql
    if (!$reslut){
    die('Error');//如果sql執行失敗輸出錯誤
    }else{
    echo "註冊成功";//成功輸出註冊成功
    header("refresh:0;url=login_index.html");
    }
    mysqli_close($con);//關閉資料庫
}
?>
</body>
</html>
