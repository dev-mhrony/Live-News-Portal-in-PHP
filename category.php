<!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com --><?php 
session_start();
error_reporting(0);
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>Live News Portal | Category Page</title>
    <!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com -->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/icons.css">
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container-fluid">



        <div class="row" style="margin-top: 4%">
            <div class="col-md-2 mt-5">
                <!-- Categories Widget -->
                <div class="card my-4 border-0">
                    <h5 class="card-header bg-white border-0">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled mb-0">
                                    <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
                                 while($row=mysqli_fetch_array($query))
                                 {
                                 ?>
                                    <li class=" mb-2">
                                        <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="text-secondary"><?php echo htmlentities($row['CategoryName']);?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Entries Column -->
            <div class="col-md-6">

                <!-- Blog Post -->
                <?php 
        if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
             






     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
                <h1><?php echo htmlentities($row['category']);?> News</h1>
                <div class="card mb-4">
                    <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <div class="card-body">
                        <p class="text-right mb-0"><small>Posted on <?php echo htmlentities($row['postingdate']);?></small></p>

                        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="card-title text-decoration-none text-dark">
                            <h2 class="card-title text-dark"><?php echo htmlentities($row['posttitle']);?></h2>
                        </a>

                        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="">Read More &rarr;</a>
                    </div>

                </div>
                <?php } ?>

                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                </ul>
                <?php } ?>




                <!-- Pagination -->


                <!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com -->

            </div>

            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include('includes/footer.php');?>
    <!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com -->

    <script src="js/foot.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    </head>
</body>
<!--  Author Name: MH RONY.
                        GigHub Link: https://github.com/dev-mhrony
                        Facebook Link:https://www.facebook.com/dev.mhrony
                        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
                        for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
                        Visit My Website : developerrony.com -->

</html>