<?php
$server="localhost";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="";//你的資料庫密碼
$con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
if(!$con){
die("can't connect");//如果連結失敗輸出錯誤
}
mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）

$name = $_POST['download_name'];
$result = mysqli_query($con, "SELECT account,name,phone,email FROM $name");

header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=\"export_table.csv\"");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$output = fopen('php://output', 'w');

    fputcsv($output, array('Account','Name','Phone','Email'));

while ($row = mysqli_fetch_assoc($result))
    {
    fputcsv($output, $row);
    }

fclose($output);
mysqli_free_result($result);
header("refresh:0;url=../activities_mgt.php");

?>
