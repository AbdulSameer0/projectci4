<!-- show success and error messages through SweetAlert -->
<div class="title float-right mb-2 mt-2" id="flashMessage">
    <?php if (session()->getFlashdata('success')): ?>
        <!-- Success message in SweetAlert -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    text: '<?= addslashes(session()->getFlashdata('success')) ?>',
                    timer: 2000,
                    showConfirmButton: false,  // Hide the OK button
                    willClose: () => { // Optional: you can add any additional actions when the alert closes
                        // You can do something after the alert closes, like redirecting
                    }
                });
            });
        </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <!-- Error message in SweetAlert -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    text: '<?= addslashes(session()->getFlashdata('error')) ?>',
                    timer: 2000,
                    showConfirmButton: false,  // Hide the OK button
                    willClose: () => { // Optional: you can add any additional actions when the alert closes
                        // You can do something after the alert closes, like redirecting
                    }
                });
            });
        </script>
    <?php endif; ?>
</div>

<!--  -->
<!-- actions -->
<div class="row d-flex">
    <!-- edit and delete details action-->
    <div role="presentation" class="dropdown">
        <a id="drop5" href="#" class="#" data-toggle="dropdown" aria-haspopup="true" role="button"
            aria-expanded="false">
            <i class="fa fa-bars fa-lg text-primary"></i>
        </a>
        <!-- edit details  -->
        <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-danger edit_btn" id="edit_btn" href="#" data-toggle="modal"
                data-target="#editDetailsModal" data-id="<?php echo $key['prog_id']; ?>"
                value="<?php echo $key['prog_id']; ?>" title="Edit Details">
                <i class="fa fa-edit"></i> Edit
                Details
            </a>
            <!-- edit prog. Schedule pdf -->
            <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#edit_program_pdf_Modal">
                <i class="fa fa-file-pdf-o"></i> Edit Prog.
                Schedule(pdf)
            </a>
            <!-- edit attendance Schedule pdf -->
            <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#edit_attendance_pdf_Modal">
                <i class="fa fa-file-pdf-o"></i> Edit
                Attendance(pdf)
            </a>
            <!-- lock pdf details -->
            <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#lockPdfModal">
                <i class="fa fa-lock"></i> Lock Details
            </a>
            <!-- delete details -->
            <a class="dropdown-item text-danger" href="<?php echo base_url("admin/delete/" . $key['prog_id']); ?>">
                <i class="fa fa-trash delete-btn" name="prog_id"></i> Delete details
            </a>
        </div>
    </div>
    <!-- Trigger Button -->
    <!-- <div class="update-details ml-2 mr-3">
                                                                    <a href="#" data-toggle="modal" data-target="#updateModal"
                                                                        data-id="<?php //echo $key['prog_id']; ?>">
                                                                        <i class="fa fa-edit text-primary fa-lg update-btn"
                                                                            name="prog_id"></i>
                                                                    </a>
                                                                </div> -->
    <!-- <div class="delete-details ml-2 mr-3">
                                                                    <a
                                                                        href="<?php //echo base_url("admin/delete/" . $key['prog_id']); ?>">
                                                                        <i class="fa fa-trash text-danger fa-lg delete-btn"
                                                                            name="prog_id"></i>
                                                                    </a>
                                                                </div> -->
</div>

// Handle attendance PDF upload
// $File1 = $this->request->getFile('attandencePdf');


// if ($File1 && $File1->isValid()) {
// $originalAttendanceFileName = $File1->getName();
// $attendanceFileExtension = $File1->getExtension();

// // Concatenate the original file name with " by " and the username
// $newAttendanceFileName = pathinfo($originalAttendanceFileName, PATHINFO_FILENAME) . '.' . $attendanceFileExtension .
' by ' . $userName;

// // Move the file to the 'uploads/attendance' directory with the new name
// $File1->move('public/uploads/attendancePdf', $newAttendanceFileName);
// $data['attandencePdf'] = $newAttendanceFileName; // Save the new file name in the database
// } else {
// $session->setFlashdata('error', 'Please upload a valid attendance PDF.');
// return redirect()->to('admin/dashboard'); // Redirect back to the form
// }




