<!DOCTYPE html>
<html lang="en">
<head>
<title>Code for Me</title>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<script src="<?php echo base_url('assets/js/vendors/jquery.min.js');?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine"> 
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css');?>">  
       
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/fontawesome.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700%7CRoboto:400,100,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">

        <style type="text/css">
   
   #chat_message_area
   {
    width: 100%;
    height: auto;
    min-height: 80px;
    overflow: auto;
    padding:6px 24px 6px 12px;
    border: 1px solid #CCC;
       border-radius: 3px;
   }

   .notification_circle {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #FF0000;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .online
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #5cb85c;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .offline
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #ccc;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }


/* dashboaed */
/* 
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
} */
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: 14px;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
  </style>

    </head>

    <body class="trd-home-template trd-homepage-six">


    
        <!-- HEADER -->
        <header class="trd-header trd-transparent-header trd-fixed-header">
            <!-- Bottombar -->
            <div class="trd-header-bottombar">
                <!-- Navigation Menu start-->
                <nav class="navbar trd-main-menu" role="navigation">
                  <div class="container">
                    <div class="row">
                      <!-- Navbar Toggle -->
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>

                          <!-- Logo -->
                          <a class="navbar-brand" href="index-2.html"><img class="logo"  style="    margin-top: -91px;" src="<?php echo base_url('assets/images/temp/logo-header-6.png');?>" alt="TRADE"></a>
                      </div>
                      <!-- Navbar Toggle End -->

                        <!-- navbar-collapse start-->
                        <div id="nav-menu" class="navbar-collapse trd-menu-wrapper collapse" role="navigation">
                            <!-- Menu -->
                            <ul class="nav navbar-nav trd-menus">
                                <li class="active">
                                    <a href="<?php  echo base_url('user/index'); ?>">Home</a>
                       
                                </li>
                                <li>
                                    <a href="<?php echo base_url('user/aboutus'); ?>">About</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('user/contactus'); ?>">Contact</a>
                                </li>

                                <li>
                             <!-- <li>
                                    <a href="blog.html">Blog</a>
                                    <ul class="trd-dropdown-menu">
                                        <li>
                                             <a href="blog-details.html">Blog Details</a> 
                                        </li>
                                    </ul>
                                </li> - -->

                                <li>
                                <a href="<?php  echo base_url('user/view_course'); ?>"  >
                                  Courses
                               </a>
                                </li>

                                <li>
                                <a href="<?php  echo base_url('user/view_quiz'); ?>"  >
                                  Quiz
                               </a>
                                </li>
                                <li>
                                    <a href="#">Profile</a>
                                    <ul class="trd-dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url('user/view_mycourse') ?>">My Courses</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('user/view_myhistory') ?>">My Quiz History</a>
                                        </li>
                                        <li>
                                            <a href="<?php  echo base_url('user/view_dashboard'); ?>">My Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php  echo base_url('user/view_mentors'); ?>">Talk to Mentors</a>
                                        </li>
                                        
                                    </ul>
                                </li>


                               
                                    <!-- Search -->
                                    <!-- <span class="trd-search-wrapper">
                                        <a href="#" class="trd-search-icon">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </span> -->
                                   
                                    
                                    
                                    <!-- End -->
                                
                               
                            </ul>
                            <!-- End -->
                            <div class="userbtn" style="margin-left: 1172px;
                                  margin-top: -31px;">
                            <a href="<?php  echo base_url('user/view_wallet'); ?>"class="btn btn-primary">Wallet</a>
                       <!-- <button class="btn btn-primary">Wallet</button>
                       <button class="btn btn-primary">courses</button> -->
                            </div>  
                        </div>
                        <!-- navbar-collapse end-->


                        <span class="trd-contact-num">31 120 3768</span>
                       
                    </div>
                  </div>
                </nav>
                <!-- Navigation Menu end-->
            </div>
            <!-- End -->
        </header>