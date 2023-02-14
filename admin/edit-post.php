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
   if(isset($_POST['update']))
   {
   $posttitle=$_POST['posttitle'];
   $catid=$_POST['category'];
   $subcatid=$_POST['subcategory'];
   $postdetails=$_POST['postdescription'];
   $lastuptdby=$_SESSION['login'];
   $arr = explode(" ",$posttitle);
   $url=implode("-",$arr);
   $status=1;
   $postid=intval($_GET['pid']);
   $query=mysqli_query($con,"update tblposts set PostTitle='$posttitle',CategoryId='$catid',SubCategoryId='$subcatid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status',lastUpdatedBy='$lastuptdby' where id='$postid'");
   if($query)
   {
   $msg="Post updated ";
   }
   else{
   $error="Something went wrong . Please try again.";    
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
                        <h4 class="page-title">Edit Post </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li>
                                <a href="#"> Posts </a>
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
            <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
            <?php
                     $postid=intval($_GET['pid']);
                     $query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
                     while($row=mysqli_fetch_array($query))
                     {
                     ?>

            <form name="addpost" method="post" class="row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['title']);?>" name="posttitle" placeholder="Enter title" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                        <option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['category']);?></option>
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
                        <option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcategory']);?></option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                            <textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['PostDetails']);?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                            <img src="postimages/<?php echo htmlentities($row['PostImage']);?>" width="300" />
                            <br />
                            <a href="change-image.php?pid=<?php echo htmlentities($row['postid']);?>">Update Image</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <button type="submit" name="update" class="btn btn-custom waves-effect waves-light btn-md">Update </button>
        </div>
        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
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