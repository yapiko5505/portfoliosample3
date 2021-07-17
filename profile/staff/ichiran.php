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
    <?php 
        $dsn = 'mysql:dbname=profiles;host=localhost';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);

        $sql='SELECT * FROM pro_users WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        while(1)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false)
            {
                break;
            }
            print $rec['id'];
            print $rec['name'];
            print $rec['email'];
            print $rec['phone'];
            print $rec['postal1'];
            print $rec['postal2'];
            print $rec['address'];
            print $rec['gendar'];
            print $rec['birth'];
            print $rec['content'];
            print '<br>';
        }

        $dbh = null;
    ?>
    <br><a href="../staff_login/staff_top.php">メニューに戻る</a>
</body>
</html>
