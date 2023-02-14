<!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
<!DOCTYPE html>
<html lang="en">
<!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->

<head>
    <title>Live News Portal By MH RONY.</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
    <!-- Select2 -->
    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'username=' + $("#sadminusername").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">


                <a href="index.php" class="logo">
                    <span>
                        <img src="assets/images/logo.png" alt="" height="60">
                    </span>

                </a>
                <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Navbar-left -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>

                        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                    </ul>
                    <ul class="nav navbar-nav" style=" width: 50%; margin-top: 23px; color: red;">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><b>Today Trending News : </b>Online news portal. Besides, the only owner of this code is Code Camp BD or MH RONY. </marquee>
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><b> Notes : </b>This is an educational project from where you can gain knowledge. No one can claim it as their own or sell it for their own sake. If you want to create any project, contact us through Facebook, YouTube or website.</marquee>
                    </ul>

                    <div id="google_translate_element">

                    </div>


                    <!-- Right(Notification) -->
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>
                                    <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                                    <h5>Hi, MH RONY</h5>
                                </li>

                                <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>

                                <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->
                    </ul> <!-- end navbar-right -->

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->