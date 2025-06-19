<div class="menuBox container py-2 {{ $class ?? '' }}">
    <a class="menuAnchor no-dec" href="
        @if(isset($nolog) && $nolog)
            {{ route(Str::beforeLast($activity, '_') . '.' . Str::afterLast($activity, '_')) }}
        @else
            {{ route('logit.' . $activity) }}
        @endif
        ">
        <img src={{ asset("images/menu_$icon.png") }} alt="Log a {{ $activity }}" class="img-fluid" />
        <div class="menuText"><span class="d-none d-md-inline">
            @if(isset($nolog) && $nolog)
                {{ Str::of($activity)->beforeLast('_')->ucfirst() }}</span>
                {{ Str::of($activity)->afterLast('_')->ucfirst() }}</div>
            @else
                Log a </span>{{ Str::ucfirst($activity) }}</div>
            @endif
    </a>
</div>
