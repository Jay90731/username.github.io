<?php
if(isset($_POST['submit'])) 
{   
    $server="localhost";//主機
    $db_username="root";//你的資料庫使用者名稱
    $db_password="";//你的資料庫密碼
    $con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
    if(!$con){
    die("can't connect");//如果連結失敗輸出錯誤
    }
    mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）
    session_start();
    $account = $_SESSION['temp']['account'];
    $activity = $_POST['activity'];

    $sql = "select * from user where account = '$account'";//檢測資料庫是否有對應的username和password的sql
    $result = mysqli_query($con,$sql);//執行sql
    $rows=mysqli_num_rows($result);//返回一個數值
    $row = mysqli_fetch_array($result);

    $name=$row['name'];//post獲取表單裡的name
    $email=$row['email'];
    $phone=$row['phone'];
    $account=$row['account'];
    $q2="insert into $activity (name,account,email,phone) values ('$name','$account','$email','$phone')";//向資料庫插入表單傳來的值的sql
    $result2=mysqli_query($con,$q2);//執行sql

    if (!$result2){
    die('Error');//如果sql執行失敗輸出錯誤
    }else{
    header("refresh:0;url=../activity.html");
    }
    
    mysqli_close($con);//關閉資料庫
}
?>