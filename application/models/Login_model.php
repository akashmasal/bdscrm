<?php

class Login_Model extends CI_Model{
    public function usercheck($username, $password)
    {
        $query = $this->db->select("*")
                          ->from("users")
                          ->where("username",$username)
                          ->where("password",$password)
                          ->get()
                          ->result_array();
        return $query;
    }
}
