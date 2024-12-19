<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <td class="text-center text-capitalize text-wrap">
        <?php
        $session = session();  // Get the session object
        $userName = $session->get('name');
        ?>
        <a style="word-wrap: break-word; white-space: normal;" class="badge badge-pill badge-success text-white"
            href="<?= base_url("public/uploads/programsPdf/" . $key['progPdf']); ?>" target="_blank">
            <?= pathinfo($key['progPdf'], PATHINFO_FILENAME) . ' by ' . $userName . '.' . pathinfo($key['progPdf'], PATHINFO_EXTENSION); ?>
        </a>
    </td>

    <!-- Attendance PDF Link with Username -->
    <td class="text-center text-capitalize text-wrap">
        <a style="word-wrap: break-word; white-space: normal;" class="badge badge-pill badge-success text-white"
            href="<?= base_url("public/uploads/attendancePdf/" . $key['attendancePdf']); ?>" target="_blank">
            <?= basename($key['attendancePdf']); ?></a>
    </td>
    <!-- 
  
    <td class="text-center text-capitalize text-wrap">
                                                            <?//php
                                                            //$session = session();  // Get the session object
                                                            //$userName = $session->get('name');
                                                            // print_r($userName);
                                                            // die;
                                                            ?> -->
    <?php if (!empty($key['progPdf'])): ?>
        <button type="button" class="btn btn-outline-primary" style="padding:
                                                                    8px 16px; font-size: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0,
                                                                    0.1);"
            onclick="window.open('<?= base_url('public/uploads/programsPdf/' . $key['progPdf']); ?>', '_blank');"
            title="Click to view the PDF">
            View PDF <i class="fa fa-eye"></i>
        </button>
        <br>
        <?php
        // Extract the username from the file name
        $fileName = $key['progPdf'];
        $fileParts = explode(' by ', $fileName); // Split the filename at ' by '
        $uploadedBy = isset($fileParts[1]) ? $fileParts[1] : 'Unknown'; // Extract username or set as 'Unknown'
        // print_r($uploadedBy);
        // die;
        ?>
        <span class="text-info">
            <?= 'uploaded by ' . $uploadedBy; ?>
        </span>
    <?php else: ?>
        <span class="text-danger font-italic">No PDF Available</span>
        <br>
    <?php endif; ?>
    </td>
    <!-- attendance pdf -->
    <td class="text-center text-capitalize text-wrap">
        <?php if (!empty($key['attendancePdf'])): ?>
            <button type="button" class="btn btn-outline-primary"
                style="padding: 8px 16px; font-size: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                onclick="window.open('<?= base_url('public/uploads/attendancePdf/' . $key['attendancePdf']); ?>', '_blank');"
                title="Click to view the PDF">
                View PDF <i class="fa fa-eye"></i>
            </button>
            <br>
            <?php
            // Extract the username from the file name
            $fileName = $key['attendancePdf'];
            $fileParts = explode(' by ', $fileName); // Split the filename at ' by '
            $uploadedBy = isset($fileParts[1]) ? $fileParts[1] : 'Unknown'; // Extract username or set as 'Unknown'
            ?>
            <span class="text-info">
                <?= 'uploaded by ' . $uploadedBy; ?>
            </span>
        <?php else: ?>
            <span class="text-danger font-italic">No PDF Available</span>
            <br>
        <?php endif; ?>
    </td>

</body>
<script>
    <?php
    /*public function saveDetails() {

            // print_r('hello');
            // die;
            $session = session();  // Get the session object
            $userName = $session -> get('name');  // Assuming 'name' is stored in the session during login

            // If no user is logged in, set an error message and redirect
            if (!$userName) {
                $session -> setFlashdata('error', 'User is not logged in.');
                return redirect() -> to('admin/dashboard');  // Redirect to the login page or any other page
            }

            // Get data from the request
            $data = [
                'progTitle' => $this -> request -> getPost('progTitle'),
                'targetGroup' => $this -> request -> getPost('targetGroup'),
                'date' => $this -> request -> getPost('date'),  // This should be in 'DD/MM/YYYY' format
                'progDirector' => $this -> request -> getPost('progDirector'),
                'dealingAsstt' => $this -> request -> getPost('dealingAsstt'),
                'progPdf' => $this -> request -> getPost('progPdf'),
                'attendancePdf' => $this -> request -> getPost('attendancePdf'),
                'materialLink' => $this -> request -> getPost('materialLink'),
                'paymentdone' => $this -> request -> getPost('paymentdone'),
            ];

            // Validate the required fields
            if (empty($data['progTitle']) || empty($data['targetGroup']) || empty($data['date']) || empty($data['progDirector']) || empty($data['dealingAsstt'])) {
                $session -> setFlashdata('error', 'Please fill all required fields.');
                return redirect() -> to('admin/dashboard');  // Redirect back to the form page
            }

            // Check if both files (progPdf and attendancePdf) are uploaded and valid
            $progFile = $this -> request -> getFile('progPdf');                     // for program PDF 
            $attendanceFile = $this -> request -> getFile('attendancePdf');         // for attendance PDF

            // If both files are valid, handle the uploads
            if (($progFile && $progFile -> isValid()) && ($attendanceFile && $attendanceFile -> isValid())) {

                // Handle program PDF upload
                $originalProgFileName = $progFile -> getName();
                $progFileExtension = $progFile -> getExtension();
                // Save the file with the original name (no username added)
                $progFile -> move('public/uploads/programsPdf', $originalProgFileName);
                $data['progPdf'] = $originalProgFileName;  // Save the file name (no changes) in the database

                // Handle attendance PDF upload
                $originalAttendanceFileName = $attendanceFile -> getName();
                $attendanceFileExtension = $attendanceFile -> getExtension();
                // Save the file with the original name (no username added)
                
                $attendanceFile -> move('public/uploads/attendancePdf', $originalAttendanceFileName);
                $data['attendancePdf'] = $originalAttendanceFileName;  // Save the file name (no changes) in the database

            } else {
                // If one or both files are invalid, set an error message
                $session -> setFlashdata('error', 'Please upload valid program and attendance PDFs.');
                return redirect() -> to('admin/dashboard');  // Redirect back to the form
            }

            // Save data into the database
            $programModel = new ProgramModel();
            $programModel -> save($data);

            // Set a success message and redirect to another page
            $session -> setFlashdata('success', 'Details added successfully.');
            return redirect() -> to('admin/dashboard');  // Redirect to the dashboard or another page
        }
        ?>
    </script>
    </html>