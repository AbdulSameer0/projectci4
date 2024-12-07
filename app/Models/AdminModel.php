<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin_info';  // Your table name
    protected $primaryKey = 'id';     // Primary key of your table
    protected $allowedFields = ['name', 'email', 'password'];


    // Method to check if the email is already taken
    public function isEmailTaken($email)
    {
        return $this->where('email', $email)->first() !== null;
    }
    // Method to check if the username is already taken
    public function isUsernameTaken($name)
    {
        return $this->where('name', $name)->first() !== null;
    }
    function getProgramInfoData()
    {
        $query = "select * from programme_info";
        $result = $this->db->query($query);
        if ($result) {
            return $result->getResultArray();
        }

    }


}
