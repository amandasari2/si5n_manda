<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model{
        public function tampil(){
                return $this->db->table('tbl_user')
                ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_user.id_departemen', 'left')
                ->orderBy('id_user', 'desc')->get()->getResultArray();
        }

        public function simpan($data){
                return $this->db->table('tbl_user')->insert($data);
        }

        public function edit ($data){
                return $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
        }

        public function detail($id_user){
                return $this->db->table('tbl_user')
                ->join('tbl_departemen','tbl_departemen.id_departemen = tbl_user.id_departemen','left')
                ->where('id_user',$id_user)
                ->get()
                ->getRowArray();
        }

        public function hapus ($data){
                return $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
        }
}