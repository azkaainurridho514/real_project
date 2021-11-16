<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <form action="<?= base_url() ?>auth/register" method="post">
        <label> username </label>
        <input type="text" name="username">
        <?= form_error('email'); ?>
            <br>   
        <label> email </label>
        <input type="text" name="email">
        <?= form_error('username'); ?>
            <br>   
        <label> password </label>
        <input type="password" name="password1">
        <?= form_error('password1'); ?>
            <br>
        <label> confirm</label>
        <input type="password" name="password2">
        <?= form_error('password2'); ?>
            <br>
     <button type="submit" name="submit">register</button>
    </form>
</body>
</html>