<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

   <!-- <?= $this->session->flashdata('message') ?> -->
    <h1>login</h1>
    <form action="<?= base_url('auth') ?>" method="post">
      <label>email</label>
      <input type="text" name="email">
      <?= form_error('email', '<small>', '</small>'); ?>
      <br>
      <label>password</label>
      <input type="password" name="password">
      <?= form_error('password', '<small>', '</small>'); ?>
      <br>
      <button type="submit" name="submit">login</button>
    </form>
</body>
</html>