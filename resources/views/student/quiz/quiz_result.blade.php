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

                    <div class="bg-green-500 text-green-900 font-bold py-2 px-4 mt-6 rounded"><p class="text-lg font-bold text-center">Your Score: {{ $quiz->myResult->score }}/100</p></div>

                    @foreach($quiz->questions as $question)
                        <div class="text-lg font-bold mt-6">
                            {{ __('question.question')."-".$loop->iteration.")" }} {{ $question->question }}
                            @if($question->myAnswer->answer === $question->correct_answer)<svg class="h-7 w-7 float-left" fill="none" viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg> @else <svg class="h-7 w-7 float-left" fill="none" viewBox="0 0 24 24" stroke="red">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg> @endif
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
                                    <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}1" type="radio" value="answer1" aria-label="{{ $question->answer1 }}" required @if($question->myAnswer->answer === "answer1") checked @else disabled @endif>
                                    <label class="form-check-label ml-3 @if($question->correct_answer === "answer1" || $question->myAnswer->answer === $question->correct_answer && $question->myAnswer->answer === "answer1") font-weight-bold text-success @else text-danger @endif" for="answer{{ $question->id }}1">{{ $question->answer1 }}</label>
                                </li>
                                <li class="list-group-item border-0">
                                    <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}2" type="radio" value="answer2" aria-label="{{ $question->answer2 }}" required @if($question->myAnswer->answer === "answer2") checked @else disabled @endif>
                                    <label class="form-check-label ml-3 @if($question->correct_answer === "answer2" || $question->myAnswer->answer === $question->correct_answer && $question->myAnswer->answer === "answer2") font-weight-bold text-success @else text-danger @endif" for="answer{{ $question->id }}2">{{ $question->answer2 }}</label>
                                </li>
                                <li class="list-group-item border-0">
                                    <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}3" type="radio" value="answer3" aria-label="{{ $question->answer3 }}" required @if($question->myAnswer->answer === "answer3") checked @else disabled @endif>
                                    <label class="form-check-label ml-3 @if($question->correct_answer === "answer3" || $question->myAnswer->answer === $question->correct_answer && $question->myAnswer->answer === "answer3") font-weight-bold text-success @else text-danger @endif" for="answer{{ $question->id }}3">{{ $question->answer3 }}</label>
                                </li>
                                <li class="list-group-item border-0">
                                    <input class="form-check-input" name="{{ $question->id }}" id="answer{{ $question->id }}4" type="radio" value="answer4" aria-label="{{ $question->answer4 }}" required @if($question->myAnswer->answer === "answer4") checked @else disabled @endif>
                                    <label class="form-check-label ml-3 @if($question->correct_answer === "answer4" || $question->myAnswer->answer === $question->correct_answer && $question->myAnswer->answer === "answer4") font-weight-bold text-success @else text-danger @endif" for="answer{{ $question->id }}4">{{ $question->answer4 }}</label>
                                </li>
                            </ul>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

