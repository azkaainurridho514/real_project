<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
            <?= $this->session->flashdata('message') ?>
                <h3 class="text-center">Login Form</h3>
            </div>
            <form  action="<?= base_url('auth') ?>" method="post" class="shadow p-4">                  
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Username">
                    <?= form_error('email', '<small>', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                    <?= form_error('password', '<small>', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </div>

                <hr>

                <p class="text-center mb-0">If you have not account <a href="<?= base_url() ?>auth/register">Register Now</a></p>
                 
            </form>
        </div>
    </div>
</div>

</body>
</html>