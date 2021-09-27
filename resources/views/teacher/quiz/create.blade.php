<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h5 class="">{{ __('quiz.createQuiz') }}
                        <a href="{{ route('quizzes.index') }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                    </h5>
                    <div class="w-full max-w-xl">
                        <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="{{ route('quizzes.store') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    {{ __('quiz.title') }}
                                </label>
                                <input class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ old('title') }}">
                                @error('title')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                @enderror
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                {{ __('quiz.description') }}
                            </label>
                            <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('description') is-invalid @enderror" id="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                            @enderror
                          </div>

                          <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lesson">
                                        {{ __('Assigned Lesson') }}
                                    </label>
                                        <select name="lesson_id" x-model="lesson_id" id="lesson_id" class="block mt-1 w-full border-black focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            @foreach ($pages as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>

                                        <label>
                                            <input class="form-checkbox" type="checkbox" value="yes" wire:model="for_lab" id="for_lab" name="for_lab"/>
                                            <span class="ml-2 text-sm text-gray-600"> For Laboratory </span>
                                        </label>

                                        <p id="demo" class="ml-2 text-sm text-red-600"></p>
                          </div>

                          <div class="mb-6">
                            <label>{{ __('quiz.finished_at') }}</label>
                            <div>
                                <div class="inline">
                                    <input class="isFinished" type="radio" name="isFinished" id="isFinished1" {{ old('isFinished') == "yes" ? "checked" : "" }} value="yes">
                                    <label class="inline" for="isFinished1">{{ __('general.available') }}</label>
                                </div>
                                <div class="inline">
                                    <input class="isFinished" type="radio" name="isFinished" {{ old('isFinished') == "no" ? "checked" : "" }} id="isFinished2" value="no">
                                    <label class="inline" for="isFinished2">{{ __('general.unavailable') }}</label>
                                </div>
                            </div>
                            <div class="{{ old('isFinished') == "yes" ? "block" : "hidden" }}" id="finish_date">
                                <label for="finished_at">End Date</label>
                                <input type="datetime-local" class="@error('finished_at') is-invalid @enderror" name="finished_at" id="finished_at" value="{{ old('finished_at') }}">
                                @error('finished_at')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <br/>
                                    <x-jet-button>
                                        <i class="fa fa-check"></i>  {{ __('general.create') }}
                                    </x-jet-button> 
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
                $('.isFinished').change(function () {
                    const isFinished = $(this).attr('value');
                    const finish_date = $('#finish_date');

                    if(isFinished === "yes"){
                        finish_date.removeClass("hidden");
                        finish_date.addClass("block");
                    }else{
                        finish_date.removeClass("block");
                        finish_date.addClass("hidden");
                    }
                })
            })

            const checkbox = document.getElementById('for_lab')

            checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                document.getElementById("demo").innerHTML = "Change the quiz title into this format: '[Quiz Title] - Lab Assessment.'";
            } else {
                document.getElementById("demo").innerHTML = "";
            }
            })
        </script>
</x-app-layout>

