<?php
class Tags extends CI_Controller{
	public function index(){
       //$this->insertTagsDB();
	}

	public function user_logged_in(){
      if($this->session->userdata('is_logged_in')){
            return true;    
           }else{
            return false;
        }
   }

	private function insertTagsDB(){
    //inserting by tagss
		$this->load->model('model_tags');
        $result = $this->model_tags->insertTags();
        if($result==false){
        	echo "DB error";
        }else{
        	echo "Yes ";
        }
	}

	public function viewAllTags(){
		//This method retieves all the tags from the "Tags " Table
		$this->load->model('model_tags');
		$result = $this->model_tags->getAllTags();
		$array_result = array(
           'all_tags' => $result
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
            $this->load->view('tags/viewallTags',$array_result);//passing the values from the array to the view.
            $this->load->view('view_footer');
	      }else{

	      	echo "sorry you need to be logged in to view this pages. You will be redirected to your login screen";
	      	header("refresh:2;url=".base_url()."main/login");
	      }
   }


}
?>
