<?php
 class User_questions extends CI_Model{
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

    public function submitQuestion($data){
    	 $handler = $this->connect_db();
    	 $title = $data['title'];
    	 $desc = $data['desc'];
    	 $tags = $data['tags'];
    	 $user_id = $data['user_id'];
       $rand = mt_rand(20000000,999999999);
       $rating = "2";
    	  $sql = "INSERT INTO user_questions(question_title,question_detail,question_tags,user_id,quest_key,rating) VALUES(?,?,?,?,?,?)";
    	  $query = $handler->prepare($sql);
          $query->execute(array($title,$desc,$tags,$user_id,$rand,$rating));
          if($query){
          	  return true;
          }else{
          	  return false;
          }
    }

    public function getAllQuestions(){
      #This gets all the questions in a list
      $handler = $this->connect_db();
      $sql = "SELECT * FROM user_questions ORDER BY rating DESC";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;

    }

    public function retrieveByTag($tag){
        $handler = $this->connect_db();
        $sql = "SELECT * FROM user_questions WHERE question_tags LIKE '%".mysql_real_escape_string($tag)."%'  ORDER BY rating DESC";
        $query = $handler->prepare($sql);
        $result = $query->execute();
        $array_result = array();
        $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array_result;
    }
 }
?>