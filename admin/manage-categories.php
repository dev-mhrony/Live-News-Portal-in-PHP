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
   if($_GET['action']=='del' && $_GET['rid'])
   {
    $id=intval($_GET['rid']);
    $query=mysqli_query($con,"update tblcategory set Is_Active='0' where id='$id'");
    $msg="Category deleted ";
   }
   // Code for restore
   if($_GET['resid'])
   {
    $id=intval($_GET['resid']);
    $query=mysqli_query($con,"update tblcategory set Is_Active='1' where id='$id'");
    $msg="Category restored successfully";
   }
   
   // Code for Forever deletionparmdel
   if($_GET['action']=='parmdel' && $_GET['rid'])
   {
    $id=intval($_GET['rid']);
    $query=mysqli_query($con,"delete from  tblcategory  where id='$id'");
    $delmsg="Category deleted forever";
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
        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Manage Categories</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Category </a>
                                    </li>
                                    <li class="active">
                                        Manage Categories
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
                        <div class="col-sm-6">
                            <?php if($msg){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                            </div>
                            <?php } ?>
                            <?php if($delmsg){ ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?>
                            </div>
                            <?php } ?>
                        </div>
                        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">
                                        <a href="add-category.php">
                                            <button id="addToTable" class="btn btn-custom waves-effect waves-light btn-md">Add <i class="mdi mdi-plus-circle-outline"></i></button>
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table m-0 table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Description</th>
                                                    <th>Posting Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                       $query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1");
                                       $cnt=1;
                                       while($row=mysqli_fetch_array($query))
                                       {
                                       ?>
                                                <tr>
                                                    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                                                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                    <td><?php echo htmlentities($row['CategoryName']);?></td>
                                                    <td><?php echo htmlentities($row['Description']);?></td>
                                                    <td><?php echo htmlentities($row['PostingDate']);?></td>
                                                    <td><?php echo htmlentities($row['UpdationDate']);?></td>
                                                    <td><a class="btn btn-primary btn-sm" href="edit-category.php?cid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil"></i></a>
                                                        &nbsp;<a class="btn btn-danger btn-sm" href="manage-categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                       $cnt++;
                                        } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
                        <!--- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">
                                        <h4><i class="fa fa-trash-o"></i> Deleted Categories</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table m-0 table-bordered table-bordered-danger" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Description</th>
                                                    <th>Posting Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                       $query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=0");
                                       $cnt=1;
                                       while($row=mysqli_fetch_array($query))
                                       {
                                       ?>
                                                <tr>
                                                    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                                                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                    <td><?php echo htmlentities($row['CategoryName']);?></td>
                                                    <td><?php echo htmlentities($row['Description']);?></td>
                                                    <td><?php echo htmlentities($row['PostingDate']);?></td>
                                                    <td><?php echo htmlentities($row['UpdationDate']);?></td>
                                                    <td><a href="manage-categories.php?resid=<?php echo htmlentities($row['id']);?>"><i class="ion-arrow-return-right" title="Restore this category"></i></a>
                                                        &nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=parmdel" title="Delete forever"> <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                    </td>
                                                </tr>
                                                <?php
                                       $cnt++;
                                        } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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