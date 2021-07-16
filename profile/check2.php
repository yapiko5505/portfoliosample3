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

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $postal1=$_POST['postal1'];
        $postal2=$_POST['postal2'];
        $address=$_POST['address'];
        $gendar=$_POST['gendar'];
        $birth=$_POST['birth'];
        $content=$_POST['content'];

        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $postal1 = htmlspecialchars($postal1);
        $postal2 = htmlspecialchars($postal2);
        $address = htmlspecialchars($address);
        $gendar = htmlspecialchars($gendar);
        $birth = htmlspecialchars($birth);
        $content = htmlspecialchars($content);
        
        if($name=='') {
            print '氏名が入力されていません。<br>';
        } else {
            print '氏名';
            print $name;
            print '様';
            print'<br>';
        }

        if($email=='') {
            print 'メールアドレスが入力されていません。<br>';
        } else {
            print 'メールアドレス';
            print $email;
            print'<br>';
        }

        if($phone=='') {
            print '電話番号が入力されていません。<br>';
        } else {
            print '電話番号';
            print $phone;
            print'<br>';
        }
        
        if(preg_match('/\A[0-9]+\z/',$postal1)==0)
        {
            print '郵便番号は半角数字で入力してください。<br><br>';
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
        }
        
        if($address=='')
        {
            print '住所が入力されていません。<br><br>';
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
           

        if($name=='' || $email=='' || $phone=='' || $postal1=='' || $postal2=='' || $address=='' || $gendar=='' || $birth=='' || $content=='') 
        {
            print '<form method="post" action="thanks2.php">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        } else{

            print '<form method="post" action="thanks2.php">';
            print '<input name="name" type="hidden" value="'.$name.'">';
            print '<input name="email" type="hidden" value="'.$email.'">';
            print '<input name="phone" type="hidden" value="'.$phone.'">';
            print '<input name="postal1" type="hidden" value="'.$postal1.'">';
            print '<input name="postal2" type="hidden" value="'.$postal2.'">';
            print '<input name="address" type="hidden" value="'.$address.'">';
            print '<input name="gendar" type="hidden" value="'.$gendar.'">';
            print '<input name="birth" type="hidden" value="'.$birth.'">';
            print '<input name="content" type="hidden" value="'.$content.'">';

            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK">';
            print '</form>';

        }

    ?>
   
</body>
</html>