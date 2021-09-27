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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('lab-index')
                    <!-- Footer -->
                    <div class="mt-10 bottom-0 text-center">
                    <h4 class="text-sm font-semibold text-gray-600 "> &COPY; CyLearn. All Rights Reserved 2021</h4>
                    </div>
                </div>
                </div>
           </div> 
        </div>
    </div>
</x-app-layout>