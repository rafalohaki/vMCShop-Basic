<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 * Created with ♥ by Verlikylos on 16.09.2017 18:49.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop Basic 2017
*/

class ServersModel extends CI_Model {

    private $table = "vmcs_servers";

    public function getAll() {
        return $this->db->order_by('id')->get($this->table)->result_array();
    }

    public function getBy($column, $data) {
        $result = $this->db->where($column, $data)->get($this->table)->result_array();
        if ($result == null) {
            return null;
        } else if (count($result) > 1) {
            return $result;
        } else {
            return $result[0];
        }
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
    
}