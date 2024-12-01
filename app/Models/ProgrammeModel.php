<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model
{
    // Specify the table name in the database
    protected $table = 'programme_info';            // Table name
    protected $primaryKey = 'prog_id';              // Primary key of the table

    // Specify the fields you want to insert
    protected $allowedFields = [
        'progTitle',
        'targetGroup',
        'date',
        'progDirector',
        'dealingAsstt',
        'progPdf',
        'attandancePdf',
        'materialLink',
        'paymentdone'
    ];
    protected $useTimestamps = true;

    // Method to save the data
    public function saveDetail($data)
    {
        // print_r('hello');
        // die;
        try {
            // Insert data into the table
            if ($this->insert($data)) {
                return [
                    'status' => true,
                    'message' => 'Data saved successfully',
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Failed to save data',
                    'errors' => $this->errors() // Capture validation or database errors
                ];
            }
        } catch (\Exception $e) {
            // Catch and return any exception that occurs during the operation
            return [
                'status' => false,
                'message' => 'An error occurred while saving data',
                'error_detail' => $e->getMessage(),
            ];
        }
    }

    public function lockPdfById($prog_id)
    {
        return $this->db->table('programme_info')
            ->where('id', $prog_id)
            ->update(['is_locked' => 1]);
    }
    // public function update_user_details($id)
    // {

    // public function deleteDetails()
    // {
    //     // Get the prog_id from the POST data
    //     $prog_id = $this->request->getPost('prog_id');

    //     if ($prog_id) {
    //         // Load your model
    //         $model = new ProgrammeModel();

    //         // Perform the delete operation
    //         $result = $model->delete($prog_id); // Adjust this based on your model's delete method

    //         if ($result) {
    //             // Respond with success
    //             return $this->response->setJSON(['success' => true]);
    //         } else {
    //             // Respond with failure
    //             return $this->response->setJSON(['success' => false]);
    //         }
    //     } else {
    //         return $this->response->setJSON(['success' => false]);
    //     }
    // }
    //     $query = "select * from programme_info where prog_id='$id' ";

    //     $result = $this->db->query($query);
    //     if ($result) {
    //         return $result->getResultArray();
    //     }
    //     // return $this->db->table('programme_info')
    //     //     ->where('prog_id', $prog_id)
    //     //     ->update($data);
    // }
}

