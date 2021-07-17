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
            $dsn = 'mysql:dbname=profiles;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT id, name FROM pro_staffs WHERE 1';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

            print 'スタッフ一覧<br><br>';

            print '<form method="post" action="staff_branch.php">';
            while(true)
            {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                if($rec==false)
                {
                    break;
                }
                print '<input type="radio" name="staffcode" value="'.$rec['id'].'">';
                print $rec['name'];
                print '<br>';

            }

            print '<input type="submit" name="disp" value="参照">';
            print '<input type="submit" name="add" value="追加">';
            print '<input type="submit" name="edit" value="修正">';
            print '<input type="submit" name="delete" value="削除">';
            print '</form>';
            
        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }
    ?>

    <br><a href="../staff_login/staff_top.php">トップメニューへ</a><br>
</body>

</html>