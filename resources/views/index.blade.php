<x-master-layout>
    @section('content')
        @if(Auth::check())
            Dashboard coming soon!
        @else
            @include('auth.login')
        @endif
    @endsection
</x-master-layout>