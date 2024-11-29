<?php
namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProgrammeModel;
class Admin extends BaseController
{


    protected $programmeModel;

    public function __construct()
    {
        $this->programmeModel = new ProgrammeModel();
    }
    // public function __construct()
    // {
    //     // parent::__construct();
    //     $this->saveDetails(); // Call the new saveDetails method from the constructor
    //     // Load the model
    //     // $this->load->model('ProgrammeModel');
    //     // Load form validation
    //     $this->load->library('form_validation');
    //     $this->session = \Config\Services::session();
    //     $this->session->start();

    // }
    public function index()
    {
        return view('admin/login');

    }

    // admin login function
    public function login()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $model = new AdminModel();
        $admin = $model->where('email', $email)->first();

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
    // admin dashboard function 
    public function dashboard()
    {
        $test = '';
        // echo "hh";
        $this->$test = new AdminModel();

        $data['prog_data'] = $this->$test->getProgramInfoData();

        return view('admin/dashboard', $data);
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
            'progPdf' => '',
            'attandancePdf' => '',
            'materialLink' => $request->getPost('materialLink'),
            'paymentdone' => $request->getPost('paymentdone'),
        ];

        // print_r($data);
        // die;

        // File Upload Configuration
        $fileFields = ['progPdf', 'attandancePdf'];
        $uploadPath = WRITEPATH . 'uploads/';
        helper(['form', 'filesystem']);

        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);
                $data[$field] = $newName; // Save file name in data array
            }
        }

        // print_r($data);
        //     die;

        // Save data to the database using the model
        $programmeModel = new \App\Models\ProgrammeModel();

        try {
            $result = $programmeModel->saveDetail($data);
            // print_r($data);
            // die;
            echo json_encode(['status' => 'success', 'message' => 'Details saved successfully!', 'data' => $result]);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function deleteDetails()
    {
        $request = service('request');
        $prog_id = $request->getPost('prog_id'); // Ensure the ID is passed correctly

        $programmeModel = new \App\Models\ProgrammeModel();

        try {
            $result = $programmeModel->deleteDetail($prog_id);

            if ($result['status']) {
                echo json_encode(['status' => 'success', 'message' => $result['message']]);
            } else {
                echo json_encode(['status' => 'error', 'message' => $result['message']]);
            }
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'An error occurred while deleting the record.',
                'error_detail' => $e->getMessage(),
            ]);
        }
    }




    // Admin logout function
    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy session
        return redirect()->to(site_url('/')); // Redirect to login page
    }
}
