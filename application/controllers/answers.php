i<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answers extends CI_Controller{
   
   public function index(){
   	  $this->load->view('answers/answer_question');
     }
  

   public function user_logged_in(){
      if($this->session->userdata('is_logged_in')){
            return true;    
           }else{
            return false;
        }
   }

   public function get_quest($quest_key=null){
         #This method retrieves the questions and user values from the database

         if($this->user_logged_in()==true){
         	$data = array(
             'quest_key'=>$quest_key
         		);
            $this->load->model('model_answers');//Loading the Model class model_answers
            $get_result = $this->model_answers->get_quest_data($data);//accessing the get_quest_data method in the model
            
            $pass_result = array(
              'question_values' => $get_result
              );
            $this->load->library('../controllers/main');
            $obj = new $this->main();
            $getUserData = $obj->getLogged_userData();
            $userdata = array(
                'uservalues' => $getUserData
              );
            foreach ($get_result as $val) {
                $quest_id = $val['question_id'];
            }
            $answer_value = $this->get_answers($quest_id);
            if($answer_value==false){
              $pass_answer['question_id'] = $quest_id;
              $pass_answer['message'] = "No Answers Yet, Why not be the first to answer"; 
              $this->load->view('view_header'); 
              $this->load->view('view_nav',$userdata);
              $this->load->view('log_user/user_second_nav');
              $this->load->view('answers/answer_question',$pass_result);
              $this->load->view('answers/no_answers',$pass_answer);
              $this->load->view('answers/answer_form',$pass_result);
              $this->load->view('view_footer');
            }else{
            $pass_answer = array(
                  'answer_values' =>$answer_value
              );   
            $this->load->view('view_header'); 
            $this->load->view('view_nav',$userdata);
            $this->load->view('log_user/user_second_nav');
            $this->load->view('answers/answer_question',$pass_result);
            $this->load->view('answers/user_answers',$pass_answer);
            $this->load->view('answers/answer_form',$pass_result);
            $this->load->view('view_footer');
          }
         }else{
         	 echo "Sorry You can't view this page without loggin in.";
         	 header('Refresh:3;url='.base_url().'main/index');//redirecting the user.
         }
   }
   
   public function get_answers($quest_id){
        //get answers from the answers table
        if($this->user_logged_in() == true){

          $data = array(
             'question_id' => $quest_id
            );
          $this->load->model('model_answers');
          $answer_result = $this->model_answers->get_answer_data($data);
          if($answer_result == false){
             return false;
          }else{
          return $answer_result;
          }
        }else{
           echo "Sorry You can't view this page without loggin in.";
           header('Refresh:3;url='.base_url().'main/index');
        }        
   }

   public function post_answers(){
    //This method takes value from the Answers form and sends it to the model_answers class.
        if($this->user_logged_in()==true){
               if(isset($_POST['submit'])){
                   $answer = $_POST['answer_input'];
                   $question_id = $_POST['quest_id'];
                   $user_email = $_POST['user_email'];
                   $this->load->model('model_answers');                   
                   $quest_result = $this->model_answers->getQuestByID($question_id);//question_id provided in the form
                   foreach ($quest_result as $val) {
                     $key = $val['quest_key'];
                   }
                   $this->load->library('../controllers/main');
                   $obj = new $this->main();
                   $getUserData = $obj->getLogged_userData();
                   foreach ($getUserData as $userval) {
                     $user_id = $userval['id'];
                   }
                   $user_answer = array(
                        'quest_id' => $question_id,
                        'user_id'  => $user_id,
                        'answer' => $answer
                    );
                   $post_result = $this->model_answers->postAnswer($user_answer);                   
                   if($post_result==true){
                    header('Refresh:1;url='.base_url().'answers/get_quest/'.$key);
                   }else{
                    echo "ERROR";
                   }                  
               }else{
           header('Refresh:1;url='.base_url().'main/index');                 
               }
        }else{
          echo "Sorry You cannot view this page without logging in.";
          header('Refresh:3;url='.base_url().'main/index');
        }
   }

   public function rateUp($questionid = null)
   {  
      if($this->user_logged_in() == true){
       $this->load->model('model_rating');
       $result = $this->model_rating->rate_Up($questionid);
       echo $result;
      }else{
        echo "dkla";
      }
   }

   public function rateDown($questionid = null)
   {  
      if($this->user_logged_in() == true){
       $this->load->model('model_rating');
       $result = $this->model_rating->rate_Down($questionid);
       echo $result;
      }else{
        echo "dkla";
      }
   }


}

?>