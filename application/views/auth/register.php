<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.cs">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
                <h3 class="text-center">Registration Form</h3>
            </div>
            <form  action="<?= base_url() ?>auth/register" method="post" accept="" class="shadow p-4">                  
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    <?= form_error('username'); ?>
                </div>
                
                <div class="mb-3">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="email" id="Email" placeholder="Email">
                    <?= form_error('email'); ?>
                </div>

                <div class="mb-3">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password1" id="Password" placeholder="Password">
                    <?= form_error('password1'); ?>
                </div>

                <div class="mb-3">
                    <label for="confirm">Confirm password</label>
                    <input type="password" class="form-control" name="password2" id="Password" placeholder="Confirm">
                    <?= form_error('password2'); ?>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Register</button>
                </div>

                <hr>

                <p class="text-center mb-0">Already have an account? <a href="<?= base_url() ?>auth">Login</a></p>
                
            </form>
        </div>
    </div>
</div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- js -->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
</body>
</html>