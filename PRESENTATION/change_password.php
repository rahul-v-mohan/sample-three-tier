<?php include_once 'page_top.php'; ?>
<?php
$page_title = 'Change Password';
$action_page = 'PROCESS/changepwd_process.php';
?>
<?php
  include 'header_user.php';  
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

                        <form id="change_password_form" method="post" action="<?php echo $action_page; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Current Password <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="current_password" name="current_password" placeholder="Enter Your Current Password" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Enter Your New Password" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="ReEnter Your New Password" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    <?php include 'footer.php' ?>