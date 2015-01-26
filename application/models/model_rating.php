<?php
 class Model_rating extends CI_Model
 {
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

   public function rate_Up($quest_id = null)
   {
    //AJAX Rating system.
    $handler = $this->connect_db();
    $sql = "UPDATE user_questions SET rating = rating + 1 WHERE question_id=$quest_id";
    $query = $handler->prepare($sql);
    $result = $query->execute();
    $sql1 = "SELECT * FROM user_questions WHERE question_id = $quest_id";
    $query1 = $handler->prepare($sql1);
    $result1 = $query1->execute();
    $array_result = array();
 	$array_result = $query1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($array_result as $row) {
        $row['rating'];
    }
    return $row['rating']; 
   }

    public function rate_Down($quest_id = null)
   {
    //AJAX rate DOWN.
    $handler = $this->connect_db();
    $sql = "UPDATE user_questions SET rating = rating - 1 WHERE question_id=$quest_id";
    $query = $handler->prepare($sql);
    $result = $query->execute();
    $sql1 = "SELECT * FROM user_questions WHERE question_id = $quest_id";
    $query1 = $handler->prepare($sql1);
    $result1 = $query1->execute();
    $array_result = array();
 	$array_result = $query1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($array_result as $row) {
        $row['rating'];
    }
    return $row['rating']; 
   }

 }//end of the model_rating class

?>