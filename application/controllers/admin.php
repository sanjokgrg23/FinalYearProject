<?php
 class Admin extends CI_Controller{
 	public function admin_login()
 	{
      $this->load->view('admin/login');
 	}
 	
 	public function loginprocess()
 	{
 	  if(isset($_POST['submit'])){
 	  	   
           header('location:'.base_url().'admin/homepage');
 	  }	
 	}

 	public function homepage()
 	{    
 		  $this->load->view('admin/admin_home');
 		  
 	}

 	public function connect_db(){
    #connection method with PDO 
		try{
		$handler = new PDO("mysql:host=localhost;dbname=project", 'root', ''); 
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $handler;
	   }catch(PDOException $e){
		 echo $e->getMessage();
		 return false;
	    }
    }

    public function view_question()
    {
      $handler =$this->connect_db();
      $sql = "SELECT * FROM user_questions";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_results = array();
      $array_results = $query->fetchAll(PDO::FETCH_ASSOC);

      foreach ($array_results as $val) {
      	    echo '<a href="">'.$val['question_title'].'</a><br>';
      	    echo '<a href="">'.$val['question_detail'].'</a><br>';
      	    echo '<a href=<?php' echo base_url().'admin/delete?id='.$val['question_id'].';?>">Delete</a>';

      }

    }
 }
?>