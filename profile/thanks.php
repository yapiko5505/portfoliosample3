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

        $dsn = 'mysql:dbname=profiles;host=localhost';
        $user = 'root';
        $password = '';

        try {
                $dbh = new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                print $name.'様<br>';
                print 'お問い合わせありがとうございました。<br>';
                print $email.'にメールを送りましたのでご確認ください。<br>';
                print $postal1.'-'.$postal2.'<br>';
                print $address.'<br>';
                print $phone.'<br>';
                print $gendar.'<br>';
                print $birth.'<br>';
                print $content.'<br>';

                $mail_sub = 'お問い合わせ受け付けました。';
                $mail_body = $name."様へ\nお問い合わせについてご協力ありがとうございました。";
                $mail_body= html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
                $mail_head = 'From: xxx@xxx.co.jp';
                mb_language('Japanese');
                mb_internal_encoding("UTF-8");
                mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

                $sql = 'INSERT INTO pro_users (name, email, phone, postal1, postal2, address, gendar, birth, content) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
                $stmt = $dbh->prepare($sql);
                $data = array();
                $data[] = $md5($pass);
                $data[] = $name;
                $data[] = $email;
                $data[] = $phone;
                $data[] = $postal1;
                $data[] = $postal2;
                $data[] = $address;
                if($gendar=='ladys')
                    {
                        $data[]=1;
                    } else {
                        $data[]=2;
                    }
                $data[]=$birth;
                $data[]=$contents;
                $stmt->execute($data);

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