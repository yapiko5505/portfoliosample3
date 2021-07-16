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

    function sanitize($before) 
    {
        foreach($before as $key=> $value)
        {
            $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $after;
    }

    $post=sanitize($_POST);

    $name=$post['name'];
    $email=$post['email'];
    $phone=$post['phone'];
    $postal1=$post['postal1'];
    $postal2=$post['postal2'];
    $address=$post['address'];
    $gendar=$post['gendar'];
    $birth=$post['birth'];
    $content=$post['content'];


    $okflg=true;

    if($name=='')
    {
        print 'お名前が入力されていません。<br><br>';
            $okflg=false;
    } else {
        print 'お名前<br>';
        print $name;
        print '<br><br>';
    }

    if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0)
    {
        print 'メールアドレスを正確に入力してください。<br><br>';
        $okflg=false;
    } else {
        print 'メールアドレス';
        print $email;
        print '<br><br>';
    }

    if($phone=='') {
        print '電話番号が入力されていません。<br>';
        $okflg=false;
    } else {
        print '電話番号';
        print $phone;
        print'<br>';
    }

    if(preg_match('/\A[0-9]+\z/',$postal1)==0)
    {
        print '郵便番号は半角数字で入力してください。<br><br>';
        $okflg=false;
    } else {
        print '郵便番号<br>';
        print $postal1;
        print '-';
        print $postal2;
        print '<br><br>';
    }

    if(preg_match('/\A[0-9]+\z/',$postal2)==0)
    {
        print '郵便番号は半角数字で入力してください。<br><br>';
        $okflg=false;
    }

    if($address=='')
    {
        print '住所が入力されていません。<br><br>';
            $okflg=false;
    } else {
        print '住所<br>';
        print $address;
        print '<br><br>';
    }

    print '性別<br>';
    if($gendar=='ladys')
    {
        print '女性';
    } else {
        print '男性';
    }

    if($birth=='') {
        print '生年月日が入力されていません。<br>';
        $okflg=false;
    } else {
        print '生年月日';
        print $birth;
        print'<br>';
    }

    if($content=='')
    {
        print 'お問い合わせ内容が入力されていません。<br><br>';
        $okflg=false;
    } else {
        print 'お問い合わせ内容<br>';
        print $content;
        print '<br><br>';
    }  

    if($okflg==true)
    {
        print '<form method="post" action="thanks.php">';
        print '<form method="hidden" name="name" value="'.$name.'">';
        print '<form method="hidden" name="email" value="'.$email.'">';
        print '<form method="hidden" name="phone" value="'.$phone.'">';
        print '<form method="hidden" name="postal1" value="'.$postal1.'">';
        print '<form method="hidden" name="postal2" value="'.$postal2.'">';
        print '<form method="hidden" name="address" value="'.$address.'">';
        print '<form method="hidden" name="gendar" value="'.$gendar.'">';
        print '<form method="hidden" name="birth" value="'.$birth.'">';
        print '<form method="hidden" name="content value="'.$content.'">';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print ' <input type="submit" value="OK"><br>';  
        print '</form>';
    }
    else
    {
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    }

?>

</body>
</html>