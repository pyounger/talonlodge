<?php include('includes/php_includes_top.php'); ?>
<?php include('includes/html_header.php'); ?>

<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="welcome_guest.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Dashboard -  <?php echo $_SESSION["user_display_name"]; ?></h3>
    </div>
</div>

<h2 style="text-align: center;"> Welcome <?php echo $_SESSION["user_display_name"];?> to Talon Lodge Guest Portal </h2>
        
</div>
<?php include("includes/rightsidebar.php"); ?>
</div> </div> </div>
<?php include("includes/footer.php"); ?>