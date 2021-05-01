<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>EDIT USER</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>

    <div class="container p-2">
        <h3>Edit user</h3>
        <form method="POST" name="editUser" action="<?php echo base_url().'index.php/user/edit/'.$user['userID'];?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="name" values="<?php echo set_value('name', $user['username']); ?>" class="form-control">
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <input type="email" name="email" values="<?php echo set_value('email',$user['email']); ?>" class="form-control">
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" name="password" values="<?php echo set_value('password',$user['password']); ?>" class="form-control">
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">UPDATE</button>
                        <a href="<?php echo base_url(). 'index.php/user/index/';?>" class="btn-secondary btn">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>