<?php
class Model_answers extends CI_Model{
 public function connect_db(){
    #connection method with PDO 
		try{
    //$handler = new PDO("mysql:host=localhost;dbname=project", 'root', ''); //creating a PDO Object
		$handler = new PDO("mysql:host=mysql16.000webhost.com;dbname=a7349908_project", 'a7349908_root', 'abcde123'); //creating a PDO Object
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $handler;
	   }catch(PDOException $e){
		 echo $e->getMessage();
		 return false;
	    }
    }

 public function get_quest_data($data){
// gets the question data and joins the user witht he question
 	$quest_key = $data['quest_key'];
 	$handler = $this->connect_db();
 	$sql = "SELECT a.question_id, a.question_title,a.question_detail,a.question_tags,a.user_id,a.quest_key, a.rating, b.id,b.username
        FROM user_questions a, users b
        WHERE a.user_id = b.id
        AND a.quest_key = $quest_key";
 	$query = $handler->prepare($sql);
 	$result = $query->execute();
 	$count = $query->rowCount();
 	if($count==0){
 		  
 		  return false;
 	}else{
 	$array_result = array();
 	$array_result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $array_result;
   }

 }

 public function get_answer_data($data){
    //gets the answers from the user_answers table and merges it with the user
 	 $quest_id = $data['question_id'];
 	 $handler = $this->connect_db();
 	 $sql = "SELECT a.answer_id,a.question_id, a.answer,a.rating,a.time, b.id,b.username
        	 FROM user_answers a, users b
        	 WHERE a.user_id = b.id
             AND a.question_id=$quest_id";
   $query = $handler->prepare($sql);
 	 $result = $query->execute();
 	 $count = $query->rowCount();
 	 if(!$result){
 		$null_answer = "Sorry there Are no answers so far. Would you like to be the first one to answer??";
 	  return $null_answer;

 	 }else{

 	$array_result = array();
 	$array_result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $array_result;
     
   }
  }

   public function getUserByID($id){
        //retrieve the user by the UserID
        $user_id = $id;
        $handler = $this->connect_db();
        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $handler->prepare($sql);
        $result = $query->execute();
        if(!$result){
          return false;
        }else{
        $array_result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array_result;
      }
   }

   public function getQuestByID($id){
   	$quest_id = $id;
   	$handler = $this->connect_db();
   	$sql = "SELECT * FROM `user_questions` WHERE `question_id` = $quest_id";
   	$query = $handler->prepare($sql);
   	$result = $query->execute();
   	$array_result = array();
   	$array_result = $query->fetchALL(PDO::FETCH_ASSOC);
   	return $array_result;
   }

   public function postAnswer($user_answer){
          //inser the posted answer to the DB.  
       	  $quest_id = $user_answer['quest_id'];
       	  $user_id = $user_answer['user_id'];
       	  $answer = $user_answer['answer'];
       	  $date = date('Y-m-d H:i:s');
       	  $handler = $this->connect_db();
       	  $sql = "INSERT INTO user_answers(answer,user_id,question_id,rating,time) VALUES(?,?,?,?,?)";
       	  $query = $handler->prepare($sql);
       	  $result = $query->execute(array($answer,$user_id,$quest_id,'0',$date));
       	  if(!$result){
       	  	return false;
       	  }else{
       	  	return true;
       	  }
      
       }
}#end of class
?>