<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webmodel extends CI_Model {


      public function loginmodel($email,$password){

              $this->db->where('email_staff', $email);
              $this->db->where('password', $password);

              $q = $this->db->get('pengguna');
              return $q->result();
      }
}



?>
