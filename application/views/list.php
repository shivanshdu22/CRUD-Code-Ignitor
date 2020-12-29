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
        <div class="row bg-primary text-white text-center p-3">
            <h1> Complete Data of Table</h1>
            <p class="ml-auto pt-4">Welcome <?php echo $_SESSION['userdata']['name'] ?></p>
        </div>
        <?php $success = $this->session->userdata('success') ;
                if($success){?>
                    <div class="alert alert-success mt-5"><?php echo $success; ?></div>
               <?php }
                ?> 
        <div class="row p-5">
            <h1 class="text-center text-primary">ALL DATA</h1> <a class="btn btn-primary ml-auto px-3 pt-3" href ="<?php echo base_url().'index.php/Register/index/';?>">ADD+</a><a class="btn btn-primary ml-auto px-3 pt-3" href ="<?php echo base_url().'index.php/Admin/Admin/logout/';?>">LOGOUT</a>
            <?php if(!empty($data)){ 
                ?>
                
            <table class="table table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $key=>$data) {?>
                        <tr>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><a class= "btn btn-success" href="<?php echo base_url().'index.php/Admin/Admin/edit/'.$data['id'] ?>">Edit  </a>
                        <a  class= "btn btn-danger" href="<?php echo base_url().'index.php/Register/del/'.$data['id'] ?>" onclick="return confirm('Are you sure want to Delete this User?')" >Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</body>

</html>