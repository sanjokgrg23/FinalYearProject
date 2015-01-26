<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Questions extends CI_Controller{
   
   public function index(){
      echo "this is questions controller";
   }
   
   public function user_logged_in(){
      if($this->session->userdata('is_logged_in')){
            return true;    
           }else{
            return false;
        }
   }

   public function ask_questions(){
   	  #this method loads the question form post page
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
      $this->load->view('question_posts/post_questions');
      $this->load->view('view_footer');
      }else{
           redirect('main/index');
      }
   }

   public function validate_question(){
       #validates the input field when the user posts a question
       if($this->user_logged_in()== true){
         $getLib =  $this->load->library(array("../controllers/main","form_validation"));
         $getLib = $this->main->getLogged_userData();
         $getUserData = $getLib;
         $userdata = array(
              'uservalues' => $getUserData
          );
             if(isset($_POST['submit'])){
                  if(empty($_POST['input_title'])){
                     echo "Title cannot be empty";      
                     header( "refresh:3;url=".base_url()."questions/ask_questions");//redirects to question form page
                  }else if(empty($_POST['message'])){
                      echo "Description cannot be empty";
                      header( "refresh:3;url=".base_url()."questions/ask_questions");
                  }else if(empty($_POST['vidya'])){
                      echo "You need to suppy tags";
                      header( "refresh:3;url=".base_url()."questions/ask_questions");
                  }else{
                    foreach ($getUserData as $val) {
                      # code...
                       $val['id'];
                    }
                    $title = $_POST['input_title'];//referencing from the form
                    $desc = $_POST['message'];//referecing the form
                    $tags = $_POST['vidya'];// ))
                    $data = array(
                      'title' => $title,
                      'desc' => $desc,
                      'tags' => $tags,
                      'user_id'=>$val['id']
                      );                  
                    $CI =&get_instance();
                    $CI->load->model('user_questions');//loading model user_questions
                    $parameter = $CI->user_questions->submitQuestion($data);
                     if($parameter == true){
                        $this->load->view('view_header'); 
                        $this->load->view('view_nav',$userdata);
                        $this->load->view('log_user/user_second_nav');  
                        $this->load->view('question_posts/post_success');
                        $this->load->view('view_footer');
                        }else{
                         echo "Sorry your Question cannot be posted";
                         header("refresh:3;url=".base_url()."main/index");
                     }
                  }
                 }else{
                //load the form again.
                 echo "not submitted";
             }
          }else{
            redirect('main/index');
          }
    }

    public function list_questions(){
        //retrieving from the database and displaying all the questions        
        $this->load->model('user_questions');
        $result = $this->user_questions->getAllQuestions();
        $array_result = array(
           'all_question' => $result
          );
        if($this->user_logged_in()==true){
           $this->load->library('../controllers/main');
           $obj = new $this->main();
           $getUserData = $obj->getLogged_userData();
           $userdata = array(
                'uservalues' => $getUserData
              );
           $this->load->view('view_header'); 
           $this->load->view('view_nav',$userdata);
           $this->load->view('log_user/user_second_nav');  
           $this->load->view('question_list/question_list',$array_result);
           $this->load->view('view_footer');

            }else{
           $this->load->view('view_header');
           $this->load->view('default_nav');
           $this->load->view('question_list/question_list',$array_result);
           $this->load->view('view_footer');
          }
      }

      public function getTag($tag){
            //gets the tag from the questions
            if($tag==null){
              header('location:url='.base_url().'/questions/list_questions');
            }else{
              $this->load->model('user_questions');
             $result = $this->user_questions->retrieveByTag($tag);
              $array_result = array(
                  'tag_question' => $result
                );
              $this->load->library('../controllers/main');
              $obj = new $this->main();
              $getUserData = $obj->getLogged_userData();
              $userdata = array(
                'uservalues' => $getUserData
              );
              $this->load->view('view_header');
              $this->load->view('view_nav',$userdata);
              $this->load->view('log_user/user_second_nav');  
              $this->load->view('question_list/tagged_questions',$array_result);
              $this->load->view('view_footer');
            }
        }  
}#this is the end of the class;

?>