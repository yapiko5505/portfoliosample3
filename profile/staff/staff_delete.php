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
            $staff_code = $_GET['staffcode'];

            $dsn = 'mysql:dbname=profiles;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT id, name FROM pro_staffs WHERE id=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name=$rec['name'];

            $dbh = null;

        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }
    ?>

    <p>スタッフ削除<br></p>
    <p>スタッフコード<br></p>
    <?php print $staff_code; ?><br><br>
    <p>このスタッフは削除してよろしいですか。<br></p>
    <form method="post" action="staff_delete_done.php">
        <input type="hidden" name="id" value="<?php print $staff_code; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK" >
    </form>
</body>

</html>
