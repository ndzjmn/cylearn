<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($quiz->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h5 class="">{{ $quiz->title }}
                        <a href="{{ route('quiz.detail', $quiz->slug) }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                    </h5>
                    <div class="w-full max-w-xl">
                        <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="{{ route('quiz.result', $quiz->slug) }}" method="post">
                            @csrf
                            @foreach ($quiz->questions as $question)
                            <div class="text-lg font-bold mt-6">
                                {{ __('question.question')." ".$loop->iteration.":" }} <br/> {{ $question->question }}
                            </div>
                                @if($question->image)
                                    <div class="d-flex justify-content-center my-3">
                                        <a href="{{ asset($question->image) }}" class="popup">
                                            <img src="{{ asset($question->image) }}" class="img-fluid" width="500" alt="">
                                        </a>
                                    </div>
                                @endif
                                <div class="mb-6 mt-4 ">
                                    <ul class="list-group-flush">
                                        <li class="list-group-item border-0">
                                            <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}1" type="radio" value="answer1" aria-label="{{ $question->answer1 }}" required>
                                            <label class="form-check-label ml-3" for="answer{{ $question->id }}1">{{ $question->answer1 }}</label>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}2" type="radio" value="answer2" aria-label="{{ $question->answer2 }}" required>
                                            <label class="form-check-label ml-3" for="answer{{ $question->id }}2">{{ $question->answer2 }}</label>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}3" type="radio" value="answer3" aria-label="{{ $question->answer3 }}" required>
                                            <label class="form-check-label ml-3" for="answer{{ $question->id }}3">{{ $question->answer3 }}</label>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}4" type="radio" value="answer4" aria-label="{{ $question->answer4 }}" required>
                                            <label class="form-check-label ml-3" for="answer{{ $question->id }}4">{{ $question->answer4 }}</label>
                                        </li>
                                    </ul>
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                            
                            <div class="mb-4">
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-check"></i>Submit</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

