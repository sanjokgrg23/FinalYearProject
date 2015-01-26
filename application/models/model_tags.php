<?php
class Model_tags extends CI_Model{

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

    public function getAllTags(){
        //Retreeivng all tags from the DB
    $handler = $this->connect_db();
    $sql = "SELECT * FROM tags";
    $query =$handler->prepare($sql);
    $result = $query->execute();
    $array_result = array();
    $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$result){
            return false;
        }else{
            return $array_result;
         }
    }

	public function insertTags(){
        //inserttin the Tags to the database.s
		$tag[0] = "Business";
        $tag[1] = "Economics";
        $tag[2] = " Macroeconomics";
        $tag[3] = "MicroEconomics";
        $tag[4] = "Finance";
        $tag[5] = "Inflation";
        $tag[6] = "Maths";
        $tag[7] = "GeoMetry";
        $tag[8] = "Arithmetic";
        $tag[9] = "Algebra";
        $tag[10] = "Programming";
        $tag[11] = "Java";
        $tag[12] = "C";
        $tag[13] = "Asp.net";
        $tag[14] = "HTML";
        $tag[15] ="php";
        $tag[16] = "css";
        $tag[17] = "Javascript";
        $tag[18] = "Perl";
        $tag[19] = "Ruby";
        $tag[20] =" Class";
        $tag[21] = " ObjectOriented";
        $tag[22] = "OOP";
        $tag[23] ="Rails";
        $tag[24] ="Physics";
        $tag[25] ="Biology";
        $tag[26] ="Chemistry";
        $tag[27] ="Astronomy";

        $handler = $this->connect_db();
         $sql = "INSERT INTO tags(tags) VALUES(?)";
       	 $query = $handler->prepare($sql);
         
       	 for($i=0;$i<=27;$i++){
       	 $result = $query->execute(array($tag[$i]));                   
       	 }
       	 if(!$result){
       	 	return false;
       	 }else{
       	 	return true;
       	 }
	}
}
?>