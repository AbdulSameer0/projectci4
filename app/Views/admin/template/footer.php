<!-- footer content -->
<footer class="">
    <div class="text-center">
        <span class="font-weight-bold text-secondary">©
            <a href="dashboard" class="text-secondary">
                Copyright 2024 ||</a> Coding Artist ||
            <a hre f="#" class="font-weight-bold text-secondary" target="_blank">All Rights Reserved</a>
        </span>
        <!-- ©2016 All Rights Reserved.
        <a href="#"></a> -->
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- JavaScript Code -->
<script>
    // Add JavaScript for Search Filter
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#form_details_table tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
    // Add JavaScript to auto hide the message after 5 seconds
    setTimeout(function () {
        let flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 5000); // 5000ms = 5 seconds
</script>
<!-- jQuery -->
<!-- Include SweetAlert JS -->
<script src="<?php echo base_url("../public/assets/vendors/jquery/dist/jquery.min.js"); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("../public/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url("../public/assets/vendors/fastclick/lib/fastclick.js"); ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url("../public/assets/vendors/nprogress/nprogress.js"); ?>"></script>
<!-- Chart.js -->
<script src="<?php echo base_url("../public/assets/vendors/Chart.js/dist/Chart.min.js"); ?>"></script>
<!-- jQuery Sparklines -->
<script
    src="<?php echo base_url("../public/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"); ?>"></script>
<!-- Flot -->
<script src="<?php echo base_url("../public/assets/vendors/Flot/jquery.flot.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/Flot/jquery.flot.pie.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/Flot/jquery.flot.time.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/Flot/jquery.flot.stack.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/Flot/jquery.flot.resize.js"); ?>"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url("../public/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/flot.curvedlines/curvedLines.js"); ?>"></script>
<!-- DateJS -->
<script src="<?php echo base_url("../public/assets/vendors/DateJS/build/date.js"); ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url("../public/assets/vendors/moment/min/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("../public/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url("../public/assets/build/js/custom.min.js"); ?>"></script>
<!-- sweetalert js file -->
<script src="<?php echo base_url("../public/assets/build/js/sweetalert2.min.js"); ?>"></script>

</body>

</html>