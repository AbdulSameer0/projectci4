<?php
namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProgramModel;
class Admin extends BaseController
{
    protected $programModel;
    // controller construct
    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }
    // login view page 
    public function index()
    {
        return view('admin/login');
    }
    // registeration view page 
    public function register_view()
    {
        return view('admin/register');
    }
    //registration details store function 
    public function registerSubmit()
    {

        // Get the form data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validate the input data
        if (
            !$this->validate([
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]'
            ])
        ) {
            return redirect()->to('admin/register_view')->withInput()->with('error', $this->validator->getErrors());
        }

        // Create a new UserModel instance
        $adminModel = new AdminModel();

        // Check if the email or username is already taken
        if ($adminModel->isEmailTaken($email)) {
            return redirect()->to('admin/register_view')->withInput()->with('error', '<i class="fa fa-warning"></i> Email is already taken.');
        }

        if ($adminModel->isUsernameTaken($name)) {
            return redirect()->to('admin/register_view')->withInput()->with('error', '<i class="fa fa-warning"></i> Username is already taken.');
        }

        // Insert the user into the database
        $adminModel->save([
            'name' => $name,
            'email' => $email,
            'password' => $password // No password hashing in this example
        ]);

        // Redirect to the login page after successful registration
        return redirect()->to('/')->with('success', 'Registration successful. Please login.');
    }
    // admin login function
    public function login()
    {
        $session = session();
        $email = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $model = new AdminModel();
        $admin = $model->where('name', $email)->first();

        if ($admin && $admin['password'] === $password) {
            // Store user info in session (you may want to store more than just 'name')
            $session->set('logged_in', true);
            $session->set('name', $admin['name']);  // Store the logged-in user's name
            //  echo"hello";die;
            return redirect()->to('admin/dashboard');
        } else {
            $session->setFlashdata('error', '<i class="fa fa-warning"></i> Invalid username or password.');
            return redirect()->to('/');
        }
    }

    public function dashboard()
    {
        helper(['form', 'filesystem']);
        $model = new ProgramModel();
        $programmeInfo = $model->orderBy('created_at', 'DESC')->findAll(); // Fetch all rooms records

        // Format the created_at date to dd/mm/yyyy
        foreach ($programmeInfo as &$programme) {
            // Check if the date is empty or null
            if (empty($programme['date'])) {
                $programme['date'] = '00/00/0000'; // Default date if not set
            } else {
                $programme['date'] = date('d/m/Y', strtotime($programme['date'])); // Format date if available
            }
        }

        $data['prog_data'] = $programmeInfo;
        return view('admin/dashboard', $data); // Pass formatted data to the view
    }
    // save details function
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
        $userName = session()->get('name'); // Assuming username is stored in the session
        if (!$userName) {
            // Handle the case if the username is not available
            session()->setFlashdata('error', 'User not logged in');
            return redirect()->to('/dashboard');
        }

        // File Upload Configuration
        $fileFields = ['progPdf', 'attandancePdf'];
        $uploadPathProgramsPdf = ROOTPATH . 'uploads/programs_pdf/';
        $uploadPathAttendance = ROOTPATH . 'uploads/attendance_pdf/';
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
        // Save data to the database using the model
        $programModel = new ProgramModel();
        try {
            // Attempt to save the details in the database
            $result = $programModel->saveDetail($data);
            session()->setFlashdata('success', 'Details Added successfully!');
        } catch (\Exception $e) {
            // Handle exceptions
            session()->setFlashdata('error', $e->getMessage());
        }

        // Redirect to the dashboard after saving
        return redirect()->to('admin/dashboard');
    }


    // delete details function
    public function delete($prog_id = null)
    {
        // Check if the prog_id is valid
        if ($prog_id === null) {
            // Redirect with an error message if prog_id is not provided
            session()->setFlashdata('error', 'No program ID provided.');
            return redirect()->to(base_url('admin/dashboard'));
        }

        // Initialize the model
        $model = new ProgramModel();

        // Attempt to delete the record via the model
        if ($model->deleteDetails($prog_id)) {
            // Set success message
            session()->setFlashdata('success', 'Details deleted successfully.');
        } else {
            // Set error message
            session()->setFlashdata('error', 'Error deleting program. It may not exist.');
        }

        // Redirect back to the dashboard
        return redirect()->to(base_url('admin/dashboard'));
    }

    public function getRecord()
    {
        // print_r("hh");
        // die;
        $id = $this->request->getGet('prog_id');
        // echo $id;
        // die;

        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Programme ID is missing hai bhai :( ']);
        } else {
            $result = $this->programModel->get_user_details($id);
            // print_r($result);
            // die;
            echo json_encode($result);
        }
    }

    public function updateDetails()
    {

        $request = service('request');
        $id = $this->request->getPost('progid');

        // print_r($id);
        // die;
        // Collect form data
        $data = [
            'progTitle' => $request->getPost('progTitle'),
            'targetGroup' => $request->getPost('targetGroup'),
            'date' => $request->getPost('date'),
            'progDirector' => $request->getPost('progDirector'),
            'dealingAsstt' => $request->getPost('dealingAsstt'),
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

        // print_r($data);
        // die;

        $programModel = new ProgramModel();
        try {
            // Attempt to save the details in the database
            $result = $programModel->updateDetailsModel($data, $id);
            session()->setFlashdata('success', 'Details Update successfully!');
        } catch (\Exception $e) {
            // Handle exceptions
            session()->setFlashdata('error', $e->getMessage());
        }

        // Redirect to the dashboard after saving
        return redirect()->to('admin/dashboard');
    }



    // Admin logout function
    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy session
        return redirect()->to(base_url('/')); // Redirect to login page
    }

}
