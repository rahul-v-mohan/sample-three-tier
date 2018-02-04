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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact Us</h4>
                    </div>
                    <div class="card-body">
                        <form id="contact_form" method="post" action="PROCESS/contact_process.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mobile <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter Your Mobile" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message <span class="mandatory">*</span></label>
                                        <textarea  class="form-control" id="message" name="message"  placeholder="Enter Your message" rows="6" ></textarea>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Address</h4>
                    </div>
                    <div class="card-body">
                        Address<br>
                        Address<br>
                        Address<br>
                        Address<br>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mobile</h4>
                    </div>
                    <div class="card-body">
                        Number<br>
                        Mail<br>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>