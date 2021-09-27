<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('question.questionList') }}
        </h2>
        <a href="{{ route('quizzes.index') }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h5 class="float-left">{{ __('question.createQuestion') }}</h5>
                    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                        <a href="{{ route('questions.create', $quiz->id) }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
                            <i class="fa fa-plus"></i> {{ __('question.createQuestion') }}
                        </a>
                    </div>
                    @if(count($quiz->questions) != 0)
                    <div class="mt-2">
                        <table class="max-w-6xl mx-auto table-auto border border-black-700">
                            <thead>
                                <tr>
                                  <th class="px-8 py-2">#</th>
                                  <th class="px-8 py-2">{{ __('question.question') }}</th>
                                  <th class="px-8 py-2">{{ __('question.answer') }}-1</th>
                                  <th class="px-8 py-2">{{ __('question.answer') }}-2</th>
                                  <th class="px-8 py-2">{{ __('question.answer') }}-3</th>
                                  <th class="px-8 py-2">{{ __('question.answer') }}-4</th>
                                  <th class="px-8 py-2">{{ __('question.correctAnswer') }}</th>
                                  <th class="px-8 py-2">{{ __('quiz.actions') }}</th>
                                </tr>
                              </thead>
                            <tbody>
                                @foreach($quiz->questions as $question)
                                    <tr>
                                        <td class="text-center">{{ $question->id }}</td>
                                        <td class="text-center">{{ $question->question }}</td>
                                        <td class="text-center">{{ $question->answer1 }}</td>
                                        <td class="text-center">{{ $question->answer2 }}</td>
                                        <td class="text-center">{{ $question->answer3 }}</td>
                                        <td class="text-center">{{ $question->answer4 }}</td>
                                        <td class="text-center font-weight-bold">{{ $question->{$question->correct_answer} }}</td>
                                        <td class="text-center py-2">
                                            <div class="btn-group">
                                                @if($question->image)
                                                    <a title="Delete Image" data-url="{{ route('questions.deleteImage', [$quiz->id, $question->id]) }}" class="inline bg-red-700 hover:bg-red-900 text-white font-bold rounded p-1 mr-1 delete-confirm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                          </svg>
                                                    </a>
                                                @endif
                                                <a href="{{ route('questions.edit', [$quiz->id, $question->id]) }}" class="inline bg-blue-300 hover:bg-blue-500 text-white font-bold rounded p-1 mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                      </svg>
                                                </a>
                                                <a data-url="{{ route('questions.destroy', [$quiz->id, $question->id]) }}" class="inline bg-red-700 hover:bg-red-900 text-white font-bold rounded p-1 mr-1 delete-confirm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                      </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $quiz['questions']->links() }}
                        </div>
                    </div>  
                    @else
                    <div class="alert alert-warning text-center mt-4"><i class="fa fa-info-circle"></i> {{ __('general.noContentAdded') }}</div>
                    @endif  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

