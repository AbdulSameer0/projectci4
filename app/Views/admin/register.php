<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Registration</title>

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
    <!-- error message -->
    <div class="col-md-12">
        <div class="error-message float-right" id="flashMessage">
            <?php if (session()->getFlashdata('success')): ?>
                <div id="success-message" class="alert alert-success text-white">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div id="error-message" class="alert alert-danger text-white">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- end error message -->
    <div class="login_wrapper align-items-center" style="max-width: 30rem; max-height: 30rem;">
        <div class="animate form login_form" style="margin-top:100px;">
            <section class="login_content">
                <form action="<?php echo base_url('/admin/registerSubmit'); ?>" method="POST">
                    <div class="card-header shadow p-3 mb-5 bg-white rounded">
                        <h1 class="text-primary">Registration</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Username" id="name"
                                    required="" /> <!-- Added name attribute -->
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Email" id="email"
                                    required="" /> <!-- Added name attribute -->
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    id="password" required="" /> <!-- Added name attribute -->
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="cpass" class="form-control" placeholder="Confirm Password"
                                    id="cpass" required="" /> <!-- Added name attribute -->
                            </div>
                        </div>
                        <div class="float-center">
                            <button type="submit" class="btn btn-primary float-center ml-2">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                        <!-- <div class="separator">
                            <p class="change_link text-primary">
                                Already have an account?
                                <a href="<?php //echo base_url('/'); ?>" class="to_register"> Login </a>
                            </p>
                            <br />
                        </div> -->
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>
<!-- Add JavaScript to auto hide the message after 5 seconds by ritika -->
<script>
    setTimeout(function () {
        let flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000); // 3000ms = 3 seconds
</script>

</html>