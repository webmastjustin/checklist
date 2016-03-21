<?php
//error_reporting(E_ALL);ini_set('display_errors', 1);
include 'util.php';

function page_header(){
       ?>
    <!DOCTYPE html>
    <html lang="en">
    <head><meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Physician Education </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="includes/css/bootstrap.min.css" rel="stylesheet">
        <link href="includes/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="includes/css/font-awesome.css" rel="stylesheet">
        <link href="includes/css/style.css" rel="stylesheet">
         <link href="includes/css/pages/reports.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                <a class="brand" href="index.php">
                    Physician Education
                </a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">

                    </ul>
                    <!--                    <form class="navbar-search pull-right">-->
                    <!--                        <input type="text" class="search-query" placeholder="Search">-->
                    <!--                    </form>-->
                </div><!--/.nav-collapse -->
            </div> <!-- /container -->
        </div> <!-- /navbar-inner -->
    </div> <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li>
                        <a href="index.php">
                            <i class="icon-check"></i>
                            <span>Checklist</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=doc">
                            <i class="icon-book"></i>
                            <span>Documentation Elements</span>
                        </a>
                    </li>

                    <li>
                        <a href="index.php?action=ref">
                            <i class="icon-book"></i>
                            <span>Pocket Tool</span>
                        </a>
                    </li>
                </ul>
            </div> <!-- /container -->
        </div> <!-- /subnavbar-inner -->
    </div> <!-- /subnavbar -->
    <div class="main">
    <div class="main-inner">
    <div class="container">
<?php
}

function page_footer(){
    ?>
    </div> <!-- /container -->
    </div> <!-- /main-inner -->
    </div> <!-- /main -->
    <div class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        &copy; 2015 <a href="index.php">Physician Education</a>.
                    </div> <!-- /span12 -->
                </div> <!-- /row -->
            </div> <!-- /container -->
        </div> <!-- /footer-inner -->
    </div> <!-- /footer -->
    <script src="includes/js/jquery-1.7.2.min.js"></script>
    <script src="includes/js/excanvas.min.js"></script>
    <script type="text/javascript" src="includes/js/table/jquery.tablesorter.js"></script>
    <script src="includes/js/chart.min.js" type="text/javascript"></script>
    <script src="includes/js/bootstrap.js"></script>
    <script src="includes/js/base.js"></script>
	</body></html><?php
}