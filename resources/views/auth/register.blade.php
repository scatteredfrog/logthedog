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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="text" id="first_name" name="first_name" placeholder="Your first name" class="mb-3 form-control">
                        <input type="text" id="last_name" name="last_name" placeholder="Your last name" class="mb-3 form-control">
                        <input type="email" id="email" name="email" placeholder="E-mail address" class="mb-3 form-control">
                        <input type="password" id="password" name="password" placeholder="Enter a password" class="mb-3 form-control">
                        <input type="password" id="password-confirma" name="password_confirmation" placeholder="Enter the password again" class="mb-3 form-control">
                        <div class="container btn-group">
                            <button type="submit" class="btn btn-ltd mx-auto">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    @endsection
</x-master-layout>