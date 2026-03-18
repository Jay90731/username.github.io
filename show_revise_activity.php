<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/add_activity.css">

    <title>註冊</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 pt-4">
            <img src="assets\img\4.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <form action="php_api/revise_activity.php" method="post">
                <div class="mb-4">
                <h3>修改活動</h3>
                </div>
                <?php
                    $ac_name = $_POST['revise_name'];
                    $server="localhost";//主機
                    $db_username="root";//你的資料庫使用者名稱
                    $db_password="";//你的資料庫密碼
                    $con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
                    if(!$con){
                    die("can't connect");//如果連結失敗輸出錯誤
                    }
                    mysqli_select_db($con,"master_website");//選擇資料庫（我的是test）

                    $query = "select * from activities where name='$ac_name';"; //You don't need a ; like you do in SQL
                    $result = mysqli_query($con,$query);

                    $row = mysqli_fetch_array($result);
                    echo 
                    "<div class='form-group first mt-2'>
                      <label for='username'></label>
                      <input type='text' class='form-control' id='name' name='name' readonly value='".$row['name']."'>
                    </div>
                    <div class='form-group mt-2'>
                      <label for='username'>副標題</label>
                      <input type='text' class='form-control' id='subtitle' name='subtitle' value='".$row['subtitle']."'>
                    </div>
                    <div class='form-group mt-2'>
                      <label for='username'>描述</label>
                      <input type='textarea' class='form-control' id='description' name='description'value='".$row['description']."'>
                    </div>
                    <div class='form-group mt-2'>
                      <label for='username'></label>
                      <input type='datetime-local' class='form-control' id='datetime' name='datetime' value='".$row['datetime']."'>
                    </div>
                    <div class='form-group mt-2'>
                      <label for='username'>地點</label>
                      <input type='text' class='form-control' id='location' name='location' value='".$row['location']."'>
                    </div>
                    <div class='form-group mt-2 last mb-4'>
                      <label for='username'>備註</label>
                      <input type='text' class='form-control' id='note' name='note' value='".$row['note']."'>
                    </div>"
                    ?>
                  
                  <input type="submit" value="修改" class="btn btn-block btn-primary" name="submit">
                </div>
              </form>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="assets/js/js_add/jquery-3.3.1.min.js"></script>
    <script src="assets/js/js_add/popper.min.js"></script>
    <script src="assets/js/js_add/bootstrap.min.js"></script>
    <script src="assets/js/js_add/main.js"></script>
  </body>
</html>