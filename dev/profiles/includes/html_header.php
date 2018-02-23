<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Talon Lodge Guest Portal </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-modal-bs3fix.css" rel="stylesheet" type="text/css">
        <link href="less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
        <link href="less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
        <link href="css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico">

        <link href="css/chosen.css" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script language="javascript">
            function setAll() {
                if (frm.chkAll.checked == true) {
                    checkAll("frm", "chkstatus[]");
                }
                else {
                    clearAll("frm", "chkstatus[]");
                }
            }
            function checkAll(TheForm, Field) {
                var obj = document.forms[TheForm].elements[Field];
                if (obj.length > 0) {
                    for (var i = 0; i < obj.length; i++) {
                        obj[i].checked = true;
                    }
                }
                else {
                    obj.checked = true;
                }
            }
            function clearAll(TheForm, Field) {
                var obj = document.forms[TheForm].elements[Field];
                if (obj.length > 0) {
                    for (var i = 0; i < obj.length; i++) {
                        obj[i].checked = false;
                    }
                }
                else {
                    obj.checked = false;
                }
            }
        </script>
    </head>
    <body>
        <div class="site-holder">
            <nav class="navbar" role="navigation"> 
                <div class="navbar-header"><a class="navbar-brand" href="#"><i class="fa fa-list btn-nav-toggle-responsive text-white"></i><img src="images/logo.png" style="height:80px;"></a></div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav user-menu navbar-right " id="user-menu">
                        <li><a href="#" class="user dropdown-toggle" data-toggle="dropdown"><span class="username"><img src="images/profiles/eleven.png" class="user-avatar" alt=""><?php echo $_SESSION["user_display_name"];?></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php" class="text-danger"><i class="fa fa-lock"></i> Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="box-holder">
                <div class="left-sidebar">
                    <div class="sidebar-holder">
                        <ul class="nav  nav-list">
                            <li class="nav-toggle">
                                <button class="btn  btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
                            </li>
                            
                            <?php buildMenu($menuList);?>
                            
                        </ul>
                    </div>
                </div>
                <div class="content">