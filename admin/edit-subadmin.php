        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
--><?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   if(isset($_POST['submit']))
   {
   $aid=intval($_GET['said']);
   $email=$_POST['emailid'];
   $query=mysqli_query($con,"Update  tbladmin set AdminEmailId='$email'  where userType=0 && id='$aid'");
   if($query)
   {
   echo "<script>alert('Sub-admin details updated.');</script>";
   }
   else{
   echo "<script>alert('Something went wrong . Please try again.');</script>";
   } 
   }
   
   
   ?>
        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
        <?php include('includes/topheader.php');?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Edit Subadmin</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Subadmin </a>
                                    </li>
                                    <li class="active">
                                        Edit Subadmin
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit Subadmin </b></h4>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!---Success Message--->
                                        <?php if($msg){ ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                        </div>
                                        <?php } ?>
                                        <!---Error Message--->
                                        <?php if($error){ ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                                <?php 
                              $aid=intval($_GET['said']);
                              $query=mysqli_query($con,"Select * from  tbladmin where userType=0 && id='$aid'");
                              $cnt=1;
                              while($row=mysqli_fetch_array($query))
                              {
                              ?>
                                <div class="row">
                                    <form class="row" name="suadmin" method="post">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Username</label>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminUserName']);?>" name="adminusernmae" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class=" control-label">Emailid</label>
                                            <div class="">
                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminEmailId']);?>" name="emailid" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Creation Dtae</label>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['CreationDate']);?>" name="cdate" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Updation date</label>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['UpdationDate']);?>" name="udate" readonly>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
            <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->

            <?php } ?>