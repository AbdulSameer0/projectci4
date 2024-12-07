<?php
namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProgrammeModel;
class TempFile extends BaseController
{
    /* this is correct code user after all testing*/
    /* running code-1
    public function saveDetails()
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
            'attandancePdf' => $request->getPost('attandancePdf'),
            'materialLink' => $request->getPost('materialLink'),
            'paymentdone' => $request->getPost('paymentdone'),
        ];
        // print_r($data);
        // die;

        // Get the username from the session or request
        $userName = session()->get('name'); // Assuming username is stored in the session
        if (!$userName) {
            // Handle the case if the username is not available
            session()->setFlashdata('error', 'User not logged in');
            return redirect()->to('/dashboard');
        }

        // File Upload Configuration
        $fileFields = ['progPdf', 'attandancePdf'];
        $uploadPathProgramsPdf = WRITEPATH . 'uploads/programs_pdf/';
        $uploadPathAttendance = WRITEPATH . 'uploads/attendance_pdf/';
        helper(['form', 'filesystem']);

        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $originalFileName = $file->getClientName();  // Get the original file name
                $fileExtension = $file->getExtension();  // Get the file extension

                // Create the new file name by appending the logged-in user's name (i.e., 'by john')
                // We use pathinfo to get the original file name without the extension
                $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . ' by ' . $userName . '.' . $fileExtension;

                // Determine the correct path based on the field and move the file
                if ($field == 'progPdf') {
                    // Move the program PDF file to the specified directory and save the relative path
                    $file->move($uploadPathProgramsPdf, $newFileName);
                    $data[$field] = 'uploads/programs_pdf/' . $newFileName; // Save relative file path
                } elseif ($field == 'attandancePdf') {
                    // Move the attendance PDF file to the specified directory and save the relative path
                    $file->move($uploadPathAttendance, $newFileName);
                    $data[$field] = 'uploads/attendance_pdf/' . $newFileName; // Save relative file path
                }
            }
        }
        // print_r($file);
        // print_r("htt");
        // die;

        // Save data to the database using the model
        $programmeModel = new ProgrammeModel();
        try {
            // Attempt to save the details in the database
            $result = $programmeModel->saveDetail($data);
            session()->setFlashdata('success', 'Details Added successfully!');
        } catch (\Exception $e) {
            // Handle exceptions
            session()->setFlashdata('error', $e->getMessage());
        }

        // Redirect to the dashboard after saving
        return redirect()->to('admin/dashboard');
    }*/
    /* running code-2
    public function saveDetails()
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
            'attandancePdf' => $request->getPost('attandancePdf'),
            'materialLink' => $request->getPost('materialLink'),
            'paymentdone' => $request->getPost('paymentdone'),
        ];

        // Get the username from the session or request
        $userName = session()->get('name');
        if (!$userName) {
            session()->setFlashdata('error', 'User not logged in');
            return redirect()->to('/dashboard');
        }
        // File Upload Configuration
        $fileFields = ['progPdf', 'attandancePdf'];
        $uploadPathProgramsPdf = ROOTPATH . '/uploads/programs_pdf/';
        $uploadPathAttendance = ROOTPATH . '/uploads/attendance_pdf/';
        // print_r($uploadPathAttendance);
        // die;
        helper(['form', 'filesystem']);
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $originalFileName = $file->getClientName();  // Get the original file name
                $fileExtension = $file->getExtension();  // Get the file extension

                // Create the new file name by appending the logged-in user's name (i.e., 'by john')
                $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . ' by ' . $userName . '.' . $fileExtension;

                // Check the field and determine the appropriate upload path
                if ($field == 'progPdf') {
                    // Make sure the directory exists, if not, create it
                    if (!is_dir($uploadPathProgramsPdf)) {
                        mkdir($uploadPathProgramsPdf, 0755, true);
                    }

                    // Move the file to the correct directory and save the relative path
                    $file->move($uploadPathProgramsPdf, $newFileName);
                    $data[$field] = '/uploads/programs_pdf/' . $newFileName; // Save the relative path
                } elseif ($field == 'attandancePdf') {
                    // Make sure the directory exists, if not, create it
                    if (!is_dir($uploadPathAttendance)) {
                        mkdir($uploadPathAttendance, 0755, true);
                    }

                    // Move the file to the correct directory and save the relative path
                    $file->move($uploadPathAttendance, $newFileName);
                    $data[$field] = '/uploads/attendance_pdf/' . $newFileName; // Save the relative path
                }
            }
        }
        // Save data to the database using the model
        $programmeModel = new ProgrammeModel();
        try {
            // Attempt to save the details in the database
            $result = $programmeModel->saveDetail($data);
            session()->setFlashdata('success', 'Details Added successfully!');
        } catch (\Exception $e) {
            // Handle exceptions
            session()->setFlashdata('error', $e->getMessage());
        }

        // Redirect to the dashboard after saving
        return redirect()->to('admin/dashboard');
    }*/

}
