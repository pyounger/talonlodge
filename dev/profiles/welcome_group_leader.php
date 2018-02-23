<?php include('includes/php_includes_top.php'); ?>
<?php include('includes/html_header.php'); ?>

<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Dashboard -  <?php echo $_SESSION["user_display_name"]; ?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Dashboard:</b> Main page, here you can see all the activities overall </p>
        </blockquote><br>
    </div>
</div>

    <h2 style="text-align: center;"> Welcome <?php echo $_SESSION["user_display_name"];?> to Talon Lodge Guest Portal </h2>

<p><pre>
One of the most important aspects of service at Talon Lodge is each Guest’s profile information.  This information allows us to properly outfit each guest with the appropriate gear.  This information also provides some critical medical and food allergy information which we use to manage the guest experience.

The profile forms also provide us with the necessary arrival and departure information which allows us to manage your transportation to and from Talon Lodge.

Also included are additional adventure options that are available in at Talon Lodge and in Sitka.  By selecting one or more of these options, our Guest Services staff will adjust your agenda to provide you with the best Alaska experience possible. Some of the items listed have an additional cost associated with the activity or event.

As the group leader, please help us by:
    1.	Inviting each guest in the group to fill out their own profile by clicking here [link to invite management system]
    2.	Do it yourself and fill out the profile form for some or all of your guests [link to add new profile]

Thank you for your help and we look forward to seeing you this summer!
Icon Definitions:

= E-mail Invitation or Reminder
= View Profile Information
= Edit Profile Information
</pre></p>
        
</div>
<?php include("includes/rightsidebar.php"); ?>
</div> </div> </div>
<?php include("includes/footer.php"); ?>