<!--   /*public function saveDetails()
    {
        $request = service('request');
        // Collect form data
        $data = [
            'progTitle' => $request->getPost('progTitle'),
            'targetGroup' => $request->getPost('targetGroup'),
            'date' => $request->getPost('date'),
            'progDirector' => $request->getPost('progDirector'),
            'dealingAsstt' => $request->getPost('dealingAsstt'),
            'progPdf' => $request->getPost('progPdf'),
            'attendancePdf' => $request->getPost('attendancePdf'),
            'materialLink' => $request->getPost('materialLink'),
            'paymentdone' => $request->getPost('paymentdone'),
        ];
        // print_r($data);
        // die;
        // Get the username from the session or request
        // $userName = session()->get('name'); // Assuming username is stored in the session
        // if (!$userName) {
        //     // Handle the case if the username is not available
        //     session()->setFlashdata('error', 'User not logged in');
        //     return redirect()->to('/dashboard');
        // }
        // Save data to the database using the model
        $programmeModel = new ProgramModel();
        try {
            // Attempt to save the details in the database
            $result = $programmeModel->saveDetail($data);
            session()->setFlashdata('success', 'Added details successfully!');
        } catch (\Exception $e) {
            // Handle exceptions
            session()->setFlashdata('error', $e->getMessage());
        }
        // Redirect to the dashboard after saving
        return redirect()->to('admin/dashboard');
    }*/
    /*public function saveDetails()
    {
        $session = session();  // Get the session object
        $userName = $session->get('name');  // Assuming 'name' is stored in the session during login

        // If no user is logged in, set an error message and redirect
        if (!$userName) {
            $session->setFlashdata('error', 'User is not logged in.');
            return redirect()->to('admin/dashboard');  // Redirect to the login page or any other page
        }

        // Get data from the request
        $data = [
            'progTitle' => $this->request->getPost('progTitle'),
            'targetGroup' => $this->request->getPost('targetGroup'),
            'date' => $this->request->getPost('date'),  // This should be in 'DD/MM/YYYY' format
            'progDirector' => $this->request->getPost('progDirector'),
            'dealingAsstt' => $this->request->getPost('dealingAsstt'),
            'progPdf' => $this->request->getPost('progPdf'),
            // 'attendancePdf' => $this->request->getPost('attendancePdf'),
            'materialLink' => $this->request->getPost('materialLink'),
            'paymentdone' => $this->request->getPost('paymentdone'),
            'attendancePdf' => 'xyz.pdf'
        ];

        // print_r($data);
        // die;
        // Validate the required fields
        if (empty($data['progTitle']) || empty($data['targetGroup']) || empty($data['date']) || empty($data['progDirector']) || empty($data['dealingAsstt'])) {
            $session->setFlashdata('error', 'Please fill all required fields.');
            return redirect()->to('admin/dashboard');  // Redirect back to the form page
        }
        // Handle file uploads for progPdf (program schedule)
        $file = $this->request->getFile('progPdf');
        //  print_r($file);
        // print_r(value: 'sameer');
        // die;
        if ($file && $file->isValid()) {
            $originalFileName = $file->getName();
            $fileExtension = $file->getExtension();

            // Concatenate the original file name with " by " and the username
            $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '.' . $fileExtension . ' by ' . $userName;

            // Move the file to the 'uploads/programsPdf' directory with the new name
            $file->move('public/uploads/programsPdf', $newFileName);
            $data['progPdf'] = $newFileName;  // Save the new file name in the database

        } else {
            $session->setFlashdata('error', 'Please upload a valid programme schedule PDF.');
            return redirect()->to('admin/dashboard');  // Redirect back to the form
        }

        // Handle attendance PDF upload
        // $File1 = $this->request->getFile('attandencePdf');


        // if ($File1 && $File1->isValid()) {
        //     $originalAttendanceFileName = $File1->getName();
        //     $attendanceFileExtension = $File1->getExtension();

        //     // Concatenate the original file name with " by " and the username
        //     $newAttendanceFileName = pathinfo($originalAttendanceFileName, PATHINFO_FILENAME) . '.' . $attendanceFileExtension . ' by ' . $userName;

        //     // Move the file to the 'uploads/attendance' directory with the new name
        //     $File1->move('public/uploads/attendancePdf', $newAttendanceFileName);
        //     $data['attandencePdf'] = $newAttendanceFileName;  // Save the new file name in the database
        // } else {
        //     $session->setFlashdata('error', 'Please upload a valid attendance PDF.');
        //     return redirect()->to('admin/dashboard');  // Redirect back to the form
        // }

        // Save data into the database
        $programModel = new ProgramModel();
        $programModel->save($data);

        // Set a success message and redirect to another page
        $session->setFlashdata('success', 'Details added successfully.');
        return redirect()->to('admin/dashboard');  // Redirect to the dashboard or another page
    }*/ -->