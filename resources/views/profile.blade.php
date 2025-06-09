<x-master-layout>
    @section('content')
        <div class="row mt-5">
            <div class="container card col-md-6 mx-auto mt-5">
                <form method="post" action="{{ route('user.update', $user) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-center dogText">
                        <h3 class="mx-auto">User Profile: &nbsp; {{$user->first_name}} {{$user->last_name}}</h3>
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
                        <div class="row">
                            <div class="col-3">
                                First name:
                            </div>
                            <div class="col-9">
                                <input type="text" id="first_name" name="first_name" placeholder="Your first name" class="mb-3 form-control" value="{{ $user->first_name }}">
                                <input type="hidden" id="current_first_name" name="current_first_name" value="{{ $user->first_name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Last name:
                            </div>
                            <div class="col-9">
                                <input type="text" id="last_name" name="last_name" placeholder="Your last name" class="mb-3 form-control" value="{{ $user->last_name }}">
                                <input type="hidden" id="current_last_name" name="current_last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                E-mail:
                            </div>
                            <div class="col-9">
                                <input type="email" id="email" name="email" placeholder="E-mail address" class="mb-3 form-control" value="{{ $user->email }}">
                                <input type="hidden" id="current_email" name="current_email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Password:
                            </div>
                            <div class="col-9">
                                <input type="password" id="password" name="password" placeholder="Enter a password" class="mb-3 form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Confirm password:
                            </div>
                            <div class="col-9">
                                <input type="password" id="password-confirma" name="password_confirmation" placeholder="Enter the password again" class="mb-3 form-control">
                            </div>
                        </div>
                        <div class="container btn-group">
                            <button type="submit" class="btn btn-ltd mx-auto">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    @endsection
</x-master-layout>