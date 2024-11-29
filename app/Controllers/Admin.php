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
        // echo "j";
        // die;
        // echo $this->request->getPost('progTitle');
        // $progTitle = $this->request->getPost('progTitle');
        // echo $progTitle;
        // die;
        // Upload files (if any)
        // echo "hello";
        // die;
        $data = array(
            'progTitle' => $this->request->getPost('progTitle'),
            'targetGroup' => $this->request->getPost('targetGroup'),
            'date' => $this->request->getPost('date'),
            'progDirector' => $this->request->getPost('progDirector'),
            'dealingAsstt' => $this->request->getPost('dealingAsstt'),
            'progPdf' => "pdf",
            'attandancePdf' => "pdf",
            'materialLink' => $this->request->getPost('materialLink'),
            'paymentdone' => $this->request->getPost('paymentdone'),


        );
        // print_r($data);
        // die;
        // File Upload for PDF
        // $config['upload_path'] = './uploads/';
        // $config['allowed_types'] = 'pdf';
        // $config['max_size'] = 10240;  // Max 10MB
        // // Initialize upload library
        // $this->load->library('upload', $config);

        // $fileFields = ['progPdf', 'attandancePdf', 'paymentPdf'];
        // foreach ($fileFields as $field) {
        //     if ($_FILES[$field]['name']) {
        //         if (!$this->upload->do_upload($field)) {
        //             $this->session->set_flashdata('error', $this->upload->display_errors());
        //             redirect('admin/saveDetails');
        //         } else {
        //             $fileData = $this->upload->data();
        //             $data[$field] = $fileData['file_name'];
        //         }
        //     }
        // }
        // // Save data to the database using the model
        // $programmeModel = new ProgrammeModel();
        // $programmeModel = new ProgrammeModel();
        $result = $this->programmeModel->saveDetail($data);
        echo json_encode($result);


        // $result = $model->saveDetail($data);
        print_r($result);
        die;

    }
    // admin logout function 
    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy session
        return redirect()->to(site_url('/')); // Redirect to login page
    }
}
