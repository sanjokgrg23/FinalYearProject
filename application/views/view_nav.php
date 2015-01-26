<div class="navbar navbar-default navbar-fixed-top" id="top_navbar">
      <div class="container">
        <div class="navbar-header">
          <a id="logo" href="<?php echo base_url().'main/index';?>" class="navbar-brand"><img src="<?php echo base_url().'/images/g.png'; ?>"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <?php
             if(!$this->session->userdata('email')){ 
          ?>
          <ul class="nav navbar-nav">
            <li>
              <a href="#">Home</a>
              <a href="<?php echo base_url().'main/help'?>">Help</a>
            </li>
           
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="" target="_blank">SignUp</a></li>
            <li><a href="" target="_blank">Login</a></li>
          </ul>
          <?php
         }else{
           foreach ($uservalues as $row) {
             $row['username'];
             $row['email'];
            }?>
          <ul class="nav navbar-nav">
            <li><a href="#"></a></li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a id="profile_link" class="dropdown-toggle" data-toggle="dropdown" href='<?php echo base_url().'main/user_profile/'.$row['id'];?>' target="_blank"><?php echo $row['username'];?><span class="caret"></span></a>
             <ul class="dropdown-menu" aria-labelledby="download">
               <li><a href='<?php echo base_url()."main/user_profile/".$row['id'];?>'>My Profile</a></li>
                              <li><a href='<?php echo base_url()."main/logout";?>'>Logout</a></li>
             </ul>
            </li>
          </ul>
            
    <?php
        }

       ?>
        </div>
      </div>
    </div>