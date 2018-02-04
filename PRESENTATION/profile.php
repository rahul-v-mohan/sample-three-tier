<?php include_once 'page_top.php'; ?>
<?php
$page_title = 'Profile';
$action_page = 'PROCESS/user_reg_process.php';
?>
<?php include 'header_user.php'; ?>

<?php
$name ='';
$email ='';
$mobile ='';
$gender_male_check ='';
$gender_female_check ='';
$status = '1';
$status_check = '';
$id = $_SESSION['USER']['id'];
$method ='update';

       $result =$query->select('user','*',['id'=>$id]) ;
if(!empty($result) ){
       $row=  mysqli_fetch_array($result);
        $id =$row['id'];
        $name =$row['name'];
        $email =$row['email'];
        $mobile =$row['mobile'];
        $gender_male_check =($row['gender'] == 'Male')?'checked':'';
        $gender_female_check =($row['gender'] == 'Female')?'checked':'';
        $status = $row['status'];
        $status_check = ($row['status'] == '1')?'checked':'';
       
}
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
                    <?php if (!empty($_SESSION['MSG'])) { ?>
                <div class="container">

                    <div class="alert alert-warning   alert-dismissable">
                        <strong>INFO</strong> 
                        <?php
                        echo $_SESSION['MSG'] . '.';
                        unset($_SESSION['MSG']);
                        ?> 
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>
                </div>
            <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $page_title ?></h4>
                    </div>
                    <div class="card-body">

                        <form id="user_registration" method="post" action="<?php echo $action_page; ?>">
                            <input type="hidden" class="form-control"  name="id" value="<?php echo $id; ?>">
                            <input type="hidden" class="form-control"  name="method" value="<?php echo $method; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" value="<?php echo $name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email <span class="mandatory">*</span></label>
                                        <input disabled="disabled" type="text" class="form-control" id="email" name="email" placeholder="Enter Your Valid Email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mobile <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter Your Mobile Number" value="<?php echo $mobile; ?>">
                                    </div>
                                </div>
                                    </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender <span class="mandatory">*</span></label>
                                        <div class="options">
                                            <label>Male</label><input type="radio"  id="gender-m" name="gender"  value="Male" <?php echo $gender_male_check; ?>>
                                            <label>Female</label><input type="radio"  id="gender" name="gender"  value="Female" <?php echo $gender_female_check; ?>>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden"  id="status" name="status"   value="<?php echo $status; ?>"  >
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Table-->
    </div>
    <?php include 'footer.php' ?>