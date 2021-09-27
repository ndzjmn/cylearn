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
                    <div class="flex items-center px-4 py-3 text-right sm:px-6">
                        <form method="get" class="w-full max-w-3xl">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="title" placeholder="Quiz" value="{{ request()->get('title') }}">
                                </div>
                                <div class="w-full md:w-1/3 px-3">
                                    <select name="status" onchange="this.form.submit()" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option value="">Please select status</option>
                                        <option value="draft" @if(request()->get('status') == "draft") selected @endif>{{ __('quiz.draft') }}</option>
                                        <option value="published" @if(request()->get('status') == "published") selected @endif>{{ __('quiz.published') }}</option>
                                        <option value="unpublished" @if(request()->get('status') == "unpublished") selected @endif>{{ __('quiz.unpublished') }}</option>
                                    </select>
                                </div>
                                @if(request()->get('title') || request()->get('status'))
                                    <div class="w-full md:w-1/3 px-4 py-3 sm:px-6 items-center">
                                        <a href="{{ route('quizzes.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            {{ __('quiz.clearForm') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>

                        {{-- Create Quiz button --}}
                        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6 ml-40">
                            <x-jet-button>
                                <a href="{{ route('quizzes.create') }}">
                                    {{ __('quiz.createQuiz') }}
                                </a>
                            </x-jet-button>
                        </div>

                    </div>
                    <div class="mt-2">
                        <table class="max-w-6xl mx-auto table-auto border border-black-700">
                            <thead>
                                <tr>
                                  <th class="px-16 py-2">#</th>
                                  <th class="px-16 py-2">Quiz</th>
                                  <th class="px-16 py-2">{{ __('quiz.questionCount') }}</th>
                                  <th class="px-16 py-2">{{ __('quiz.status') }}</th>
                                  <th class="px-16 py-2">{{ __('quiz.finished_at') }}</th>
                                  <th class="px-16 py-2">{{ __('quiz.actions') }}</th>
                                </tr>
                              </thead>
                            <tbody>
                                @if(count($quizzes) != 0)

                                @foreach($quizzes as $quiz)
                                    <tr>
                                        <td class="text-center">{{ $quiz->id }}</td>
                                        <td class="text-center">{{ $quiz->title }}</td>
                                        <td class="text-center">{{ $quiz->questions_count }}</td>
                                        <td class="text-center">
                                            @if($quiz->finished_at)
                                                @if($quiz->finished_at < now())
                                                    <span class="font-weight-bolder text-danger">Expired</span>
                                                @else
                                                    <span class="font-weight-bolder">{{ __("quiz.$quiz->status")  }}</span>
                                                @endif
                                            @else
                                                <span class="font-weight-bolder">{{ __("quiz.$quiz->status")  }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span title="{{ $quiz->finished_at }}">
                                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "-" }}
                                            </span>
                                        </td>
                                        <td class="text-center py-2">
                                            <div class="">
                                                <a href="{{ route('quizzes.detail', $quiz->id) }}" class="inline bg-blue-700 hover:bg-blue-900 text-white font-bold rounded px-1 py-1 mr-1" alt="View Quiz Details"  title="View Quiz Details">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                </a>
                                                <a href="{{ route('questions.index', $quiz->id) }}" class="inline bg-yellow-700 hover:bg-yellow-900 text-white font-bold rounded px-1 py-1 mr-1"  alt="View Questions" title="View Questions">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                </a>
                                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="inline bg-blue-300 hover:bg-blue-500 text-white font-bold rounded px-1 py-1 mr-1"  alt="Edit Quiz" title="Edit Quiz">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                      </svg>
                                                </a>
                                                <button type="button" onclick="openModal('mymodalcenteredcreds')"><a class="inline bg-red-700 hover:bg-red-900 text-white font-bold rounded px-1 py-1 mr-1 delete-confirm" alt="Delete Quiz" title="Delete Quiz">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                      </svg>
                                                </a></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
        
                            @else
                                <tr aria-colspan="6">
                                    <div class="alert alert-warning text-center mt-4">
                                        <i class="fa fa-info-circle"></i> {{ __('general.noContentAdded') }}
                                    </div>
                                </tr>
                            @endif
                            </tbody>
                            </tbody>
                        </table>
                        <!-- modal button dialog for delete quiz-->
                        <dialog id="mymodalcenteredcreds" class="bg-transparent z-0 relative w-screen h-screen">
                            <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                                <div class="bg-white flex rounded-lg relative">
                                    <div class="flex flex-col items-start">
                                        <div class="p-7 flex items-center w-full">
                                            <div class="text-gray-900 font-bold text-lg">Delete Quiz</div>
                                            <svg onclick="modalClose('mymodalcenteredcreds')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                            </svg>
                                        </div>

                                        <div class="px-4 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
                                            <p>Are you sure you want to delete this quiz? </p>
                                        </div>
                                        <div class="p-7 flex justify-end items-center w-full">
                                            <button type="button" class="bg-red-600 hover:bg-gray-500 text-white font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                                    <a href="{{ route('quizzes.destroy', $quiz->id) }}">Yes</a>
                                            </button>
                                            &nbsp;
                                            <button type="button" onclick="modalClose('mymodalcenteredcreds')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </dialog> <!-- end of modal dialog -->
                    </div>  
                    <br/> 
                    {{ $quizzes->links() }} 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    //modals
    function openModal(key) {
        document.getElementById(key).showModal(); 
        document.body.setAttribute('style', 'overflow: hidden;'); 
        document.getElementById(key).children[0].scrollTop = 0; 
        document.getElementById(key).children[0].classList.remove('opacity-0'); 
        document.getElementById(key).children[0].classList.add('opacity-100')
    }

    function modalClose(key) {
        document.getElementById(key).children[0].classList.remove('opacity-100');
        document.getElementById(key).children[0].classList.add('opacity-0');
        setTimeout(function () {
            document.getElementById(key).close();
            document.body.removeAttribute('style');
        }, 100);
    }
</script>