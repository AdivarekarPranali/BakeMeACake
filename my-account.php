<?php require_once("includes/initialize.php");?>
<?php session_start();?>
<?php require_once('logincheck_customer.php');
	$customer_id = $_SESSION['sess_user_id'];
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
		 <!-- my account content section start -->
		<div class="shop-product-area">
            <div class="container">
                <div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<?php require_once('customer-sidebar.php');?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12">                    
                        <div class="area-title bdr">
                             <h2>My Account</h2>
                        </div>	
                        <div class="faq-accordion">
                            <div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed method" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Edit your account information <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" >
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>My Account Information</h2>
                                                <form class="form-horizontal" action="#">
                                                    <fieldset>
                                                        <legend>Your Personal Details</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Name </label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">E-Mail</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="email" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Contact</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="tel" >
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">
                                                        <div class="pull-left">
                                                            <a class="btn btn-default ce5" href="#">Back</a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change your password   <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>Change Password</h2>
                                                <form class="form-horizontal" action="#">
                                                    <fieldset>
                                                        <legend>Your Password</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" placeholder="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password Confirm</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" placeholder="password confirm">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">
                                                        <div class="pull-left">
                                                            <a class="btn btn-default ce5" href="#">Back</a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">Modify your address book entries   <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                        <div class="easy2">
                                            <h2>Address Book Entries</h2>
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <td class="text-left">
                                                        Farhana hayder (shuvo)
                                                        <br>
                                                        hastech
                                                        <br>
                                                        Road#1 , Block#c
                                                        <br>
                                                        Rampura.
                                                        <br>
                                                        Dhaka
                                                        <br>
                                                        Bangladesh
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-info g6" href="#">Edit</a>
                                                        <a class="btn btn-danger g6" href="#">Delete</a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="buttons clearfix">
                                                <div class="pull-left">
                                                    <a class="btn btn-default ce5" href="#">Back</a>
                                                </div>
                                                <div class="pull-right">
                                                    <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- my account  content section end -->
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>
