<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ろくまる農園</title>
</head>
<body>
    <?php
        
        
            $staff_name=$_POST['name'];
            $staff_pass=$_POST['pass'];

            $dsn = 'mysql:dbname=profiles;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO pro_staffs(name, password) VALUES(?, ?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $stmt->execute($data);

            $dbh = null;

            
            print htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
            print 'さんを追加しました。<br>';

        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            print $e;
            exit();
        }
        
    ?>

    <a href = "staff_list.php">戻る</a>  

</body>
</html>
