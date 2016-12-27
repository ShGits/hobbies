<?php
class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function create_user ($username, $password, $email, $full_name, $activation_code, $created_date)
    {
        $data = array(
            'username' => $username,
            'password' => sha1($password),
            'email' => $email,
            'full_name' => $full_name,
            'activation_code' => $activation_code,
            'created_at' =>  $created_date
        );
        $this->db->insert('users', $data);
    }
    function check_username($username,$dbtable)
    {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        return $this->db->get($dbtable);
    }
    function check_email($email,$dbtable)
    {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        return $this->db->get($dbtable);
    }
    function confirm_registration($activation_code)
        /* ìåòîä confirm_registration â êëàññå ìîäåëè «User» */
    {
        $query="SELECT activation_code  FROM users WHERE activation_code = ?";
        $result=$this->db->query($query, $activation_code);
        if ($result->num_rows()==1) {
            $query="UPDATE  users  SET activated = 1 WHERE activation_code = ?";
            $result=$this->db->query($query, $activation_code);
            return true;
        }
        else {
            return false;
        }
    }
    function forgot_password($email, $password)
        /* ìåòîä forgot_password â ìîäåëè  «User» */
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        return $this->db->update('users');
    }
    function get_user_email($email) {
        $query="SELECT email  FROM users WHERE  email = ?";
        $result=$this->db->query($query, $email);
        if ($result->num_rows()> 0) {
            return $result->first_row('array');
        }
        else {
            echo "This email not found";
        }
    }
/*
    public function get_css() {
        $pattern['style_css'] = array('style1.css','style2.css');
        $this->load->view('header', $pattern);
    }
*/
}