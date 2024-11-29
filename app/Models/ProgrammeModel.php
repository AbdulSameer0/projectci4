<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model
{
    // Specify the table name in the database
    protected $table = 'programme_info';  // Table name
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
        // Insert data into the table
        // print_r(($data));
        // die;
        // $result = $this->db->insert('Customer_Orders', $data);
        if ($this->insert($data)) {
            return true;  // Data saved successfully
        } else {
            return false; // Error in saving data
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

