<!-- <if(isset($_POST['submit'])) 
{   
    $server="localhost";//主機
    $db_username="root";//你的資料庫使用者名稱
    $db_password="";//你的資料庫密碼
    $con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
    if(!$con){
    die("can't connect");//如果連結失敗輸出錯誤
    }
    mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）
    $permission = $_POST['permission'];
    $account = $_POST['account'];//post獲得使用者名稱錶單值
    $password = $_POST['password'];//post獲得使用者密碼單值
    if ($account && $password){//如果使用者名稱和密碼都不為空
    $sql = "select * from user where account = '$account' and password='$password' and permission='$permission'";//檢測資料庫是否有對應的username和password的sql
    $result = mysqli_query($con,$sql);//執行sql
    $rows=mysqli_num_rows($result);//返回一個數值
    $row = mysqli_fetch_array($result);
    if($rows){//0 false 1 true 
    session_start();
    $_SESSION["temp"]=$row;
    if($permission==0){
    header("refresh:0;url=../index.html");
    }else{
    header("refresh:0;url=../administer_index.html");
    }
    exit;
    }else{
    echo"<div class=\"wrong\">帳號不存在</div>";
    }
    }
    mysqli_close($con);//關閉資料庫
} -->

<?php
$account = $_POST['deleted_account'];
$server="localhost";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="";//你的資料庫密碼
$con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫

if(!$con){
die("can't connect");//如果連結失敗輸出錯誤
}
mysqli_select_db($con,"master_website");
if ($account){//如果使用者名稱和密碼都不為空
    $sql = "delete from user where account='$account' and permission='一般成員';";//檢測資料庫是否有對應的username和password的sql
    $result = mysqli_query($con,$sql);//執行sql
    header("refresh:0;url=../member_mgt.php");
    exit;
    }
mysqli_close($con);//關閉資料庫

?>