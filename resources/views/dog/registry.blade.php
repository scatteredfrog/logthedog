<x-master-layout>
    @section('content')
        <!-- If the nodog_message flashes, display it here.

        If the user has no dogs, they will see this message. -->
        @if (session('nodog_message'))
            <div class="row alert alert-danger">
                <h3>{{ session('nodog_message') }}
            </div>
        @endif
        <div class="row mt-5">
            <div class="container card col-md-6 mx-auto mt-5">
                <form method="post" action="{{ route('dog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center dogText">
                        <h3 class="mx-auto">Register a Dog</h3>
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
                            <table class="table table-striped table-borderless">
                                <tr>
                                    <td><label for="photo">Dog's photo</label></td>
                                    <td colspan=2>
                                        <input type="file"
                                            id="photo"
                                            name="photo"
                                            class="mb-3 form-control"
                                            accept="image/*"
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="name">Dog's name</label></td>
                                    <td>
                                        <input type="text" id="name" name="name" class="mb-3 form-control">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="gender">Gender</label></td>
                                    <td>
                                        <select id="gender" name="gender" class="mb-3 form-control">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="0">Female</option>
                                            <option value="1">Male</option>
                                        </select>
                                    </td>
                                    <td>
                                        <span id="spay" class="mx-2 my-2">Neutered / spayed?</span>
                                        <input type="checkbox" id="is_neutered" name="is_neutered" class=" darkBorder px-2 form-check-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="breed">Breed</label></td>
                                    <td><input type="text" id="breed" name="breed" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="color">Color</label></td>
                                    <td><input type="text" id="color" name="color" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="marks">Distinguishing marks or features</label></td>
                                    <td colspan=2><input type="text" id="marks" name="marks" class="mb-3 form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="weight">Weight</label></td>
                                    <td><input type="number" id="weight" name="weight" placeholder="(in pounds)" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="length">Length</label></td>
                                    <td><input type="number" id="length" name="length" placeholder="(in inches)" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="height">Height</label></td>
                                    <td><input type="number" id="height" name="height" placeholder="(in inches)" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="age">Age</label></td>
                                    <td><input type="number" id="age" name="age" placeholder="(in years)" class="mb-3 form-control"></td>
                                    <td></td>
                                <tr>
                                    <td><label for="birth_date">Birth date</label></td>
                                    <td><input type="date" id="birth_date" name="birth_date" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="gotcha_date">"Gotcha" date</label></td>
                                    <td><input type="date" id="gotcha_date" name="gotcha_date" class="mb-3 form-control"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label for="microchip_number">Microchip info</label></td>
                                    <td><input type="text" id="microchip_number" name="microchip_number" placeholder="Microchip number" class="mb-3 form-control"></td>
                                    <td><input type="text" id="chip_company" name="chip_company" placeholder="Microchip company" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="misc">Miscellaneous</label></td>
                                    <td colspan=2><input type="text" id="misc" name="misc" placeholder="(limit 255 characters)" class="mb-3 form-control"></td>
                                </tr>

                            </table>
                        </div>
                        <div class="container btn-group">
                            <button type="submit" class="btn btn-ltd mx-auto">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <script>
            // Change spayed/neutered verbiage based on selected gender.
            let gender = document.getElementById('gender');
            let spay = document.getElementById('spay');

            gender.addEventListener('change', function() {
                if (gender.value == 0) {
                    spay.textContent = 'Spayed?';
                } else {
                    spay.textContent = 'Neutered?';
                }
            });
        </script>
    @endsection
</x-master-layout>