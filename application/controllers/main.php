<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {  
  /* 
   This Application was developed as a project for Glyndwr University. 
   It is developed on the MVC architechture and this class is teh default class of this application.
  map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){ //default method on any controller
        if($this->logged_in()){
          redirect('user/home');
        }else{
        $this->load->view('view_header');
    		$this->load->view('default_nav');
    		$this->load->view('welcome_message');
        //$this->load->view('view_footer');
         }
	}

	public function signup(){
      //Loads the Sign Up Page
      if($this->logged_in()){//method in this class to check if the user is already logged in.
           redirect('user/home');
      }else{
  		$this->load->view('view_header');//Loading the view_header.php from Views Folder
  		$this->load->view('default_nav');
  		$this->load->view('signup');
      $this->load->view('view_footer');
        }
	}

	public function login(){
         //login method.
        if($this->logged_in()){
           redirect('user/home');
        }else{       
    		$this->load->view('view_header');
    		$this->load->view('default_nav');
    		$this->load->view('view_login');
    		$this->load->view('view_footer');
        }
	}

  public function signup_validation(){    
    	  //once the user signs up on the signup page, this function validates the input data
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Full Name','required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('username', 'Your Username', 'required|trim');

        $this->form_validation->set_message('is_unique',"That email is aleready taken. Please register with a different email.");
        if($this->form_validation->run()){
              $full_name = $this->input->post('name');
              $email = $this->input->post('email');
              $password = $this->input->post('password');
              $username = $this->input->post('username');
              $data = array(
                 'full_name' => $full_name,
                 'email'  => $email,
                 'password'=> $password,
                 'username' => $username
              	);
              $this->load->model('model_db');
              $this->model_db->user_entry($data);
              $success_entry_msg = array(
                    'message' => "You have been successfully registered, Login to explore the application"
              	);
              $this->load->view('view_header');
              $this->load->view('view_nav');
              $this->load->view('view_user_registration_successful',$success_entry_msg);//passing the $succes_entry_msg array to view_uer_registraiont_successful view.
              $this->load->view('view_footer');

        }else{
          $this->load->view('view_header');
          $this->load->view('view_nav');
          $this->load->view('view_header');
          
        	$this->load->view('signup');
          $this->load->view('view_footer');
        }
        


    }#end of the function signup_validation

  public function login_validation(){
       #this method validates the user input from the login screen
       $this->load->library('form_validation');
       $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
       $this->form_validation->set_rules('password','Password','required|trim');
       
       if($this->form_validation->run()){
               $data = array(
                  'email' => $this->input->post('email'),
                  'is_logged_in' => 1
                );

               $this->session->set_userdata($data);
               $this->session->set_userdata($data['email']);
                echo $this->validate_credentials();
                echo "Logged in";

               redirect('main/index');
       }else{
             $this->load->view('view_header');
             $this->load->view('view_nav');
             $this->load->view('view_login');
             $this->load->view('view_footer');
       }        
    }#end of login_validation method

    public function validate_credentials(){
           
           $this->load->model('model_db');
           if($this->model_db->can_login()){
              return true;
           } else{
              $this->form_validation->set_message('validate_credentials',"Incorrect username/password");
              return false;
           }
    }

  public function user_profile($id=null){
          #loads the user Profile View and anticipates a parameter of id. example ID=1 or 2 etc..
          if($this->logged_in()){
            $userdata = array(
                'uservalues' => $this->getLogged_userData()
              );
            $this->load->model('model_answers');
            $query_result = $this->model_answers->getUserByID($id);
            if(!$query_result){
                $error_msg['msg'] = "Sorry That user Does not Exist"; 
                $this->load->view('view_header');
                $this->load->view('view_nav',$userdata);
                $this->load->view('log_user/user_second_nav');
                $this->load->view('log_user/no_user',$error_msg);
                $this->load->view('view_footer');

            }else{
            $uservalues = array(
                    'user_values' => $query_result
              );
            $this->load->view('view_header');
            $this->load->view('view_nav',$userdata);
            $this->load->view('log_user/user_second_nav');
            $this->load->view('user_profile',$uservalues);
            $this->load->view('view_footer');
          }

        }else{
           redirect('main/index');//redirect to the index method if the user is not logged in.           
        }
    }
    
  public function logged_in(){
          #checks if the current user is logged in or not and can  be reused many times
          if($this->session->userdata('is_logged_in')){
            return true;    
           }else{
            return false;
        }
     }#end of logged_in method
    
  public function getLogged_userData(){
            //this method retrieves the logged user_data  
            $data = array(
               'email'=> $this->session->userdata('email')
              );
            $this->load->model('model_db');
            $userdata = $this->model_db->getLoggedUserData($data);        
            return $userdata;        
     }

  /*public function test(){..Test method
     #only a test function
      $data = array(
          'email' => $this->session->userdata('email')
        );
       $this->load->model('model_db');
       $result = array(
          'thevalues' => $this->model_db->getLoggedUserData($data)
        );
       $this->load->view('user_profile',$result);
    
  }*/

  public function home(){
    $logged_in = array(
          'user_session' => $this->logged_in()
      );

    $this->load->library('../controllers/user');
    $this->user->logged_user($logged_in);
  }

  public function logout(){
      #logs out the current user
      $this->session->sess_destroy();
      redirect('main/index');
    }

  public function help()
  {   //Loads the Help Page
      $this->load->view('view_header');
      $this->load->view('default_nav');
      $this->load->view('view_help');
      $this->load->view('view_footer');
  }

}#end of the main class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */