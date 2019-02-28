<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Registration Data</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
            <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </head>
    <body>
        <div class="text-center">
            <div class="alert alert-primary" role="alert">
                <h1>Employee Registration Data</h1>
            </div>
        </div>
        <div class="container">
            <form action="<?php echo base_url('index.php/EmpController/emp_search');?>" method="post">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <a href="<?php echo base_url('index.php/EmpController/emp_reg');?>"><button type="button" class="btn btn-primary">New Registration</button></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="emp_search" class="form-control" name="emp_search" value="<?php echo $emp_search; ?>">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div><br>
            </form>
            <?php
            if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-primary" id="msg_text" role="alert"><?php echo $this->session->flashdata('msg'); ?></div>
                <?php
            }?>
            <?php 
            if(count($emp_details) > 0){ ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Language</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($emp_details as $emp_data){ ?>
                        <tr>
                            <td><?php echo $emp_data['emp_name']; ?></td>
                            <td><?php echo $emp_data['emp_mail']; ?></td>
                            <td><?php echo $emp_data['emp_mobile']; ?></td>
                            <td><?php echo $emp_data['emp_address']; ?></td>
                            <td><?php echo $emp_data['emp_city']; ?></td>
                            <td><?php echo !empty($emp_data['emp_birthdate']) ? date('d-m-Y',$emp_data['emp_birthdate']) : ""; ?></td>
                            <td><?php echo $emp_data['emp_gender'] == "M" ? "Male" : "Female"; ?></td>
                            <td><?php echo $emp_data['emp_language']; ?></td>
                            <td><img src="<?php echo base_url(); ?>assets/emp_profile/<?php echo $emp_data['emp_profile']; ?>" height="100" width="100"></td>
                            <td><a href="<?php echo base_url('index.php/EmpController/emp_edit/'.$emp_data['emp_id']); ?>">Edit</a></td>
                            <td><a href="<?php echo base_url();?>index.php/EmpController/emp_delete/<?php echo $emp_data['emp_id'];?>" onclick="return confirm('Are you sure ?')">Delete</a></td>
                        </tr><?php
                    }?>
                </tbody>
            </table><?php
            }else{ 
                echo "No Records Found"; 
            }?>
        </div>
        <script>
            $(document).ready(function(){
                 $('.container').click(function(){
                     $('#msg_text').hide();
                 });
            });
        </script>
    </body>
</html>
