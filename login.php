<?php
session_start(); // 启动会话

if(isset($_POST['submit'])) {
    $server = "localhost"; // 数据库主机
    $db_username = "root"; // 数据库用户名
    $db_password = "123
    45678"; // 数据库密码
    $db_name = "limit"; // 数据库名称

    // 创建数据库连接
    $conn = mysqli_connect($server, $db_username, $db_password, $db_name);

    // 检查连接是否成功
    if(!$conn) {
        die("无法连接到数据库: " . mysqli_connect_error());
    }

    // 从表单获取用户输入的值
    $permission = $_POST['permission'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    // 防止 SQL 注入，使用 prepared statements
    $sql = "SELECT * FROM user WHERE account = ? AND password = ? AND permission = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // 绑定参数并执行查询
    mysqli_stmt_bind_param($stmt, "sss", $account, $password, $permission);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // 检查是否有匹配的用户
    if(mysqli_num_rows($result) == 1) {
        // 用户验证成功，将用户信息存储在 Session 中
        $_SESSION['loggedin'] = true;
        $_SESSION['account'] = $account;

        // 根据权限级别重定向到不同的页面
        if($permission == "一般成員") {
            header("Location: index.html");
            exit;
        } else if($permission == "管理員") {
            header("Location: administer_index.html");
            exit;
        }
    } else {
        echo "<div class='wrong'>帳號或密碼不正確</div>";
    }

    // 关闭数据库连接
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
