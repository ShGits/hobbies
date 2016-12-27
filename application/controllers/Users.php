<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }
    public function index()
    {
        $this->load->view('login');
/*
        $data['title'] = 'Reg User';
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
*/
    }

    public function register()
        /* Метод register() контроллера «Users» */
    {
        $this->form_validation->set_rules('fname', 'Full Name', 'trim|xss_clean|required|min_length[4]|max_length[25]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|callback_email_not_exists');
        $this->form_validation->set_rules( 'username','Username','trim|xss_clean|required|min_length[4]|max_length[25]|callback_username_not_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
        $this->form_validation->set_rules('conf_password',  'Confirm password',  'required|min_length[5]|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            $data['title']="Index ";
            $this->load->view('header',$data);
            $this->load->view('signup');
            $this->load->view('footer');
        } else {
            $full_name = $this->input->post('fname');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $activation_code = sha1(mt_rand(10000,99999).time().$email);
            $created_date=  date("Y-m-d H:i:s", time());
            $this->user->create_user($username, $password, $email,$full_name, $activation_code, $created_date);
            $userid = $this->db->insert_id();
            $this->session->set_userdata('userID', $userid);
            $this->email->from('Этот адрес электронной почты защищен от спам-ботов. У вас должен быть включен JavaScript для просмотра.','Admin');
            $this->email->to($email);
            $this->email->subject('Account activation');
            $this->email->message('Please, confirm your account. Just cut and paste this link in your browser   '. 'http://mysite.com/index.php/users/activate/'.$activation_code);
            $this->email->send();
            redirect(base_url().'index.php/users/index');
         }
    }
    public function activate()
        /* Метод activate() контроллера «Users» */
    {
        $registration_code = $this->uri->segment(3);
        if ($registration_code == '' )
        {
            echo "The registration_code missed in URL";
            exit();
        }

        $confirmed = $this->user->confirm_registration($registration_code);

        if ($confirmed)
        {
            echo "Account was acctivated, thank you";
            $email= $this->user->get_activation_email($registration_code);
            $this->email->from(' Этот адрес электронной почты защищен от спам-ботов. У вас должен быть включен JavaScript для просмотра. ','Admin');
            $this->email->to($email);
            $this->email->subject('Account just activated');
            $this->email->message('Your account was activated well');
            $this->email->send();
        } else {
            echo "Account was activated, thank you";
        }

    }
    public function login()
        /* Метод login() контроллера «Users» */
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = sha1($password);
        $query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
        if ($query->num_rows() == 1)
        {
            $userID = $query->row()->id;
            $username = $query->row()->username;
            $this->session->set_userdata('useID',$userID);
            $data['title']="User Profile";
            $data['user_name']= $username;
            $this->load->view('header',$data);
            $this->load->view('users_profile');
            $this->load->view('footer');
        } else {
            $data['error']='The username or password not correct. Please, try again';
            $data['title']="Index";
            $this->load->view('header',$data);
            $this->load->view('index');
            $this->load->view('footer');
        }

    }
    public function forgot_password ()
        /* Метод forgot_password() контролера «Users» */
    {
        $this->form_validation->set_rules('email', 'E-mail', 'trim|xss_clean|required|valid_email');
        if($this->form_validation->run() == FALSE)
        {
            $data['title']="Index ";
            $data['error']='This email is not valid. Please, try again';
            $this->load->view('header',$data);
            $this->load->view('forgot_password');
            $this->load->view('footer');
        } else {
            $email = $this->input->post('email');
            $user_email = $this->user->get_user_email($email);
            if ($user_email) {
                $this->email->from(' Этот адрес электронной почты защищен от спам-ботов. У вас должен быть включен JavaScript для просмотра. ', 'Admin');
                $this->email->to($user_email);
                $this->email->subject('Forgot password');
                $this->email->message('Please, click on the link to reset password', 'http://mysqite.com/ index.php/users/reset_password/');
                $this->email->send();
                return true;
            } else {
                $data['title'] = "Index";
                $data['error'] = 'The email is not exists in system. Please, try again';
                $this->load->view('header', $data);
                $this->load->view('forgot_password');
                $this->load->view('footer');
                return false;
            }
        }
    }
    public function change_pwd()
        /* Метод change_pwd() контролера «Users» */
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|required |callback_username_not_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
        $this->form_validation->set_rules('conf_password',  'Confirm password',  'required|min_length[5]|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $data['title']="Index";
            $this->load->view('header',$data);
            $this->load->view('reset_pwd_form');
            $this->load->view('footer');
        } else {
            /*
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_email = $this->user->get_user_email($email);

            $email = $this->user->get_user_email($email);

            $new_password=sha1($password);
            $this->user->forgot_password($email, $new_password);
            $this->email->from(['email protected] com','Admin');
            $this->email->to($email);
            $this->email->subject('Your new password');
            $this->email->message('You new password to access to your account is  '. $password);
            $this->email->send();
            redirect(base_url().'index.php/users/index');
          */
        }
    }
}