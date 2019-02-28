<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Employee Registration</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
            <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </head>
    <body>
        <div class="text-center">
            <div class="alert alert-primary" role="alert">
                <h1>New Employee Registration Form</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <a href="<?php echo base_url('index.php/EmpController/'); ?>"><button type="button" class="btn btn-primary">All Employee</button></a>
                </div>
            </div><br>
            <?php
            if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-primary" id="msg_text" role="alert"><?php echo $this->session->flashdata('msg'); ?></div>
                <?php
            }?>
                <form action="<?php echo base_url('index.php/EmpController/emp_reg_save'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="EmployeeName">Employee Name*</label>
                            <input type="text" class="form-control" id="empName" name="empName" value="" placeholder="Enter Name" required="required">
                        </div>
                        <div class="form-group">
                            <label for="Password">Employee Password*</label>
                            <input type="password" class="form-control" id="empPassword" name="empPassword" placeholder="Enter Password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="Mail">Employee Mail</label>
                            <input type="email" class="form-control" id="empMail" name="empMail" placeholder="Enter Mail">
                        </div>
                        <div class="form-group">
                            <label for="Mobile">Employee Mobile</label>
                            <input type="number" class="form-control" id="empMobile" name="empMobile" placeholder="Enter Mobile">
                        </div>
                        <div class="form-group">
                            <label for="Address">Employee Address</label>
                            <textarea class="form-control" id="empAddress" name="empAddress" placeholder="Enter Address"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="Birthdate">Employee Birthdate</label>
                            <input type="date" class="form-control" id="empBirthdate" name="empBirthdate" placeholder="Enter Birthdate">
                        </div>
                        <div class="form-group">
                            <label for="City">Employee City</label>
                            <select class="form-control" id="empCity" name="empCity">
                                <option value="">-Select-</option>
                                <option value="Surat">Surat</option>
                                <option value="Valsad">Valsad</option>
                                <option value="Navsari">Navsari</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Employee Gender</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="empGender" value="M"> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="empGender" value="F"> Female
                            </label> 
                        </div>
                        <div class="form-group">
                            <label for="Language">Employee Language</label><br>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="English" name="empLanguage[]"> English
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Hindi" name="empLanguage[]"> Hindi
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Gujarati" name="empLanguage[]"> Gujarati
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="Profile">Employee Profile</label>
                            <input type="file" class="form-control-file" id="empProfile" name="empProfile">
                        </div>
                    </div>
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div><br>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                $('#empName,#empPassword,#empMail,#empMobile').keyup(function(){
                    $('#msg_text').hide();
                });
            });
        </script>
    </body>
</html>