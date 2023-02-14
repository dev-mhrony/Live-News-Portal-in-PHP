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
   
   // For adding post  
   if(isset($_POST['submit']))
   {
   $posttitle=$_POST['posttitle'];
   $catid=$_POST['category'];
   $subcatid=$_POST['subcategory'];
   $postdetails=$_POST['postdescription'];
   $postedby=$_SESSION['login'];
   $arr = explode(" ",$posttitle);
   $url=implode("-",$arr);
   $imgfile=$_FILES["postimage"]["name"];
   // get the image extension
   $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
   // allowed extensions
   $allowed_extensions = array(".jpg","jpeg",".png",".gif");
   // Validation for allowed extensions .in_array() function searches an array for a specific value.
   if(!in_array($extension,$allowed_extensions))
   {
   echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
   }
   else
   {
   //rename the image file
   $imgnewfile=md5($imgfile).$extension;
   // Code for move image into directory
   move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);
   
   $status=1;
   $query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage,postedBy) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile','$postedby')");
   if($query)
   {
   $msg="Post successfully added ";
   }
   else{
   $error="Something went wrong . Please try again.";    
   } 
   
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

<!-- Top Bar Start -->
<?php include('includes/topheader.php');?>
<script>
function getSubCat(val) {
    $.ajax({
        type: "POST",
        url: "get_subcategory.php",
        data: 'catid=' + val,
        success: function(data) {
            $("#subcategory").html(data);
        }
    });
}
</script>
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
                        <h4 class="page-title">Add Post </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Post</a>
                            </li>
                            <li>
                                <a href="#">Add Post </a>
                            </li>
                            <li class="active">
                                Add Post
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
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


            <form name="addpost" method="post" class="row" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                        <option value="">Select Category </option>
                        <?php
                                          // Feching active categories
                                          $ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
                                          while($result=mysqli_fetch_array($ret))
                                          {    
                                          ?>
                        <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <select class="form-control" name="subcategory" id="subcategory" required>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                            <textarea class="summernote" name="postdescription" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                            <input type="file" class="form-control" id="postimage" name="postimage" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-custom waves-effect waves-light btn-md">Save and Post</button>
                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
            </form>

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