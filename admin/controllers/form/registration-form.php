

                    <form class="form-signin" action="components/registration.php" method="post" autocomplete="off" onsubmit="return checkForm(this);">
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-normal tile">User Registration</h1>
                            <hr />
                        </div>

                        <div class="row">
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="First Name" id="user_firstname" name="user_firstname" required autofocus>
                                    <label for="user_firstname">First Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="Last Name" id="user_lastname" name="user_lastname" required>
                                    <label for="user_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                     <div class="row">     
                         <div class="col-lg-12">
                             <div class="form-label-group">
                                <input type="email" class="form-control" placeholder="Email Address" id="user_email" name="user_email" required>
                                <label for="user_email">Enter Email</label>
                            </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-12">
                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Username" id="user_name" name="user_name" required>
                                <label for="user_name"> Enter Username</label>
                            </div>

                        </div>
                    </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="password" class="form-control" placeholder="Password" id="user_password" name="user_password" required>
                                    <label for="user_password"> Enter Password</label>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="password" class="form-control" placeholder="Password" id="user_password2" name="user_password2" required>
                                    <label for="user_password2"> Confirm Password</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup_button">Sign up</button>
                                <p class="mt-5 mb-3 text-muted">Already Have an Account then Click <a class="logger" href="login.php">Here to Sign In</a></p>
                            </div>
                        </div>
                    </form>