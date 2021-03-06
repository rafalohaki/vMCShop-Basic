<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 * Created with ♥ by Verlikylos on 08.11.2017 20:43.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop Basic 2017
*/

class PaypalPaymentsModel extends CI_Model {

    private $table = "vmcs_paypalpayments";

    public function getAll() {
        return $this->db->order_by('id')->get($this->table)->result_array();
    }
    
    public function getBy($column, $data, $oneInArray = false) {
        $result = $this->db->where($column, $data)->get($this->table)->result_array();
        if ($result == null) {
            return null;
        } else if (count($result) > 1) {
            return $result;
        } else {
            if ($oneInArray) return $result;
            return $result[0];
        }
    }
    
    
    public function add($data) {
        return $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
    
}