<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Table with Add and Delete Row Feature</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="assets/css/member_mgt.css">

<!-- <script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
}); -->
<!-- </script> -->
</head>
<body>
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="administer_index.html">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h4 fw-bolder">資管</span> <span class="text-primary h4 fw-bolder">系學會</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-end" id="navbar-toggler-success">
                    <a class="nav-link" href="#"><i class='bx bx-cog bx-sm text-primary'></i></a>
                    <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="table-wrapper ">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>成員管理</h2></div>
                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>帳號</th>
                        <th>會籍</th>
                        <th>刪除會員</th>
                        <th>升級管理員</th>
                    </tr>
                </thead>
                <tbody>
<?php


$server="localhost";//主機
$db_username="limit";//你的資料庫使用者名稱
$db_password="12345678";//你的資料庫密碼
$con = mysqli_connect ($server,$db_username,$db_password);//連結資料庫
if(!$con){
die("can't connect");//如果連結失敗輸出錯誤
}
mysqli_select_db($con,"account");//選擇資料庫（我的是test）

$query = "SELECT * FROM user"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" 
. htmlspecialchars($row['name']) 
."</td><td>"
. htmlspecialchars($row['account']) 
."</td><td>"
. htmlspecialchars($row['permission'])
."</td><td>".

" 
<form action='php_api/delete_member.php' method='post'> 
<input type='hidden' value=".$row['account']." name='deleted_account'>
<input type='submit' class='delete' title='Delete' name='delete' value='刪除'>
</form></td><td>
<form action='php_api/ascend_administer.php' method='post'> 
<input type='hidden' value=".$row['account']." name='ascended_account'>
<input type='submit' class='ascend' title='ascend' name='ascend' value='升管理員'>
</form>
</td></tr>"
;  
}
?>
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>
<form action="" method="POST"></form>