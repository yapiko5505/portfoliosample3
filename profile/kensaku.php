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

        $id=$_POST['id'];

        $dsn = 'mysql:dbname=profiles; host=localhost';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);

        $sql='SELECT * FROM pro_user WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $id;
        $stmt->execute($data);

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
    <br><a href="kensaku.html">検索画面に戻る</a>
</body>
</html>