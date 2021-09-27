<div>
     <style>
        body {background:gray !important;}
        </style>
        @if ($data->count())
        @foreach ($data as $item)
          @if ($item->slug == $current_path = Request::segment(2))
            @if ($item->has_laboratory == 1)
            <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                    <img class="w-full" src="{{ asset('frontend/Homepage (3).png') }}" alt="" />
                    <div class="badge absolute top-0 right-0 bg-red-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">00:00</div>
                    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                    </div>
                    <div class="desc p-4 text-gray-800">
                    <a href="{{ URL::to('video-view', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">{{ $item->title }}</a>
                    <span class="description text-sm block py-2 border-gray-400 mb-2">The video provides the whole overview and information about the topic.</span>
                    </div>
                </div>
                <!-- each -->
                <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                    <img class="w-full" src="" alt="" />
                    <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">10 minutes read</div>
                    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                    </div>
                    <div class="desc p-4 text-gray-800">
                    <a href="{{ URL::to('pdfmodule-view', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">Module Reading</a>
                    <span class="description text-sm block py-2 border-gray-400 mb-2">This contains the additional readings of the lesson discussed in the video lecture.</span>
                    </div>
                </div>
                <!-- each -->
                <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                    <img class="w-full" src="" alt="" />
                    <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">1 hour</div>
                    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                    </div>
                    <div class="desc p-4 text-gray-800">
                    <a href="{{ URL::to('lab-view', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">Laboratory</a>
                   <span class="description text-sm block py-2 border-gray-400 mb-2">A laboratory exercise and assessment to test your learnings about the topic.</span>
                    </div>
                </div> 
                <!-- each -->
                <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                    <img class="w-full" src="" alt="" />
                    @foreach($quizzes as $quiz)
                        @if ($item->title == $quiz->title)
                        <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">{{ $quiz->questions_count }} items</div>
                        @endif
                    @endforeach
                    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                    </div>
                    <div class="desc p-4 text-gray-800">
                    <a href="{{ URL::to('student/quizzes', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">Quiz</a>
                   <span class="description text-sm block py-2 border-gray-400 mb-2">A module assessment which will test your knowledge about what you have learned in this lesson.</span>
                    </div>
                </div> 
                </div>

                @else
                <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                        <img class="w-full" src="{{ asset('frontend/Homepage (3).png') }}" alt="" />
                        <div class="badge absolute top-0 right-0 bg-red-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">00:00</div>
                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                        </div>
                        <div class="desc p-4 text-gray-800">
                        <a href="{{ URL::to('video-view', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">{{ $item->title }}</a>
                        <span class="description text-sm block py-2 border-gray-400 mb-2">This is the video lecture for this lesson. The video provides the whole overview and information about the topic.</span>
                        </div>
                    </div>
                    <!-- each -->
                    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                        <img class="w-full" src="" alt="" />
                        <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">10 minutes read</div>
                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                        </div>
                        <div class="desc p-4 text-gray-800">
                        <a href="{{ URL::to('pdfmodule-view', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">Module Reading</a>
                        <span class="description text-sm block py-2 border-gray-400 mb-2">This contains the additional readings of the lesson discussed in the video lecture.</span>
                        </div>
                    </div>
                    <!-- each -->
                    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                        <img class="w-full" src="" alt="" />
                        @foreach($quizzes as $quiz)
                            @if ($item->title == $quiz->title)
                            <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">{{ $quiz->questions_count }} items</div>
                            @endif
                        @endforeach
                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                        </div>
                        <div class="desc p-4 text-gray-800">
                        <a href="{{ URL::to('student/quizzes', $item->slug) }}" target="_new" class="title font-bold block cursor-pointer hover:underline">Quiz</a>
                        <span class="description text-sm block py-2 border-gray-400 mb-2">A module assessment which will test your knowledge about what you have learned in this lesson.</span>
                        </div>
                    </div> 
                    </div>
            @endif
            @endif
        @endforeach
    @endif
</div>

<script>
    window.speechSynthesis.cancel();
</script>