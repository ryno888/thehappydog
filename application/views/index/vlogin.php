<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vlogin
 *
 * @author Ryno Laptop
 */

?>

<div class="container">    
    <div id="loginbox" name='loginbox' style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div class="login-forgot-password"><a href="#">Forgot password?</a></div>
            </div>     
            <div class="panel-body login-panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" name="loginform" class="form-horizontal" role="form">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" id="per_usernamme" name="per_usernamme" value="" placeholder="username or email">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="per_password" name="per_password" placeholder="password">
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <a id="btn-login" href="#" class="btn btn-default btn-sm loginSubmit" formTarget='loginform'>Login  </a>
                            <a id="btn-fblogin" href="#" class="btn btn-primary btn-sm">Login with Facebook</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div class="login-footer-wrapper" >
                                Don't have an account! 
                                <a href="#" class="login-signup-link">Sign Up Here</a>
                            </div>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>  
            <div class="panel-body" >
                <form id="signupform" name="signupform" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="icode" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="button" class="btn btn-default btn-sm"><i class="icon-hand-right"></i>Register</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div class="login-footer-wrapper" >
                                Go back to <a class="login-signup-link signin-link" href="#">Sign In</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>