<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品集</title>
</head>
<body>

    <?php 

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $postal1=$_POST['postal1'];
        $postal2=$_POST['postal2'];
        $address=$_POST['address'];
        $gendar=$_POST['gendar'];
        $birth=$_POST['birth'];
        $content=$_POST['content'];

        $dsn = 'mysql:dbname=profiles;host=localhost';
        $user = 'root';
        $password = '';

    try
    {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $postal1 = htmlspecialchars($postal1);
        $postal2 = htmlspecialchars($postal2);
        $address = htmlspecialchars($address);
        $gendar = htmlspecialchars($gendar);
        $birth = htmlspecialchars($birth);
        $content = htmlspecialchars($content);

        print $name.'様<br>';
        print 'お問い合わせありがとうございました。<br>';
        print $email.'にメールを送りましたのでご確認ください。<br>';
        print $postal1.'-'.$postal2.'<br>';
        print $address.'<br>';
        print $phone.'<br>';
        print $gendar.'<br>';
        print $birth.'<br>';
        print $content.'<br>';


        $mail_sub = 'アンケート受け付けました。';
        $mail_body = $name."様へ\nアンケートご協力ありがとうございました。";
        $mail_body= html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
        $mail_head = 'From: xxx@xxx.co.jp';
        mb_language('Japanese');
        mb_internal_encoding("UTF-8");
        mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

        $sql = 'INSERT INTO pro_user (name, email, phone, postal1, postal2, address, gendar, birth, content)
        VALUES(" '.$name.' "," '.$email.' "," '.$phone.' "," '.$postal1.' "," '.$postal2.' "," '.$address.' "," '.$gendar.' "," '.$birth.' "," '.$content.' ", )';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;
}

catch(Exception $e)
{
print 'ただいま障害により大変ご迷惑をおかけしております。';
print $e;
}
?>
    
</body>
</html>