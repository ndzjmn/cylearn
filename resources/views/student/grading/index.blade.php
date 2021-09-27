  
<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@1.1.0/dist/spruce.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <!-- The data table -->
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm-rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quiz Title</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Correct</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Incorrect</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if(count($results) >0)
                                        @foreach($results as $result)
                                            @foreach ($quizzes as $quiz)
                                                @if ($quiz->id == $result->quiz_id)
                                                    @if($result->user_id == Auth::user()->id)
                                                        <tr>
                                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $quiz->title }}</td>
                                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $result->score }}</td>
                                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $result->correct }}</td>
                                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $result->wrong }}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
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
    </div>
</x-student-layout>