<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        print 'ログインされていません。<br>';
        print '<a href = "../staff_login/staff_login.html">ログイン画面へ</a>';  
        exit();
    } 
    else {
        print $_SESSION['staff_name'];
        print 'さんログイン中<br>';
        print '<br>';
    }

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品集</title>
</head>
<body>
    <p>スタッフ管理トップメニュー<br></P>
        <br><a href="../staff/staff_list.php">スタッフ管理</a><br>
        <a href="../staff/ichiran.php">問い合わせ一覧</a><br><br>
        <a href="../staff/kensaku.html">アンケート検索</a><br><br>
        <br><a href="staff_logout.php">ログアウト</a><br>
    </p>
</body>
</html>