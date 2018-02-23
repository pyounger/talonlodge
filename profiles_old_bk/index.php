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
            <p> <b>Dashboard:</b> Instructions page. </p>
        </blockquote><br>
    </div>
</div>

<h2 style="text-align: center;"> Welcome <?php echo $_SESSION["user_display_name"]; ?> to Talon Lodge Guest Portal </h2>

<?php
if ($_SESSION["UType"] == 2) {
    ?>
    <p>One of the most important aspects of service at Talon Lodge is each Guest's profile information.  This information allows us to properly outfit each guest with the appropriate gear.  This information also provides some critical medical and food allergy information which we use to manage the guest experience.</p>

    <p>The profile forms also provide us with the necessary arrival and departure information which allows us to manage your transportation to and from Talon Lodge.</p>

    <p>Also included are additional adventure options that are available in at Talon Lodge and in Sitka.  By selecting one or more of these options, our Guest Services staff will adjust your agenda to provide you with the best Alaska experience possible. Some of the items listed have an additional cost associated with the activity or event.</p>

    <p>As the group leader, please help us by:<br>
        1.	<a href="manage_profile.php">Inviting each guest in the group to fill out their own profile by clicking here</a><br>
        2.	<a href="manage_profile.php?action=1">Do it yourself and fill out the profile form for some or all of your guests</a><br>
    </p>
    <p>Thank you for your help and we look forward to seeing you this summer!</p>
    <p>Icon Definitions:</p>
    <p>
        <span class="tooltips"><a href="#" data-original-title="<?php echo "Email has been sent 0 time"; ?>" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-envelope-o"></i></a></span> = E-mail Invitation or Reminder
        <br><br>
        <span class="tooltips"><a href="#" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-minus-circle"></i></a></span> = Delete a Record
        <br><br>
        <span class="tooltips"><a href="#" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-eye"></i></a></span> = View Profile Information
        <br><br>
        <span class="tooltips"><a href="#" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-edit"></i></a></span> = Update Profile Information
        <br><br>
        <span class="tooltips"><a href="#" data-original-title="Profiles Under This Group" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-user"></i></a></span> = Profiles Under Specific Group
    </p>
    <?php
}
?>
<?php
if ($_SESSION["UType"] == 3) {
    ?>
    <p>We need your help. The Talon Lodge Guest Profile provided critical information that allows us to deliver an exceptional guest experience at Talon Lodge.</p>

    <p>This information allows us to properly outfit each guest with the appropriate gear and also provides some critical medical and food allergy information which we use to manage the guest experience.</p>

    <p>The profile forms also provide us with the necessary arrival and departure information which allows us to manage your transportation to and from Talon Lodge.</p>

    <p>Also included are additional adventure options that are available in at Talon Lodge and in Sitka. By selecting one or more of these options, our Guest Services staff will adjust your agenda to provide you with the best Alaska experience possible. Some of the items listed have an additional cost associated with the activity or event.</p>

    <p><a href="manage_profile.php?action=2&contactid=<?php echo $_SESSION["cont_id"]; ?>">To fill out your profile form, please click on this link</a><p/>

    <p>Thank you for your help and we look forward to seeing you this summer!</p>
    <p>Icon Definitions:</p>
    <p>
        <span class="tooltips"><a href="#" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-eye"></i></a></span> = View Profile Information
        <br><br>
        <span class="tooltips"><a href="#" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white"><i class="fa fa-edit"></i></a></span> = Update Profile Information
        <br><br>
    </p>
    <?php
}
?>

</div>
<?php include("includes/rightsidebar.php"); ?>
</div> </div> </div>
<?php include("includes/footer.php"); ?>

<script>
    $(document).ready(function() {
        $(function() {

            $(document)
                    .on('click.dropdown.data-api', clearMenus)
                    .on('click.dropdown touchstart.dropdown.data-api', '.dropdown form', function(e) {
                        e.stopPropagation()
                    })
                    .on('click.dropdown.data-api touchstart.dropdown.data-api', toggle, Dropdown.prototype.toggle)
                    .on('keydown.dropdown.data-api touchstart.dropdown.data-api', toggle + ', [role=menu]', Dropdown.prototype.keydown)

            $('html')
                    .on('click.dropdown.data-api', clearMenus)

            $('body')
                    .on('touchstart.dropdown', '.dropdown-menu', function(e) {
                        e.stopPropagation();
                    })
                    .on('touchstart.dropdown', '.dropdown-submenu', function(e) {
                        e.preventDefault();
                    });

            $('a.dropdown-toggle, .dropdown-menu a').on('touchstart', function(e) {
                e.stopPropagation();
            });


        });
    });
</script>

<!--








<div class="formEl_a">
    <form name="frm1" id="frm1" class="validateFormData" method="post" action="<?php @print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" enctype="multipart/form-data">
        <fieldset class="sepH_b">
            <legend> Hello </legend>
            <div class="sepH_b">
                <label for="a_text" class="lbl_a">Home Page Essay:</label>
                <input type="text" id="essay_homepage" name="essay_homepage" value="<?php echo @$essay_homepage; ?>" class="inpt_b datepicker" />
            </div>
            <div class="sepH_b">
                <label for="a_text" class="lbl_a">Home Page Essay:</label>
                <input type="text" id="timepicker" name="essay_homepage2" value="<?php echo @$essay_homepage2; ?>" class="inpt_b " />
            </div>
        </fieldset>
        <input type="submit" name="btnAdd" value="ADD" class="submitButton">
        <input type="reset" value="CLEAR ALL" class="submitButton">
        <input type="button" name="btnCancel" value="BACK" class="submitButton" onClick="javascript: window.location = '<?php echo @$page_name; ?>';">
    </form>
</div>

    





<script type="text/javascript" src="js/head.load.min.js"></script>
<link rel="stylesheet" href="lib/jquery-ui/css/custom-theme/jquery-ui-1.8.15.custom.css" type="text/css" />
<link rel="stylesheet" href="lib/timepicker-addon/jquery-ui-timepicker-addon.css" type="text/css" />
<script type="text/javascript">
head.js(
    "js/jquery-1.6.2.min.js",
    "lib/jquery-ui/jquery-ui-1.8.15.custom.min.js",
    "lib/timepicker-addon/jquery-ui-timepicker-addon.js",
    "js/lagu.js",
    function(){
        lga_datepicker.init();
        lga_datepicker_inline.init();
        lga_timepicker.init();
    }
)
</script>
<script type="text/javascript">
    head.js(
        "js/lagu.js",
        function() {
            $.datepicker.setDefaults({dateFormat: 'dd/mm/yy', showButtonPanel: true, changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true});
        }
    )
</script>-->
