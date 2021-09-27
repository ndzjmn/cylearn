<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('question.editQuestion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h5 class="">{{ __('question.editQuestion') }}
                        <a href="{{ route('questions.index', $question->quiz_id) }}" class="float-right bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"><i class="fa fa-arrow-left"></i> {{ __('general.goBack') }}</a>
                    </h5>
                    <div class="w-full max-w-xl">
                        <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="question">{{ __('question.question') }}</label>
                                <textarea name="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('question') is-invalid @enderror" id="question" rows="3">{{ old('question') ?? $question->question }}</textarea>
                                @error('question')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">{{ __('general.image') }}</label>
                                @if($question->image != "")
                                    <div class="w-25 mb-4">
                                        <a href="{{ asset($question->image) }}" class="popup">
                                            <img src="{{ asset($question->image) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                @endif
                                <input type="file" class="form-control-file @error('question') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="grid grid-flow-row grid-cols-2 grid-rows-2 gap-4">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer1">{{ __('question.answer') }}-1</label>
                                    <textarea name="answer1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline   @error('answer1') is-invalid @enderror" id="answer1" cols="3">{{ old('answer1') ?? $question->answer1 }}</textarea>
                                    @error('answer1')
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer2">{{ __('question.answer') }}-2</label>
                                    <textarea name="answer2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline   @error('answer2') is-invalid @enderror" id="answer2" cols="3">{{ old('answer2') ?? $question->answer2 }}</textarea>
                                    @error('answer2')
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer3">{{ __('question.answer') }}-3</label>
                                    <textarea name="answer3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline   @error('answer3') is-invalid @enderror" id="answer3" cols="3">{{ old('answer3') ?? $question->answer3 }}</textarea>
                                    @error('answer3')
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer4">{{ __('question.answer') }}-4</label>
                                    <textarea name="answer4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline   @error('answer4') is-invalid @enderror" id="answer4" cols="3">{{ old('answer4') ?? $question->answer4 }}</textarea>
                                    @error('answer4')
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="correct_answer">{{ __('question.correctAnswer') }}</label>
                                <select class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="correct_answer" id="correct_answer">
                                    <option value="answer1" @if(old('correct_answer')){{ old('correct_answer') == "answer1" ? "selected" : "" }}@else{{ $question->correct_answer == "answer1" ? "selected" : "" }}@endif>{{ __('question.answer') }}-1</option>
                                    <option value="answer2" @if(old('correct_answer')){{ old('correct_answer') == "answer2" ? "selected" : "" }}@else{{ $question->correct_answer == "answer2" ? "selected" : "" }}@endif>{{ __('question.answer') }}-2</option>
                                    <option value="answer3" @if(old('correct_answer')){{ old('correct_answer') == "answer3" ? "selected" : "" }}@else{{ $question->correct_answer == "answer3" ? "selected" : "" }}@endif>{{ __('question.answer') }}-3</option>
                                    <option value="answer4" @if(old('correct_answer')){{ old('correct_answer') == "answer4" ? "selected" : "" }}@else{{ $question->correct_answer == "answer4" ? "selected" : "" }}@endif>{{ __('question.answer') }}-4</option>
                                </select>
                          </div>
                            <div class="mb-4">
                                <x-jet-button>
                                    <i class="fa fa-check"></i> {{ __('general.update') }}
                                </x-jet-button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

