<?php
class Model_db extends CI_Model{
    #this model will be called for basic CRUD operations
    
    public function connect_db(){
    #connection method with PDO 
		try{
		//$handler = new PDO("mysql:host=localhost;dbname=project", 'root', ''); 
    $handler = new PDO("mysql:host=mysql16.000webhost.com;dbname=a7349908_project", 'a7349908_root', 'abcde123'); //creating a PDO Object
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $handler;
	   }catch(PDOException $e){
		 echo $e->getMessage();
		 return false;
	    }
    }

    public function user_entry($data){
       $handler = $this->connect_db();
       $name = $data['full_name'];
       $email = $data['email'];
       $password = md5($data['password']);
       $username = $data['username'];

       $sql = "INSERT INTO users(name,email,password,username) VALUES(?,?,?,?)";
       $query = $handler->prepare($sql);
       $query->execute(array($name,$email,$password,$username));


    }

    public function can_login(){
       $handler = $this->connect_db();
       $email = $this->input->post('email');
       $password = md5($this->input->post('password'));
       $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
       $query = $handler->prepare($sql);
       $query->execute();
       $count = $query->rowCount();
       if($count == 1){
        return true;
       }else{
        return false;
       }
    }

    public function getLoggedUserData($data){
      #gets the user data
      $handler = $this->connect_db();
      $email = $data['email'];
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;
    }

    public function test_model(){
      echo "this is from model";
    }

}// end of the Model_db class
?>