<div id="dog_container" class="container">
    <div id="logo" class="span12 no-select mx-auto">
        <img src="{{ asset('images/RuthieMusicSized75.png') }}" alt="Log the Dog Logo" class="mx-auto img-fluid" />
    </div>
</div>

<div class="row py-5 justify-content-center">
    <div id="login_container" class="bg-warning py-3 px-5 card container col-md-6 col-lg-4 mx-auto">
        <form method="post" action="">
            @csrf
            <div class="card-header text-center dogText"><h3>Log In</h3></div>
            <div class="card-body bg-transparent">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail address" required>
                </div>
                <div class="form-group py-2">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group text-center mt-2">
                    Forgot your password? Click here!
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group btn-group container mt-1">
                    <a href="" class="btn btn-dtl mx-auto">Sign Up</a>
                    <button type="submit" class="btn btn-ltd mx-auto">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>