<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model{
        public function totalarsip(){
                return $this->db->table('tbl_arsip')->countAll();
        }

        public function totalkategori(){
                return $this->db->table('tbl_kategori')->countAll();
        }

        public function totaldep(){
                return $this->db->table('tbl_departemen')->countAll();
        }

        public function totaluser(){
                return $this->db->table('tbl_user')->countAll();
        }
}