<!-- page content -->
<?php include('template/header.php'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="row" style="display: inline-block">
            <!-- main content -->
            <div class="col-md-12 col-lg-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="add-details">
                            <button type="submit" class="btn btn-primary float-right mt-0 mb-0" data-toggle="modal"
                                data-target="#addDetailsModal">
                                Add Details <i class="fa fa-plus-circle"></i>
                            </button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead class="text-center mt-0">
                                            <tr>
                                                <th>#</th>
                                                <th>Programme<br>
                                                    Title</th>
                                                <th>Target<br> Group</th>
                                                <th>Date</th>
                                                <th>Programme<br>
                                                    Director</th>
                                                <th>Dealing<br> Assitant</th>
                                                <th>Programme Schedule<br> (In pdf)</th>
                                                <th>Attendance<br> (In pdf)</th>
                                                <th>Reading matrial</th>
                                                <th>Payment pdf</th>
                                                <th>Payment Done</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1;
                                        if ($prog_data) {
                                            // print_r($prog_data);die;
                                            foreach ($prog_data as $key) { ?>
                                                <tbody id="form_details_table">
                                                    <tr>
                                                        <td class="text-center text-danger">
                                                            <?php echo $i++; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['progTitle']; ?>
                                                        </td>
                                                        <td c class="text-center text-danger">
                                                            <?php echo $key['targetGroup']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['date']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['progDirector']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['dealingAsstt']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['progPdf']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['attandancePdf']; ?>
                                                        </td>
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['materialLink']; ?>
                                                        </td>
                                                        <!-- <td class="text-center text-danger">
                                                            <?php //echo $key['paymentPdf']; ?>
                                                        </td> -->
                                                        <td class="text-center text-danger">
                                                            <?php echo $key['paymentdone']; ?>
                                                        </td>

                                                    </tr>

                                                <?php }
                                        } else { ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td>demo</td>
                                                    <td class="">
                                                        <div
                                                            class="row d-flex justify-content-between align-items-start w-100">
                                                            <div role="presentation" class="dropdown ml-5">
                                                                <a id="drop5" href="#" class="#" data-toggle="dropdown"
                                                                    aria-haspopup="true" role="button"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-bars fa-lg"></i>
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">Edit Details</a>
                                                                    <a class="dropdown-item" href="#">Edit Prog. Schedule
                                                                        (pdf)</a>
                                                                    <a class="dropdown-item" href="#">Edit Attendance
                                                                        (pdf)</a>
                                                                    <a class="dropdown-item" href="#">Edit Payment (pdf)</a>
                                                                    <a class="dropdown-item" href="#">Lock (pdf)</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                            <!-- Add margin to the left of delete icon -->
                                                            <div class="delete-details ml-2 mr-3">
                                                                <i class="fa fa-trash text-danger fa-lg"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12" class="text-center text-danger">No Data Found
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main content -->
            <!-- model start  -->
            <!-- add details modal -->
            <div class="modal fade" id="addDetailsModal" tabindex="-1" role="dialog"
                aria-labelledby="addDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#608BC1;">
                            <h5 class="modal-title text-white" id="addDetailsModalLabel">Add Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-area custom-background">
                                <?php //echo form_open(base_url('/admin/saveDetails'), array('id' => 'doc_form_id', 'name' => 'doc_form', 'method' => 'post')); ?>
                                <form id="add_form_details" action="<?php echo base_url('/admin/saveDetails'); ?>"
                                    method="POST">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width: 30%;"><label for="progTitle">Programme Title</label></td>
                                            <td><input type="text" class="form-control" id="progTitle" name="progTitle"
                                                    value="dslfj" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="targetGroup">Target Group</label></td>
                                            <td><input type="text" class="form-control" id="targetGroup"
                                                    name="targetGroup" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="date">Date</label></td>
                                            <td><input type="date" class="form-control" id="date" name="date"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="progDirector">Programme
                                                    Director</label>
                                            </td>
                                            <td><input type="text" class="form-control" id="progDirector"
                                                    name="progDirector" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="dealingAsstt">Dealing Assistant</label>
                                            </td>
                                            <td>
                                                <select class="form-control" id="dealingAsstt" name="dealingAsstt">
                                                    <option value="">Select</option>
                                                    <option value="DA-1">DA-1</option>
                                                    <option value="DA-2">DA-2</option>
                                                    <option value="DA-3">DA-3</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="progPdf">Programme Schedule in
                                                    PDF</label>
                                            </td>
                                            <td><input type="file" class="form-control mt-2" id="progPdf"
                                                    name="progPdf">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="attandancePdf">Attendance in
                                                    PDF</label>
                                            </td>
                                            <td><input type="file" class="form-control mt-2" id="attandancePdf"
                                                    name="attandancePdf"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%;"><label for="materialLink">Reading Material
                                                    Link</label>
                                            </td>
                                            <td><input class="form-control" id="materialLink" name="materialLink"></td>
                                        </tr>
                                        <!-- <tr>
                                            <td style="width: 30%;"><label for="attandancePdf">Payment
                                                    PDF</label>
                                            </td>
                                            <td><input type="file" class="form-control mt-2" id="paymentPdf"
                                                    name="paymentPdf"></td>
                                        </tr> -->
                                        <tr>
                                            <td style="width: 30%;"><label for="paymentdone">Payment Done</label></td>
                                            <td>
                                                <select class="form-control" id="paymentdone" name="paymentdone">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr></tr>
                                    </table>
                                    <?php //echo form_close(); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="save_add_Button">Save
                                Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /models end -->

        </div>
    </div>
</div>
<!-- add details ajax -->
<script></script>
<?php include('template/footer.php'); ?>
<!-- /page content -->