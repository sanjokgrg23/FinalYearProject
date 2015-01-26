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
  #course_contents{
  	 text-align: center;
  }
  #module_names{
  	 width:500px;
  	 margin:auto;
  	 text-align: left;
  }
  #module_names a{
  	font-size: 18px;
  	padding-top:5px;
  }

</style>
<div class="container">
	<div id="breadcrumb">
       <a href="#">Main Page</a>
  </div>
    <div id="welcome_learn">
        <h1>Welcome to the learning tool</h1>
    </div>
    <div id="course_contents">
        <h3>Bsc Computing</h3>
       <div id="module_names">
        <?php
         $n = 1;
         foreach ($module_names as $module) {
         	echo $n.' '.' <a href='.base_url().'files/lecture_listpage/'.$module['module_id'].'> '.$module['module_name'].'</a><br><br>';
         	$n++;
         }
        ?>
       </div>
    </div>
</div>