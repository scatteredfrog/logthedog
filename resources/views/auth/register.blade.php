<x-master-layout>
    @section('content')
        <div class="row mt-5">
            <div class="container card col-md-6 mx-auto mt-5">
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="card-header text-center dogText">
                        <h3 class="mx-auto">Create an Account</h3>
                    </div>
                    <div class="card-body form-group">
                        <input type="text" id="name" name="name" placeholder="Your name" class="mb-3 form-control">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input type="email" id="email" name="email" placeholder="E-mail address" class="mb-3 form-control">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input type="password" id="password" name="password" placeholder="Enter a password" class="mb-3 form-control">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input type="password" id="verify" name="verify" placeholder="Enter the password again" class="mb-3 form-control">
                        <div class="container btn-group">
                            <button type="submit" class="btn btn-ltd mx-auto">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    @endsection
</x-master-layout>