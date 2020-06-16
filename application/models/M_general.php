<?php

class M_general extends CI_Model {

  public function getData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }
}