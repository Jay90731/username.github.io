<?php
$account = $_POST['ascended_account'];
$server="localhost";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="";//你的資料庫密碼
$con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫

if(!$con){
die("can't connect");//如果連結失敗輸出錯誤
}
mysqli_select_db($con,"master_website");
if ($account){//如果使用者名稱和密碼都不為空
    $sql = "update user set permission='管理員' WHERE account='$account';";//檢測資料庫是否有對應的username和password的sql
    $result = mysqli_query($con,$sql);//執行sql
    header("refresh:0;url=../member_mgt.php");
    exit;
    }
mysqli_close($con);//關閉資料庫

?>