<?php
  class User extends CI_Controller{
   public function index(){
   	   echo "This is the User Controller";
   }
   
   function user_logged_in(){
      $this->load->library('../controllers/main');
      $obj = new $this->main();
      $status = $obj->logged_in();
      if($status == true){
      	 return true;
      }else{
      	 return false;
      }
   }

   public function home(){
         // displays the user's homepage or else redirects to the main page
   	     if($this->user_logged_in() == true){
   	     	$this->load->library('../controllers/main');
            $obj = new $this->main();
            $getUserData = $obj->getLogged_userData();
   	     	$userdata = array(
                'uservalues' => $getUserData
              );
   	     	$this->load->view('view_header');
   	     	$this->load->view('view_nav',$userdata);
   	     	$this->load->view('log_user/user_second_nav');
   	     	$this->load->view('log_user/user_home');
   	     	$this->load->view('view_footer');

   	     }else{
   	     	redirect('main/index');
   	     }
   }

   public function logged_user($logged_in){
   	   if($logged_in){
   	   	  return true;
   	   	  
   	   }else{
   	   	  return false;
   	   }
   }

 }
?>