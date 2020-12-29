
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-dark text-white text-center p-3">
            <h1> Login</h1>
        </div>
        <div class="row-lg-12 p-5">
        <h2 class="text-center">LOGIN</h2>
        </div>
        <div class="row-lg-4 p-5">
            <?php $fail = $this->session->userdata('failure') ;
                if($fail){?>
            <div class="alert alert-failure mt-5"><?php echo $fail; ?></div>
            <?php }
                ?>
            <form action="<?php echo base_url().'index.php/Register/login' ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value=""
                        aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                    <h6><?php echo form_error('email') ?></h6>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" value="" id="exampleInputPassword1"
                        placeholder="Password">
                    <h6><?php echo form_error('password') ?></h6>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="h1 mt-3">OR</p>
            <a class="btn btn-primary ml-auto mt-3" href="<?php echo base_url().'index.php/Register/reg/' ?>">Register</a>

        </div>
    </div>
</body>

</html>