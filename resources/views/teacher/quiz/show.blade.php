<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-10 rounded-lg shadow-lg sm:rounded-lg">
                    <div class="flex flex-col px-4 py-3 sm:px-6">
                        <div>
                            <h1 class="text-xl text-blue-600 font-bold uppercase">{{ $quiz->title }}</h1>
                            <a href="{{ route('quizzes.index') }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
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
                                    <b>Number of Takers</b>
                                    <span class="font-weight-bolder">{{ $quiz->details['joiner_count'] }}</span>
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
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm-rounded-lg">
                                    @if(count($quiz->topTen) > 0)
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Name</th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Score</th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Correct</th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Incorrect</th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($quiz->results as $topTen)
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $topTen->user->name }}</td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $topTen->score }}</td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $topTen->correct }}</td>
                                                <td class="px-6 py-4 text-right text-sm flex">{{ $topTen->wrong }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4"> No Results Found. </td>
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

