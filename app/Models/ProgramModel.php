<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
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
        'attendancePdf',
        'materialLink',
        'paymentdone'
    ];
    protected $useTimestamps = true;

    // Method to save the details
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
    // Method to delete the details 
    public function deleteDetails($prog_id)
    {
        // Check if the record exists
        $program = $this->find($prog_id);

        if ($program) {
            // If the record exists, delete it
            return $this->delete($prog_id);
        }

        // Return false if the record does not exist
        return false;
    }
    // Method to get user details 
    public function get_user_details($prog_id)
    {
        // print_r($prog_id);die;
        $query = "select prog_id, progTitle,targetGroup,date,progDirector,dealingAsstt,materialLink,paymentdone from programme_info where prog_id = '$prog_id'";
        // print_r($query);
        // die;
        $result = $this->db->query($query);
        // print_r($result);die;
        if ($result) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }

    // Method to update form details 
    public function updateDetailsModel($data, $id)
    {
        // print_r('$aaaaaaaaaaaaaaaaaaa');
        // // print_r($data);
        // print_r($id);
        // die;

        $query = $this->db->table('projectci4.programme_info');
        $query->where('prog_id', $id);
        $query->update($data);

        // $query->insert($data);
        // print_r($query);
        // die;
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getuserProgramRecord($prog_id)
    {
        // print_r($prog_id);die;
        $query = "select prog_id, progTitle,progPdf from programme_info where prog_id = '$prog_id'";
        // print_r($query);
        // die;
        $result = $this->db->query($query);
        // print_r($result);die;
        if ($result) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }
    // update both program and attendance pdfs 
    public function updatePdfRecord($data, $id)
    {
        // print_r($data);
        // die;
        $demo = $data['progPdf'];

        // print_r($data);
        // print_r($id);
        // die;
        //  $query = "update projectci4.programme_info set `progTitle` = 'Sameer', `progPdf` = 'jpb to myr.pdf' WHERE prog_id = '$id'";

        $query = "UPDATE projectci4.programme_info  SET progPdf  = $demo WHERE prog_id = $id";
        // print_r($query);
        // die;
        $query = $this->db->table('projectci4.programme_info');
        $query->where('prog_id', $id);
        $query->update($data);
        // print_r($query);
        // die;

        // $query->insert($userdata);

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

