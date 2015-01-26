<style type="text/css">
  #breadcrumb{
  	height:40px;
  	background: #7C99BF;
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
<div class="container">
  
  <?php
   foreach ($module_rows as $row) {
     
     
   }
  $getweek = trim($_GET['week']," .");
  ?>
  <div id="breadcrumb">
       <a href="<?php echo base_url().'files/index';?>">Main Page</a> >> 
       <a href="<?php echo base_url().'files/lecture_listpage/'.$row['module_id'];?>"><?php echo $row['module_name'];?></a> >>
       <a href="<?php echo base_url().'files/viewLectures/'.$row['module_id'].'/?week='.$getweek;?>"><?php echo "Lecture Week".$getweek;?></a> 

    </div>
    <div id="upload_form">
     <?php
       $this->load->helper("form");
        echo validation_errors();
        echo form_open_multipart('files/upload_files');
     ?>
    <p><h2>Upload Notes</h2></p>
    <p><input type="file" name="userfile"></p>
        <input type="hidden" name="module_id" value='<?php echo $row['module_id'];?>'>
        <input type="hidden" name="weekno" value='<?php echo $getweek;?>'>
     <p><input type="submit" class="btn btn-success"name="submit" value="Upload"></p>
    </form>
    </div>
</div>