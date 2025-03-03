<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {

    public function get_locations()
    {
        $query=$this->db->get("locations");
        return  $query->result_array();
    }

    public function store_data($post_data){
        $this->db->insert("registrations",$post_data);
    }

    public function check_login($email){
        $query=$this->db->where("email",$email)->get('registrations');
        return $query->num_rows() == 0;
    }

    public function password_match($email,$password){
        $result=$this->db->where("email",$email)->get('registrations')->row_array();
        return $result;
    }

    public function profile_upload($email,$full_file_path){
        $data=array(
            'profile_photo'=>$full_file_path,
        );
        $this->db->where('email',$email)->update("registrations",$data);
    }
}?>