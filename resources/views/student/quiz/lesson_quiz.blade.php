<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-start px-4 py-3 sm:px-6">
                        @foreach ($quizzes as $quiz)
                            @if ($pages->count())
                                @foreach ($pages as $item)
                                    @if ($item->slug == $current_path = Request::segment(3))
                                        @if ($item->title == $quiz->title)
                                            <div class="w-96 m-2 h-96 rounded shadow-md justify-around bg-gray-200 flex flex-col border-box p-4">
                                                <p class="text-blue-800 uppercase text-sm"> {{  $quiz->title  }}</p>
                                                <p class="text-2xl font-bold uppercase my-4">{{ Str::limit($quiz->description, 50) }}</p>
                                                <small class="" title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? __('quiz.finished_at') . ': ' . $quiz->finished_at->diffForHumans() : "" }}</small>
                                                <p class="text-sm uppercase text-gray-900">{{ __('quiz.questionCount').": ".$quiz->questions_count }}</p>
                                                <div class="flex flex-row">
                                                    <a class="bg-blue-700 px-4 py-2 rounded uppercase font-bold text-sm text-white" href="{{ route('quiz.detail', $quiz->slug) }}">Start</a>
                                                </div>
                                            </div>
                                       @endif
                                    @endif
                                @endforeach
                                    
                                @else
                                <p class="text-blue-800 uppercase text-sm">No quiz found.</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

