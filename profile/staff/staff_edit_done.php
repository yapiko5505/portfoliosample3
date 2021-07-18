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
            require_once('../kansu/common.php');

            $post=sanitize($_POST);
            $staff_code=$post['id'];
            $staff_name=$post['name'];
            $staff_pass=$post['pass'];
            $dsn = 'mysql:dbname=profiles;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'UPDATE pro_staffs SET name=?, password=? WHERE id=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $data[] = $staff_code;
            $stmt->execute($data);

            $dbh = null;


        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            print $e;
            exit();
        }
        
    ?>

    <p>修正しました。</p><br><br>
    <a href = "staff_list.php">戻る</a>  

</body>
</html>