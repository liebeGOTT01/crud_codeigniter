<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SHOW USER</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>

    <div class="container p-2">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $success = $this->session->userdata('success');
                    if($success!= ""){
                        ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php
                    }
                ?>
                <?php 
                    $failure = $this->session->userdata('failure');
                    if($failure!= ""){
                        ?>
                         <div class="alert alert-success"><?php echo $failure; ?></div>
                <?php
                    }
                ?>
            
            </div>
        </div>



        <div class="row mb-4 mt-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6"><h3>View users</h3></div>
                    <hr>
                    <div class="col-6 text-right">
                        <a href=" <?php echo base_url(). 'index.php/user/create/';?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <th>USER ID</th>
                        <th>USER NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>CREATED AT</th>
                        <th width="60">EDIT</th>
                        <th width="100">DELETE</th>
                    </tr>

                    <?php if(!empty($users)) {foreach($users as $user) {?>
                        <tr>
                            <td><?php echo $user['userID'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['password'] ?></td>
                            <td><?php echo $user['createdAt'] ?></td>
                            <td> 
                                <a href=" <?php echo base_url(). 'index.php/user/edit/'.$user['userID'] ?>"  class="btn btn-primary">Edit</a>
                            </td>
                            <td> 
                                <a href=" <?php echo base_url(). 'index.php/user/delete/'.$user['userID'] ?>"  class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }} else{?>
                        <tr>
                            <td colspan="5">RECORD NOT FOUND</td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>