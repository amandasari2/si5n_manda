<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model {
        public function login($username, $password){
                return $this->db->table('tbl_user')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }
}