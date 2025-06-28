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
                        <div class="row mb-3">
                            <div class="col-3">
                                Language Preference
                            </div>
                            <div class="col-4">
                                <input type="hidden"
                                    name="current_language_preference"
                                    id="current_language_preference"
                                    value="{{ $user->language_preference }}">
                                <select id="language_preference"
                                    name="language_preference"
                                    class="form-control">
                                    <option value="0"
                                        @selected($user->language_preference == 0) >
                                        Scientific (default)
                                    </option>
                                    <option value="1"
                                        @selected($user->language_preference == 1) >
                                        Numeric
                                    </option>
                                    <option value="2"
                                        @selected($user->language_preference == 2) >
                                        Slang
                                    </option>
                                </select>
                            </div>
                            <div class="col-5 pt-2">
                                Your dog will <span id="verbiage">
                                    @switch($user->language_preference)
                                        @case(0)
                                            urinate and defecate.
                                            @break
                                        @case(1)
                                            go #1 and #2.
                                            @break
                                        @case(2)
                                            pee and poop.
                                            @break
                                    @endswitch
                                </span>
                            </div>
                        </div>                        <div class="row">
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
        <script>
            // Get the dropdown element.
            const language_preference = document.getElementById('language_preference');
            // Get the dynamic text span element.
            const verbiage = document.getElementById('verbiage');
            // Trigger the appropriate verbiage for the chosen option.
            language_preference.addEventListener('change', function() {
                switch(language_preference.value) {
                    case '0':
                        verbiage.textContent = 'urinate and defecate.';
                        break;
                    case '1':
                        verbiage.textContent = 'go #1 and #2.';
                        break;
                    case '2':
                        verbiage.textContent = 'pee and poop.';
                        break;
                }
            });
        </script>
    @endsection
</x-master-layout>