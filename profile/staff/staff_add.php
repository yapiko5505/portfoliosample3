<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品集</title>
</head>
<body>
    <p>スタッフ追加</p><br>
   <form method="post" action="staff_add_check.php">
       <p>スタッフ名を入力してください。</p>
        <input type="text" name="name" style="width:200px"><br>
        <p>パスワードを入力してください。</p>
        <input type="password" name="pass" style="width:100px"><br>
        <p>パスワードをもう一度入力してください。</p>
        <input type="password" name="pass2" style="width:100px"><br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK" >
   </form>
    
</body>
</html>