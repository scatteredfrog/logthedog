    <div id="dog_container" class="container">
        <div id="logo" class="span12 no-select mx-auto">
            <img src="{{ asset('images/RuthieMusicSized75.png') }}" alt="Log the Dog Logo" class="mx-auto img-fluid" />
        </div>
    </div>

<div class="row py-3 justify-content-center">
    <div id="login_container" class="container col-md-6 col-lg-4 mx-auto">
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@domain.com" required>
            </div>
            <div class="form-group py-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="container btn-group py-2 mx-auto">
                <button type="submit" class="btn btn-ltd mx-auto">Log In</button>
        </form>
    </div>
</div>