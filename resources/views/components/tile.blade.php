<div class="menuBox container py-2 {{ $class ?? '' }}">
    <a class="menuAnchor no-dec" href="
        @if(isset($nolog))
            {{ route(Str::beforeLast($activity, '_') . '.' . Str::afterLast($activity, '_')) }}
        @else
            {{ route('logit.' . $activity) }}
        @endif
        ">
        <img src={{ asset("images/menu_$icon.png") }} alt="Log a {{ $activity }}" class="img-fluid" />
        <div class="menuText"><span class="d-none d-sm-inline">
            @if(!isset($nolog))
                Log a </span>{{ Str::ucfirst($activity) }}</div>
            @else
                {{ Str::of($activity)->beforeLast('_')->ucfirst() }}</span>
                {{ Str::of($activity)->afterLast('_')->ucfirst() }}</div>
            @endif
    </a>
</div>
