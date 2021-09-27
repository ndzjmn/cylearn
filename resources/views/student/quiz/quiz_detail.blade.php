<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-10 rounded-lg shadow-lg">
                <h1 class="text-xl text-blue-600 font-bold uppercase">{{ $quiz->title }}</h1>
                <div class="mt-4 mb-10">
                  <p class="text-gray-600">
                    @if($quiz->finished_at)
                    <ul>
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-4">
                        Deadline:
                        <span class="font-bold text-red-600" title="{{ $quiz->finished_at }}">
                        {{ date('m/d/Y', strtotime($quiz->finished_at)) }}
                        ({{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "-" }})
                    </span>
                    </li>
                    </ul>
                </p>
                @endif

                    <ul class="list-group float-left">
                    <h4></h4>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Number of Questions</b>
                        <span class="font-weight-bolder">{{ $quiz->questions_count }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Average Score</b>
                        <span class="font-weight-bolder">{{ $quiz->details['average'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Total Points</b>
                        <span class="font-weight-bolder">100</span>
                    </li>
                    </ul>

            
                        @if($quiz->myResult)
                            <ul class="list-group float-right">
                                <h4 class="font-bold text-base underline">{{ Auth::user()->name."'s Record" }}</h4>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Score</b>
                                    <span class="font-weight-bolder">{{ $quiz->myResult->score }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Correct Answer</b>
                                    <span class="font-weight-bolder">{{ $quiz->myResult->correct }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Incorrect Answer</b>
                                    <span class="font-weight-bolder">{{ $quiz->myResult->wrong }}</span>
                                </li>
                            </ul>
                        @endif

                <br/>
                </div>
                <br/>
                <h3 class="text-xs uppercase font-bold">Quiz Description:</h3>
                <p class="mb-6">{{ $quiz->description }}</p>
                @if($quiz->myResult)
                    <div class="mb-4">
                        You completed the quiz on <b>{{ date('d/m/Y', strtotime($quiz->myResult->created_at)) }}</b>
                    </div>
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"> Click to see your answers</a>
                    &nbsp;
                    <a href="{{ route('quizzes', $quiz->slug) }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                @elseif($quiz->finished_at && $quiz->finished_at > now())
                    <div class="mb-4">
                        Quiz expire on <b>{{ date('d/m/Y', strtotime($quiz->created_at)) }}</b>
                        &nbsp;
                <a href="{{ route('quizzes', $quiz->slug) }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                    </div>
                @else
                <a href="{{ route('quiz.join', $quiz->slug) }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">Start Quiz</a>
                &nbsp;
                <a href="{{ route('quizzes', $quiz->slug) }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                @endif
              </div>
        </div>
    </div>
</x-app-layout>

