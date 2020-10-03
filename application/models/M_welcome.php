<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
     Author: Mukesh Jakhar
     Description: Manage users model class
 */
 class M_welcome extends CI_Model{
     function __construct(){
         $this->load->database();
         parent::__construct();
     }
     public function total_rows($search)
     {
        if($search != ''){
          $this->db->like('user_name', $search);
          $this->db->or_like('user_email', $search);
        }
        $s = $this->db->select("COUNT(*) as num")->get("users");
        $r = $s->row();
        if(isset($r->num)) return $r->num;
        return 0;
     }
     public function get_users($rowno,$rowperpage,$search)
     {
        if($search != ''){
          $this->db->like('user_name', $search);
          $this->db->or_like('user_email', $search);
        }

       return $this->db->limit($rowperpage, $rowno)->get("users");
     }
 }