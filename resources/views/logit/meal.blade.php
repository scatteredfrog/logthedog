<x-master-layout>
    @section('content')
        @if(session('error'))
            <div class="row alert alert-danger">
                <h3>{{ session('error') }}</h3>
            </div>
        @endif
        <div class="row mt-5">
            <div class="container card col-md-6 mx-auto mt-5">
                <form method="post" action="{{ route('logit.meal.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center dogText">
                        <h2 class="mx-auto">Log a Meal</h2>
                    </div>
                    <div class="card-body form-group">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Dog</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dogs as $dog)
                                    <tr>
                                        <td class="py-3">
                                            <input type="checkbox" name="dog_id[]" value="{{ $dog->id }}" class="form-check-input">
                                        </td>
                                        <td class="py-3">{{ $dog->name }}</td>
                                        <td>
                                            <input type="date" name="meal_date[{{ $dog->id }}]" class="form-control" value="{{ date('Y-m-d') }}">
                                            @error('meal_date.' . $dog->id)
                                                <div class="alert alert-danger">Please enter a valid date.</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="time" name="meal_time[{{ $dog->id }}]" class="form-control" value="{{ now()->format('H:i') }}">
                                            @error('meal_time.' . $dog->id)
                                                <div class="alert alert-danger">Please enter a valid time.</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" name="notes[{{ $dog->id }}]" class="form-control">
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