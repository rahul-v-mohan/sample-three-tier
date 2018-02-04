<?php include_once 'page_top.php'; ?>
<?php
$page_title = 'Forget Password';
$action_page = 'PROCESS/forget_process.php';
?>
<?php
  include 'header_site.php';  
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
                        <h4 class="card-title"><?php echo $page_title; ?></h4>
                    </div>
                    <div class="card-body">
                        <form id="forgetpassword_form" method="post" action="<?php echo $action_page; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username[Email]<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Username" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Reset Password</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>