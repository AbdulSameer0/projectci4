<?php
namespace App\Controllers;
class TempFile extends BaseController
{
    /* -------------------------------------------this is running code ---------------------------------------------------------------------
    public function saveDetails()
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
                 'attendancePdf' => $this->request->getPost('attendancePdf'),
                 'materialLink' => $this->request->getPost('materialLink'),
                 'paymentdone' => $this->request->getPost('paymentdone'),
                 // 'attendancePdf' => 'xyz.pdf'
             ];

             // Validate the required fields
             if (empty($data['progTitle']) || empty($data['targetGroup']) || empty($data['date']) || empty($data['progDirector']) || empty($data['dealingAsstt'])) {
                 $session->setFlashdata('error', 'Please fill all required fields.');
                 return redirect()->to('admin/dashboard');  // Redirect back to the form page
             }

             // Check if both files (progPdf and attendancePdf) are uploaded and valid
             $progFile = $this->request->getFile('progPdf');                     // for programs pdf 
             $attendanceFile = $this->request->getFile('attendancePdf');         // for attendace pdf

             // If both files are valid, handle the uploads
             if (($progFile && $progFile->isValid()) && ($attendanceFile && $attendanceFile->isValid())) {

                 // Handle program PDF upload
                 $originalProgFileName = $progFile->getName();
                 $progFileExtension = $progFile->getExtension();
                 $newProgFileName = pathinfo($originalProgFileName, PATHINFO_FILENAME) . '.' . $progFileExtension . ' by ' . $userName;
                 $progFile->move('public/uploads/programsPdf', $newProgFileName);
                 $data['progPdf'] = $newProgFileName;  // Save the new file name in the database

                 // Handle attendance PDF upload
                 $originalAttendanceFileName = $attendanceFile->getName();
                 $attendanceFileExtension = $attendanceFile->getExtension();
                 $newAttendanceFileName = pathinfo($originalAttendanceFileName, PATHINFO_FILENAME) . '.' . $attendanceFileExtension . ' by ' . $userName;
                 $attendanceFile->move('public/uploads/attendancePdf', $newAttendanceFileName);
                 $data['attendancePdf'] = $newAttendanceFileName;  // Save the new file name in the database

             } else {
                 // If one or both files are invalid, set an error message
                 $session->setFlashdata('error', 'Please upload valid program and attendance PDFs.');
                 return redirect()->to('admin/dashboard');  // Redirect back to the form
             }

             // Save data into the database
             $programModel = new ProgramModel();
             $programModel->save($data);

             // Set a success message and redirect to another page
             $session->setFlashdata('success', 'Details added successfully.');
             return redirect()->to('admin/dashboard');  // Redirect to the dashboard or another page
         }*/
}