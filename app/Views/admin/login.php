<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("../public/assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>"
        rel=" stylesheet" />
    <!-- Font Awesome -->
    <link href="<?php echo base_url("../public/assets/vendors/font-awesome/css/font-awesome.min.css"); ?>"
        rel="stylesheet" />
    <!-- NProgress -->
    <link href="<?php echo base_url("../public/assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet" />
    <!-- Animate.css -->
    <link href="<?php echo base_url("../public/assets/vendors/animate.css/animate.min.css"); ?>" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("../public/assets/build/css/custom.min.css"); ?>" rel="stylesheet" />
</head>

<body class="login" style="background: rgb(199, 202, 203)">
    <div class="col-md-12 mb-5">
        <div class="error-message float-right" id="flashMessage">
            <?php if (session()->getFlashdata('error')): ?>
                <div id="error-message" class="alert alert-danger text-white">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="login_wrapper align-items-center" style="max-width: 30rem; max-height: 30rem;">
        <div class="animate form login_form" style="margin-top:100px;">
            <section class="login_content">
                <form action="<?php echo base_url('/admin/login'); ?>" method="POST">
                    <div class="card-header shadow p-3 mb-5 bg-white rounded">
                        <h1 class="text-primary">Login</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="User Name" id="name"
                                    required="" /> <!-- Added name attribute -->
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    id="password" required="" /> <!-- Added name attribute -->
                            </div>
                            <div class="col-md-12">
                                <div class="float-right">
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                            </div>
                        </div>
                        <!-- login button  -->
                        <div class="float-center">
                            <button type="submit" class="btn btn-primary ml-2">
                                Login <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                        <!-- <div class="separator">
                            <p class="change_link text-primary">
                                Are you a new user?
                                <a href="<?php //echo base_url('/admin/register_view'); ?>" class="to_register"> Register
                                </a>
                            </p>
                            <br />
                        </div> -->
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>
<script>
    setTimeout(function () {
        let flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000); // 3000ms = 3 seconds
</script>
<script>
    // function for show password 
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>