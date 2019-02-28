<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Employee</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
            <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </head>
    <body>
        <div class="text-center">
            <div class="alert alert-primary" role="alert">
                <h1>Edit Employee Data</h1>
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
                <form action="<?php echo base_url('index.php/EmpController/emp_edit_save'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="empID" value="<?php echo $emp_details['emp_id']; ?>">
                    <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="EmployeeName">Employee Name*</label>
                            <input type="text" class="form-control" id="empName" name="empName" value="<?php echo $emp_details['emp_name']; ?>" placeholder="Enter Name" required="required">
                        </div>
                        
                        <div class="form-group">
                            <label for="Password">Employee Password*</label>
                            <input type="password" class="form-control" id="empPassword" name="empPassword" placeholder="Enter Password" value="<?php echo $emp_details['emp_password']; ?>" required="required" readonly="readonly">
                        </div>
                        
                        <div class="form-group">
                            <label for="Mail">Employee Mail</label>
                            <input type="email" class="form-control" id="empMail" name="empMail" value="<?php echo $emp_details['emp_mail']; ?>" placeholder="Enter Mail">
                        </div>
                        <div class="form-group">
                            <label for="Mobile">Employee Mobile</label>
                            <input type="number" class="form-control" id="empMobile" name="empMobile" value="<?php echo $emp_details['emp_mobile']; ?>" placeholder="Enter Mobile">
                        </div>
                        <div class="form-group">
                            <label for="Address">Employee Address</label>
                            <textarea class="form-control" id="empAddress" name="empAddress" placeholder="Enter Address"><?php echo $emp_details['emp_address']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="Birthdate">Employee Birthdate</label>
                            <input type="date" class="form-control" id="empBirthdate" name="empBirthdate" placeholder="Enter Birthdate" value="<?php echo $emp_details['emp_birthdate']!=NULL ? date('Y-m-d',$emp_details['emp_birthdate']) : ""; ?>">
                        </div>
                        <div class="form-group">
                            <label for="City">Employee City</label>
                            <select class="form-control" id="empCity" name="empCity">
                                <?php if(empty($emp_details['emp_city'])){ ?>
                                    <option value="">-Select-</option>
                                <?php } ?>
                                <option value="Surat" <?php echo $emp_details['emp_city'] == "Surat" ? "selected" :""; ?>>Surat</option>
                                <option value="Valsad" <?php echo $emp_details['emp_city'] == "Valsad" ? "selected" :""; ?> >Valsad</option>
                                <option value="Navsari" <?php echo $emp_details['emp_city'] == "Navsari" ? "selected" :""; ?>>Navsari</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Employee Gender</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="empGender" <?php echo $emp_details['emp_gender'] == "M" ? "checked" : ""; ?> value="M"> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="empGender" <?php echo $emp_details['emp_gender'] == "F" ? "checked" : ""; ?> value="F"> Female
                            </label> 
                        </div>
                        <div class="form-group">
                            <label for="Language">Employee Language</label><br>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="English" <?php echo in_array("English", explode(",",$emp_details['emp_language'])) ? "checked" : ""; ?> name="empLanguage[]"> English
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Hindi" <?php echo in_array("Hindi",explode(",",$emp_details['emp_language'])) ? "checked" : ""; ?> name="empLanguage[]"> Hindi
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Gujarati" <?php echo in_array("Gujarati",explode(",",$emp_details['emp_language'])) ? "checked" : ""; ?> name="empLanguage[]"> Gujarati
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="Profile">Employee Profile</label>
                            <img src="<?php echo base_url(); ?>assets/emp_profile/<?php echo $emp_details['emp_profile']; ?>" width="50" height="50">
                            <input type="file" class="form-control-file" id="empProfile" name="empProfile">
                            <input type="hidden" name="old_profile" value="<?php echo $emp_details['emp_profile']; ?>">
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
                $('.container').click(function(){
                    $('#msg_text').hide();
                });
            });
        </script>
    </body>
</html>