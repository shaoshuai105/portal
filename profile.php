<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";
include "includes/db-connect.php";

if (isset($_POST['email'])){
    $sql = "UPDATE users SET user_name='".$_POST['name']."',user_email='".$_POST['email']."',user_password='".$_POST['password']."',accountid='".$_POST['accountid']."' WHERE no=".$_SESSION['user_info']['no'];

    $result = mysqli_query($link,$sql);

session_destroy();
        //header("location:profile.php");

}
$sql = "SELECT * FROM users WHERE no =".$_SESSION['user_info']['no'];
$result = mysqli_query($link,$sql);
$user_data = mysqli_fetch_assoc($result);

?>

<section id="content">
    <div class="page profile-page">
        <!-- page content -->
        <div class="pagecontent">
            <!-- row -->
            <div class="row">
<!--                <div class="col-md-12">-->
<!--                    <section class="boxs">-->
<!--                        <div class="profile-header">-->
<!--                            <div class="profile_info">-->
<!--                                <div class="profile-image">-->
<!--                                    <img src="assets/images/profile-photo.jpg" alt="">-->
<!--                                </div>-->
<!--                                <h4 class="mb-0"><strong>Alexander</strong></h4>-->
<!--                                <span class="text-muted"></span>-->
<!---->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </section>-->
<!--                </div>-->

                <div class="col-md-12 col-sm-12">
                    <section class="boxs boxs-simple">
                        <div class="boxs-body p-0">
                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark-t" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#setting" role="tab" data-toggle="tab">General Settings</a>
                                    </li>
<!--                                    <li role="presentation">-->
<!--                                        <a href="#privilege" role="tab" data-toggle="tab">Privileges and Notifications</a>-->
<!--                                    </li>-->
<!--                                    <li role="presentation">-->
<!--                                        <a href="#changepassword" role="tab" data-toggle="tab">Change Password</a>-->
<!--                                    </li>-->

                                </ul>
                                <div class="tab-content">
<!--                                    <div role="tabpanel" class="tab-pane" id="privilege">-->
<!--                                        <div class="wrap-reset">-->
<!---->
<!--                                            <form class="profile-settings">-->
<!--                                                <span><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;Note:Items with a lock icon can only be enabled by an administrator</span>-->
<!--                                                    <div class="panel-body">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <div class="row">-->
<!--                                                                <label class="col-xs-8"><b>Admin Privilege</b><br>-->
<!--                                                                    <span>Invite Users to the firm's Litfy account,assign,user roles,and remove users from the firm.</span>-->
<!--                                                                </label>-->
<!---->
<!--                                                                <div class="col-xs-4 control-label">-->
<!--                                                                    <div class="togglebutton">-->
<!--                                                                        <label>-->
<!--                                                                            <input type="checkbox" checked="">-->
<!--                                                                        </label>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="form-group">-->
<!--                                                            <div class="row">-->
<!--                                                                <label class="col-xs-8"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Primary Contact</b><br>-->
<!--                                                                    <span>Show your contact information as a primary contact for referrals.</span>-->
<!--                                                                </label>-->
<!---->
<!--                                                                <div class="col-xs-4 control-label">-->
<!--                                                                    <div class="togglebutton">-->
<!--                                                                        <label>-->
<!--                                                                            <input type="checkbox" disabled>-->
<!--                                                                        </label>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="form-group">-->
<!--                                                            <div class="row">-->
<!--                                                                <label class="col-xs-8"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Referral Management</b><br>-->
<!--                                                                    <span>Assign attorneys to incoming referrals</span>-->
<!--                                                                </label>-->
<!---->
<!--                                                                <div class="col-xs-4 control-label">-->
<!--                                                                    <div class="togglebutton">-->
<!--                                                                        <label>-->
<!--                                                                            <input type="checkbox" disabled>-->
<!--                                                                        </label>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="form-group">-->
<!--                                                            <div class="row">-->
<!--                                                                <label class="col-xs-8"><b>Receive Referrals</b><br>-->
<!--                                                                    <span>Other firms can send you referrals.</span>-->
<!--                                                                </label>-->
<!---->
<!--                                                                <div class="col-xs-4 control-label">-->
<!--                                                                    <div class="togglebutton">-->
<!--                                                                        <label>-->
<!--                                                                            <input type="checkbox" checked="">-->
<!--                                                                        </label>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="form-group">-->
<!--                                                            <div class="row">-->
<!--                                                                <label class="col-xs-8"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>BCC on All Referral Emails</b><br>-->
<!--                                                                    <span>Be BCC'ed on all incoming and outgoing Litify Referral Network emails</span>-->
<!--                                                                </label>-->
<!---->
<!--                                                                <div class="col-xs-4 control-label">-->
<!--                                                                    <div class="togglebutton">-->
<!--                                                                        <label>-->
<!--                                                                            <input type="checkbox" disabled>-->
<!--                                                                        </label>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                <div class="form-group col-sm-12">-->
<!--                                                    <button class="btn btn-raised btn-primary">Save</button>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div role="tabpanel" class="tab-pane" id="changepassword">-->
<!--                                        <div class="wrap-reset">-->
<!--                                            <form class="profile-settings">-->
<!---->
<!--                                                <div class="row">-->
<!---->
<!--                                                    <div class="form-group col-sm-12">-->
<!--                                                        <label for="password">Current Password</label>-->
<!--                                                        <input type="password" class="form-control" id="password" value="secretpassword" readonly>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="row">-->
<!--                                                    <div class="form-group col-sm-6">-->
<!--                                                        <label for="new-password">New Password</label>-->
<!--                                                        <input type="password" class="form-control" id="new-password">-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group col-sm-6">-->
<!--                                                        <label for="new-password-repeat">Confirm New Password </label>-->
<!--                                                        <input type="password" class="form-control" id="cpassword">-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group col-sm-12">-->
<!--                                                        <button class="btn btn-raised btn-primary">Update Password</button>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div role="tabpanel" class="tab-pane active" id="setting">
                                        <div class="wrap-reset">
                                            <form class="profile-settings" action="profile.php" method="post">

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4>
                                                            <strong>Account</strong> Settings</h4>
                                                        <p>Your personal account settings</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" name="no" value="<?php echo $user_data['no']?>">
                                                    <div class="form-group col-sm-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $user_data['user_name']?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['user_email']?>">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $user_data['user_password']?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="accountid">AccountId</label>
                                                        <input type="text" class="form-control" id="accoutid" name="accountid" value="<?php echo $user_data['accountid']?>">
                                                    </div>

                                                </div>
                                                <hr>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-raised btn-primary">Update Settings</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /boxs body -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<?php
    include "includes/footer.php";
?>
