<x-master-layout>
    @section('content')
        @php
            $language = auth()->user()->language_preference;
            switch ($language) {
                case '1':
                    $lang1 = 'went #1';
                    $lang2 = 'went #2';
                    break;
                case '2':
                    $lang1 = 'peed';
                    $lang2 = 'pooped';
                    break;
                default:
                    $lang1 = 'urinated';
                    $lang2 = 'defecated';
            }
        @endphp

        @if(session('error'))
            <div class="row alert alert-danger">
                <h3>{{ session('error') }}</h3>
            </div>
        @endif
        <div class="row mt-5">
            <div class="container card col-md-7 mx-auto mt-5">
                <form method="post" action="{{ route('logit.potty.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center dogText">
                        <h2 class="mx-auto">Log a Potty</h2>
                    </div>
                    <div class="card-body form-group">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    @if($dogs->count() > 1)
                                        <th></th>
                                    @endif
                                    <th>Dog</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dogs as $dog)
                                    <tr>
                                        @if($dogs->count() > 1)
                                            <td class="py-3">
                                                <input type="checkbox" name="dog_id[]" value="{{ $dog->id }}" class="form-check-input">
                                            </td>
                                        @else
                                            <input type="hidden" name="dog_id[]" value="{{ $dog->id }}">
                                        @endif
                                        <td class="py-3">{{ $dog->name }}</td>
                                        <td>
                                            <select name="potty_type[{{ $dog->id }}]"
                                                id="potty_type[{{ $dog->id }}]"
                                                class="form-control">
                                                <option value="" disabled selected>(select)</option>
                                                <option value="1">{{ $lang1 }}</option>
                                                <option value="2">{{ $lang2 }}</option>
                                            </select>
                                            @error('potty_type.' . $dog->id)
                                                <div class="alert alert-danger">Please select a valid potty type.</div>
                                            @enderror
                                        <td>
                                            @php
                                                $last_potty = '';
                                                $last_pee = \App\Models\Potty::getLastPotty($dog->id, 1);
                                                $last_poop = \App\Models\Potty::getLastPotty($dog->id, 2);
                                                if ($last_pee && $last_poop) {
                                                    $last_potty = "last $lang1 $last_pee,<br>";
                                                    $last_potty .= "last $lang2 $last_poop";
                                                } else if ($last_pee) {
                                                    $last_potty = "last $lang1 $last_pee";
                                                } else if ($last_poop) {
                                                    $last_potty = "last $lang2 $last_poop";
                                                }
                                            @endphp
                                            <div class="row">
                                                <input type="date" name="potty_date[{{ $dog->id }}]" class="form-control" value="{{ date('Y-m-d') }}">
                                            </div>
                                            @if($last_potty)
                                                <div class="row italicText">
                                                    {!! $last_potty !!}
                                                </div>
                                            @endif
                                            @error('potty_date.' . $dog->id)
                                                <div class="alert alert-danger">Please enter a valid date.</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="time" name="potty_time[{{ $dog->id }}]" class="form-control" value="{{ now()->format('H:i') }}">
                                            @error('potty_time.' . $dog->id)
                                                <div class="alert alert-danger">Please enter a valid time.</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="notes[{{ $dog->id }}]"
                                                class="form-control"
                                                maxlength="255"
                                                placeholder="(Optional)"
                                            >
                                            @error('notes.' . $dog->id)
                                                <div class="alert alert-danger">Notes cannot exceed 255 characters.</div>
                                            @enderror
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-ltd w-100">Log It!</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-master-layout>