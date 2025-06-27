<!-- Wide view -->
<div class="d-none d-sm-block">
    @if (session('success'))
        <div class="row alert alert-success">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif
    @foreach($tiles as $tile)
        @if($loop->first || $loop->iteration % 4 == 1)
            <div class="row py-2">
                <div class="col-2 col-lg-2 col-md-2 col-sm-2"></div>
        @endif
        <div class="col-2 col-lg-2 col-md-2 col-sm-2">
            <x-tile icon="{{ $tile['icon'] }}"
                activity="{{ $tile['activity'] }}"
                class="{{ $tile['class'] ?? '' }}"
                nolog="{{ $tile['nolog'] ?? false }}">
            </x-tile>
        </div>
        @if(($loop->iteration % 4 === 0) || $loop->last)
                <div class="col-2 col-lg-2 col-md-2 col-sm-2"></div>
            </div>
        @endif
    @endforeach
</div>

<!-- Narrow view -->
<div class="d-block d-sm-none">
    @if (session('success'))
        <div class="row alert alert-success">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif
    @foreach($tiles as $tile)
        @if($loop->iteration %2 == 1)
            <div class="row py-2">
                <div class="col-1"></div>
                <div class="col-5">
                    <x-tile icon="{{ $tile['icon'] }}"
                        activity="{{ $tile['activity'] }}"
                        class="{{ $tile['class'] ?? '' }}"
                        nolog="{{ $tile['nolog'] ?? false }}">
                    </x-tile>
                </div>
        @else
                <div class="col-5">
                    <x-tile icon="{{ $tile['icon'] }}"
                        activity="{{ $tile['activity'] }}"
                        class="{{ $tile['class'] ?? '' }}"
                        nolog="{{ $tile['nolog'] ?? false }}">
                    </x-tile>
                </div>
                <div class="col-1"></div>
            </div>
        @endif
    @endforeach
</div>