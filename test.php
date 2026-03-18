<?php
    
    $server="localhost";//主機
    $db_username="root";//你的資料庫使用者名稱
    $db_password="";//你的資料庫密碼
    $con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
    if(!$con){
    die("can't connect");//如果連結失敗輸出錯誤
    }
    mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）
    $sql=sprintf("select * from activities where name='茶會'");
            
    $result=mysqli_query($con,$sql);        
    
    //顯示圖片
    if($row=mysqli_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['img'];
    }
    
    mysqli_close($conn);
?>