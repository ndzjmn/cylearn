<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($pages->count())
            @foreach ($pages as $item)
              @if ($item->slug == $current_path = Request::segment(2))
                  {{ $item->title }}
                  @endif
              @endforeach
          @endif
        </h2>
    </x-slot>

    <div class="py-12">
                @livewire('laboratory')
                    <!-- Footer -->
                    <div class="mt-10 bottom-0 text-center">
                    <h4 class="text-sm font-semibold text-gray-600 "> &COPY; CyLearn. All Rights Reserved 2021</h4>
                    </div>
    </div>
</x-app-layout>