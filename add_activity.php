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
    $subtitle=$_POST['subtitle'];
    $description=$_POST['description'];
    $location=$_POST['location'];
    $datetime=date("Y-m-d H:i:s", strtotime($_POST['datetime']));
    $note=$_POST['note'];
    // $img=$_POST['img'];

    $q="insert into activities(name,subtitle,description,location,datetime,note) values ('$name','$subtitle','$description','$location','$datetime','$note')";//向資料庫插入表單傳來的值的sql
    $result=mysqli_query($con,$q);//執行sql

    $q2="create table $name
        (name char(50),
        account char(50),
        email char(50),
        phone char(60));";

    $result2=mysqli_query($con,$q2);
        
    if (!$result){
    die('Error');//如果sql執行失敗輸出錯誤
    }else{
    header("refresh:0;url=../activities_mgt.php");
    }
    mysqli_close($con);//關閉資料庫
}
?>
