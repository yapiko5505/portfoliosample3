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
            $staff_code = $_GET['staffcode'];
            
        try
        {
            $dsn = 'mysql:dbname=profiles;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
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

    <p>スタッフ修正<br></p>
    <p>スタッフコード<br></p>
    <?php print $staff_code; ?><br><br>
    <form method="post" action="staff_edit_check.php">
        <input type="hidden" name="id" value="<?php print $staff_code; ?>">
        <p>スタッフ名<br></p>
        <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br>
        <p>パスワードを入力してください。</p>
        <input type="password" name="pass" style="width:100px"><br>
        <p>パスワードをもう一度入力してください。</p>
        <input type="password" name="pass2" style="width:100px"><br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK" >
    </form>
</body>

</html>