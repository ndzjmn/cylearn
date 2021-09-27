<div>
    @livewire('navigation-menu')
    <div class="border p-5 bg-white"> {{ $title }}</div>
    <br/>
    <div>
        <div class="text-center">
            {!! $content !!}
        </div>
    </div>
    <br/>
    @if($slug == $current_path = Request::segment(2))
        @livewire('videos')
    @else
    <h4 class="text-center px-6 py-4 text-sm whitespace-no-wrap"> No Additional Contents Found. </h4>
    @endif
</div>

<script>
    window.speechSynthesis.cancel();
</script>