<?php
class Files extends CI_Controller
{

 public function user_logged_in(){
      //method to check user login session still exists. a false return if not.
      if($this->session->userdata('is_logged_in')){
            return true;    
           }else{
            return false;
        }
  }

 public function index()
 {  
 	if($this->user_logged_in()==false){
       header('location:'.base_url().'main/index');
    }else{
    	 $this->load->model('model_files');//Loading the model
    	 $results_array = $this->model_files->fetchAllModules();//accessing the fetchAllModules method of the model class
    	 $pass_modules = array(
             'module_names' => $results_array
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
            $this->load->view('learning_tool/main_page',$pass_modules);
            $this->load->view('view_footer');
    }
 }
 

  public function lecture_listpage($module_id = null)
  {     
        //displaying the list of lecuter weeks which I have put as maximum of 10;
        if($this->user_logged_in()==true){
        	$this->load->model('model_files');
        	$results_array = $this->model_files->getModuleById($module_id);
        	$pass_module_details = array(
                  'module_rows' => $results_array
        		); 
        	$this->load->library('../controllers/main');
            $obj = new $this->main();
            $getUserData = $obj->getLogged_userData();
            $userdata = array(
                'uservalues' => $getUserData
              );
             if($results_array==false||$module_id == null){
                $this->load->view('view_header'); 
		        $this->load->view('view_nav',$userdata);
		        $this->load->view('log_user/user_second_nav');
		        $this->load->view('learning_tool/not_found');
		        $this->load->view('view_footer');
             }else{
	           $this->load->view('view_header'); 
	           $this->load->view('view_nav',$userdata);
	           $this->load->view('log_user/user_second_nav');
	           $this->load->view('learning_tool/lecture_list',$pass_module_details);
	           $this->load->view('view_footer');
             return $results_array;
            }
          }else{
        	 header('location:'.base_url().'main/index');
         }
  }

  private function getUserData()
  {
     //retrieving the user data of logged in user
     $this->load->library('../controllers/main');
     $obj = new $this->main();
     $getUserData = $obj->getLogged_userData();
     return $getUserData;

  }
  

  public function viewLectures($module_id)
  {
     //simply loading the view of the lectures
     if($this->user_logged_in()==false)
     {
         echo "Sorry You need to be logged in to view this Page";
     }else
     {   
         $this->load->model('model_files');
         $results_array = $this->model_files->getModuleById($module_id);     
         $get_userdata = $this->getUserData();
         $userdata = array(
             'uservalues' =>$get_userdata
          );         
         
         $pass_module_details = array(
              'module_rows' => $results_array
            ); 
         $weekno = $_GET['week'];
         $result_uploads = $this->model_files->fetchUploads($module_id,$weekno);
         $pass_upload_results = array(
            'get_uploaded_files' => $result_uploads
          );
         $this->load->view('view_header'); 
         $this->load->view('view_nav',$userdata);
         $this->load->view('log_user/user_second_nav');
         
         $this->load->view('learning_tool/view_lectureNotes',$pass_module_details);
         $this->load->view('learning_tool/view_uploads',$pass_upload_results);
         $this->load->view('view_footer');
     }
  }

  public function upload_files()
  {  //recievs the files and data from the form and sends it to the model
     if($this->user_logged_in()==false){
           header('location:'.base_url().'main/index');
     }else{
       if(isset($_FILES['userfile'])){
         $file = $_FILES['userfile'];//referencing to the name of the file uploader in the form
         $file_name = $file['name'];
         $file_tmp = $file['tmp_name'];//php allocating a temporary location before the file is redirected to the user.
         $file_size = $file['size'];//determining the file size
         $file_error = $file['error'];
         $file_ext = explode('.',$file_name);//array exploding at the extension for e.g [image].[jpg]
         $file_ext = strtolower(end($file_ext)); //end will take the end element of array after exploding
         $allowed = array('txt','doc','docx');//white listing the file types
         $module_id = $_POST['module_id'];
         $weekno = $_POST['weekno'];


         if(in_array($file_ext, $allowed))//parameter for whitelisting file extension and allowed size.
          {    
            if($file_error === 0){
              if($file_size <= 15000000){//limiting the file size, currently at 15MB in bytes
                $file_name_new = uniqid('grg',true).'.'.$file_ext;//prefix after my surname :-)
                $file_destination = 'uploads/'.$file_name_new;
                  if(move_uploaded_file($file_tmp, $file_destination)){//moving the uploaded files to the new directory from $file_destination
                     $data = array(
                        'module_id' => $module_id,
                        'weekno'    => $weekno,
                        'filename'  => $file_name_new
                        );
                     $this->load->model('model_files');
                     $result = $this->model_files->insert_uploaded_files($data);
                     if($result==true){
                       header('location:viewLectures/'.$module_id.'?week='.$weekno);
                     }else{
                       echo "Could not be inserted, Something went wrong";
                     }
                   }
                }else{
                echo "big file";
               }
           }else{
            echo "somethig wrong";
           }
         }else{
      echo "That file is not allowed";
   }
       }else{
        echo "File is not selected";
       }
     }
  }

}//end of controller class files


?>
