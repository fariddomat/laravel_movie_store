<div class="w3_agilits_banner_bootm">
    <div class="w3_agilits_inner_bottom">
        <div class="col-md-6 wthree_agile_login">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i> (+1) 999 999 9999</li>
                @guest
                <li><a href="#" class="login" data-toggle="modal" data-target="#myModal4">Login</a></li>
                <li><a href="#" class="login reg" data-toggle="modal" data-target="#myModal5">Register</a></li>
                @endguest

            </ul>
        </div>
    </div>
</div>

<!--//banner-bottom-->
    <!-- Modal1 -->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog">

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Login</h4>
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post" id="loginForm">
                            @csrf
                            <input type="email" name="email" placeholder="E-mail" required="" class=" @error('email') is-invalid @enderror">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password" required="">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="tp">
                                <input type="submit" value="LOGIN NOW">
                            </div>
                            <div class="forgot-grid">
                                <div class="log-check">
                                    <label class="checkbox"><input type="checkbox" name="checkbox">Remember
                                        me</label>
                                </div>
                                <div class="forgot">
                                    <a href="#" data-toggle="modal" data-target="#myModal2">Forgot Password?</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Modal1 -->

     <!-- Modal1 -->
     <div class="modal fade" id="myModal5" tabindex="-1" role="dialog">

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Register</h4>
                    <div class="login-form">
                        <form  action="{{ route('register') }}" method="post" id="registerForm">
                            @csrf
                            <input type="text" name="name" placeholder="Name" required="">
                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                            <input type="email" name="email" placeholder="E-mail" required="">
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                            <input type="password" name="password" placeholder="Password" required="">
                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                            <input  id="password-confirm" type="password" class="" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                            <div class="signin-rit">
                                <span class="agree-checkbox">
                                    <label class="checkbox"><input type="checkbox" name="checkbox">I agree to your
                                        <a class="w3layouts-t" href="#" target="_blank">Terms of Use</a> and <a
                                            class="w3layouts-t" href="#" target="_blank">Privacy Policy</a></label>
                                </span>
                            </div>
                            <div class="tp">
                                <input type="submit" value="REGISTER NOW">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Modal1 -->
