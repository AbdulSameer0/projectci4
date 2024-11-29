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

    public function deleteDetail($prog_id)
    {
        try {
            // Ensure $prog_id is valid
            if (empty($prog_id)) {
                return [
                    'status' => false,
                    'message' => 'Invalid program ID provided.',
                ];
            }

            // Check if the record exists
            $record = $this->find($prog_id);

            if (!$record) {
                return [
                    'status' => false,
                    'message' => 'Record not found.',
                ];
            }

            // Delete the record with a WHERE condition
            if ($this->where('prog_id', $prog_id)->delete()) {
                return [
                    'status' => true,
                    'message' => 'Record deleted successfully.',
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Failed to delete the record.',
                    'errors' => $this->errors(),
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'An error occurred while deleting the record.',
                'error_detail' => $e->getMessage(),
            ];
        }
    }




    // public function update_user_details($id)
    // {
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

