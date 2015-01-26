<style type="text/css">
  #breadcrumb{
  	height:40px;
  	background: #ABC5FF;
  }
  #breadcrumb a{
  	 line-height: 40px;
  	 text-decoration: none;
  	 color:white;
  	 margin-left: 10px;
  }
  #breadcrumb a:hover{
  	 color:yellow;
  }
  #welcome_learn{
  	 text-align: center;
  }
  #lecture_list{
  	 text-align: center;
  }
  #list{
  	 width:500px;
  	 margin:auto;
  	 text-align: left;
  }
  #list a{
  	font-size: 18px;
  	padding-top:5px;
  }

</style>
<?php 
  foreach ($module_rows as $row) {
  	$row['module_id'];
  	$row['module_name'];
  }
?>
<div class="container">
	<div id="breadcrumb">
       <a href="<?php echo base_url().'files/index';?>">Main Page</a> >> 
       <a href="<?php echo base_url().'files/lecture_listpage/'.$row['module_id'];?>"><?php echo $row['module_name'];?></a>
    </div>
    <div id="welcome_learn">
        <h1>Welcome to the learning tool</h1>
    </div>
    <div id="lecture_list">
        <h3><?php echo $row['module_name'];?></h3>
       <div id="list">
       	  <?php
             for($i=1;$i<=10;$i++)
             {
             	echo '<a href="'.base_url().'files/viewLectures/'.$row['module_id'].'?week='.$i.'">Lecture Week '.$i.'</a><br><br>';
             }
       	  ?>
           
       </div>
    </div>
</div>