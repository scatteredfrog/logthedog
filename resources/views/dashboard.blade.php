<!-- Wide view -->
<div class="d-none d-sm-block">
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
    <div class="row py-2">
        <div class="col-1"></div>
        <div class="col-5">
            <x-tile icon="feed"
                activity="meal"
                class="">
            </x-tile>
        </div>
        <div class="col-5">
            <x-tile icon="dogwalk"
                activity="walk"
                class="walkBox">
            </x-tile>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row py-2">
        <div class="col-1"></div>
        <div class="col-5">
            <x-tile icon="potty"
                activity="potty"
                class="pottyBox">
            </x-tile>
        </div>
        <div class="col-5">
            <x-tile icon="treat"
                activity="treat"
                class="treatBox">
            </x-tile>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row py-2">
        <div class="col-1"></div>
        <div class="col-5">
            <x-tile icon="meds"
                activity="med"
                class="medBox">
            </x-tile>
        </div>
        <div class="col-5">
            <x-tile icon="bath"
                activity="bath"
                class="bathBox">
            </x-tile>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row py-2">
        <div class="col-1"></div>
        <div class="col-5">
            <x-tile icon="registry"
                activity="dog_registry"
                class="registerBox"
                nolog=true>
            </x-tile>
        </div>
        <div class="col-5">
            <x-tile icon="kwik"
                activity="fast_glance"
                class="quickBox"
                nolog=true>
            </x-tile>
        </div>
        <div class="col-1"></div>
    </div>
</div>