<?php include_once 'page_top.php'; ?>
<?php include 'header_site.php'; ?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="log_in_form" method="post" action="PROCESS/login_process.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Username" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter Your Password" value="">
                                    </div>
                                </div>

                            </div>
                            <a href="forget_password.php">Forget Password</a> | <a href="user_registration.php">Create Account</a>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Login</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input type="text" class="form-control" placeholder="HH:MM:SS" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input type="text" class="form-control" placeholder="HH:MM:SS" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Search</button>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>