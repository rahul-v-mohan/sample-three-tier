<html>
    <head>

        <?php include_once 'CORE/base_page.php'; ?>
    </head>
    <body>
        <form id="log_in_form" action="action_page.php" method="post">
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" >

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password">

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form> 
    </body>
</html>