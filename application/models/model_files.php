<?php
class Model_files extends CI_Model
{
  public function index(){

  }
  
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

   public function getModuleById($module_id)
   {
      $handler = $this->connect_db();
      $sql = "SELECT * FROM modules WHERE module_id = $module_id";
      $query = $handler->prepare($sql);
      $query->execute();
      $count = $query->rowCount();
      if($count==0 || $module_id == null){
      	return false;
      }else{
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;
      }

   }

   public function fetchUploads($module_id,$weekno)
   {
      $handler = $this->connect_db();
      $sql = "SELECT * FROM uploads WHERE module_id = $module_id AND lecture_week=$weekno";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;
   }

  public function fetchAllModules()
  {
   $handler = $this->connect_db();
   $sql = "SELECT * FROM modules";
   $query = $handler->prepare($sql);
   $result = $query->execute();
   $array_result = array();
   $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
   return $array_result;
  }

  public function insert_uploaded_files($data)//
  {
    $handler = $this->connect_db();
    $filename = $data['filename'];
    $module_id = $data['module_id'];
    $weekno = $data['weekno'];
    $sql = "INSERT INTO uploads(filename,module_id,lecture_week) VALUES(?,?,?)";
    $query = $handler->prepare($sql);
    $result = $query->execute(array($filename,$module_id,$weekno));
    if(!$result){
         return false;
    }else{
         return true;
    }
  }


}//end of the Class 
?>