<x-app-layout>
    <x-slot name="header">
      <style>
        .modal {
          transition: opacity 0.25s ease;
        }
        body.modal-active {
          overflow-x: hidden;
          overflow-y: visible !important;
        }
      </style>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('toastr/toastr.min.js') }}"></script>
          
        @if ($pages->count())
          @foreach ($pages as $item)
            @if ($item->slug == $current_path = Request::segment(2))
                {{ $item->title }}
                @endif
            @endforeach
        @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-6">
<!-- LESSON 1 -->
   @if ($current_path = Request::segment(2) == "securing-operating-systems")
    <div class="w3-padding w3-white notranslate">
    <div style="text-align:center"> 
        <!-- notification if notes were added.-->
        @if(Session::has('status'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ Session::get('status') }}</p>
            </div>
            <br/>
        @endif

    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk1L1_Securing_Operating_System.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk1L1_Securing_Operating_System.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('subtitles/securing-operating-systems.vtt') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('subtitles/txt/securing-operating-systems.txt') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

          <!-- add notes -->
          <form method="POST" action="{{ url('video-view/securing-operating-systems') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none;" value="Securing Operating Systems" name="lesson_title"></div>
                    <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc"></textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" name="save_note" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->
        
      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
        @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Securing Operating Systems")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn"><a href="{{ "/video-view/securing-operating-systems/.edit/".$notesdata->notes_id }}">Edit</a></button>
        <a href="{{ "/video-view/securing-operating-systems/delete/".$notesdata->notes_id }}"><button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button></a>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

    <!--Modal-->
  <div id="editModal" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        @foreach ($notes as $notesdata)
        @if ($notesdata->lesson_title == "Securing Operating Systems")
        <form id="editForm" method="POST" action="{{ url('/video-view/securing-operating-systems/edit/'.$notesdata->notes_id) }}">
          @csrf
          <p><input type="hidden" name="notes_id" value="{{ $notesdata->notes_id }}"></p>  
          <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold lesson_title" style="border:none;" value="Securing Operating Systems" name="lesson_title"></p>
          <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc">{{ $notesdata->notes_desc }}</textarea></p>
          @endif
          @endforeach

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button type="submit" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button type="button" class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
      </form>

      </div>
    </div>
  </div> <!-- end of modal -->
    </div> 
    </div>

<!-- LESSON 2 -->
    @elseif ($current_path = Request::segment(2) == "security-control-and-framework-types")
    <div class="w3-padding w3-white notranslate">
    <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif

    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk1L2 Security Control and Framework Types.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk1L2 Security Control and Framework Types.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('subtitles/security-control-and-framework-types.vtt') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('subtitles/txt/security-control-and-framework-types.txt') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

              <!-- add notes -->
              <form method="POST" action="{{ url('video-view/security-control-and-framework-types') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Security Control and Framework Types" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Security Control and Framework Types"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->

            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Security Control and Framework Types")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
    </div>

     <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Security Control and Framework Types" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->

    </div> 
    </div>

<!-- LESSON 3 -->
   @elseif ($current_path = Request::segment(2) == "social-engineering-and-identity-theft")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif
    
        <p style="text-align: center; font-weight:bold;">Part 1</p>
        <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
            <div class="row sm:flex">
              <div class="col sm:w-3/4">
                <div class="box border rounded flex flex-col shadow bg-white">
                     <!-- start of video file -->
                        <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                            <source src="{{ URL::asset('uploads/Wk1L3_Social_engineering_attack_pt.1.mp4') }}" type="video/mp4">
                            <source src="{{ URL::asset('uploads/Wk1L3_Social_engineering_attack_pt.1.ogg') }}" type="video/ogg">
                                <track default src="{{ URL::asset('subtitles/social-engineering-attack(1).vtt') }}"
                            srclang="en" label="(English) On"/>
                            <p><a href=""> Download the video</a></p>
                            Your browser does not support HTML5 video.
                        </video></center>
                        <!-- end of video file -->
                </div>
              </div>
              
              <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
                <div class="box border rounded flex flex-col shadow bg-white">
                    <!-- download transcript -->
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                    rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                    <a href ="{{ URL::asset('subtitles/txt/social-engineering-attack(1).txt') }}" download> 
                        Download Transcript 
                    </a></button> &nbsp;
                    <!-- end of download transcript -->
    
            <!-- add notes -->
              <form method="POST" action="{{ url('video-view/social-engineering-and-identity-theft') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" 
                      value="Social Engineering and Identity Theft Part 1" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Social Engineering and Identity Theft Part 1"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->

                </div>
              </div>
            </div>
          </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Social Engineering and Identity Theft Part 1")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

          <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Social Engineering and Identity Theft Part 1" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->

   </div> 
   <br/> <br/> <hr/>
    <p style="text-align: center; font-weight:bold;">Part 2</p>
    <div style="text-align:center"> 
      
     <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
         <div class="row sm:flex">
           <div class="col sm:w-3/4">
             <div class="box border rounded flex flex-col shadow bg-white">
                  <!-- start of video file -->
                     <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                         <source src="{{ URL::asset('uploads/Wk1L3_Social_engineering_attack_pt.2.mp4') }}" type="video/mp4">
                         <source src="{{ URL::asset('uploads/Wk1L3_Social_engineering_attack_pt.2.ogg') }}" type="video/ogg">
                             <track default src="{{ URL::asset('subtitles/social-engineering-attack(2).vtt') }}"
                         srclang="en" label="(English) On"/>
                         <p><a href=""> Download the video</a></p>
                         Your browser does not support HTML5 video.
                     </video></center>
                     <!-- end of video file -->
             </div>
           </div>
           
           <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
             <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- download transcript -->
                 <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                 rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                 <a href ="{{ URL::asset('subtitles/txt/social-engineering-attack(2).txt') }}" download> 
                     Download Transcript 
                 </a></button> &nbsp;
                 <!-- end of download transcript -->
 
          <!-- add notes -->
              <form method="POST" action="{{ url('video-view/social-engineering-and-identity-theft') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Social Engineering and Identity Theft Part 2" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Social Engineering and Identity Theft Part 2"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
             </div>
           </div>
         </div>
       </div> <!-- end of 3/4 -->

       <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
       <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Social Engineering and Identity Theft Part 2")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
    </div>

         <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Social Engineering and Identity Theft Part 2" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->


    </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "data-encryption")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif
    
    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk3T1 Data Encryption_Trim.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk3T1 Data Encryption_Trim.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

          <!-- add notes -->
              <form method="POST" action="{{ url('video-view/data-encryption') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Data Encryption" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Data Encryption"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
            
            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Data Encryption")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

               <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Data Encryption" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->

   </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "basic-concepts-of-cryptography")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif

    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk3T2 Basic Concepts of Cryptography_Trim.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk3T2 Basic Concepts of Cryptography_Trim.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

          <!-- add notes -->
              <form method="POST" action="{{ url('video-view/basic-concepts-of-cryptography') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Basic Concepts of Cryptography" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Basic Concepts of Cryptography"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
            
            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Basic Concepts of Cryptography")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

               <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Basic Concepts of Cryptography" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->

   </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "hashing-symmetric-and-asymmetric-algorithm")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif

    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk3T3 Hashing, Symmetric and Asymmetric Algorithm_Trim.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk3T3 Hashing, Symmetric and Asymmetric Algorithm_Trim.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

          <!-- add notes -->
              <form method="POST" action="{{ url('video-view/hashing-symmetric-and-asymmetric-algorithm') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Hashing Symmetric and Asymmetric Algorithm" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" name="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Hashing Symmetric and Asymmetric Algorithm"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Hashing Symmetric and Asymmetric Algorithm")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

               <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Hashing Symmetric and Asymmetric Algorithm" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->


   </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "data-backup-and-disaster-recovery")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
     <!-- notification if notes were added.-->
     @if(Session::has('status'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ Session::get('status') }}</p>
        </div>
        <br/>
    @endif

    <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
        <div class="row sm:flex">
          <div class="col sm:w-3/4">
            <div class="box border rounded flex flex-col shadow bg-white">
                 <!-- start of video file -->
                    <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                        <source src="{{ URL::asset('uploads/Wk4T1 Data Backup and Disaster Recovery_Trim.mp4') }}" type="video/mp4">
                        <source src="{{ URL::asset('uploads/Wk4T1 Data Backup and Disaster Recovery_Trim.ogg') }}" type="video/ogg">
                            <track default src="{{ URL::asset('') }}"
                        srclang="en" label="(English) On"/>
                        <p><a href=""> Download the video</a></p>
                        Your browser does not support HTML5 video.
                    </video></center>
                    <!-- end of video file -->
            </div>
          </div>
          
          <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
            <div class="box border rounded flex flex-col shadow bg-white">
                <!-- download transcript -->
                <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
                <a href ="{{ URL::asset('') }}" download> 
                    Download Transcript 
                </a></button> &nbsp;
                <!-- end of download transcript -->

            <!-- add notes -->
              <form method="POST" action="{{ url('video-view/data-backup-and-disaster-recovery') }}" id="add-notes-form">
                @csrf
                    <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Data Backup and Disaster Recovery" name="lesson_title"></div>
                        <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Data Backup and Disaster Recovery"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                    <br/>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                  rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                </form>
          <!-- end of add notes -->
            </div>
          </div>
        </div>
      </div> <!-- end of 3/4 -->

      <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
      <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Data Backup and Disaster Recovery")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
      </div>

               <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Edit Note</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <form id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
        <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Data Backup and Disaster Recovery" name="lesson_title"></p>
        <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div> <!-- end of modal -->

   </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "internet-security")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
      <!-- notification if notes were added.-->
      @if(Session::has('status'))
      <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>{{ Session::get('status') }}</p>
      </div>
      <br/>
  @endif

  <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
    <div class="row sm:flex">
      <div class="col sm:w-3/4">
        <div class="box border rounded flex flex-col shadow bg-white">
             <!-- start of video file -->
                <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                    <source src="{{ URL::asset('uploads/Wk4T2 Internet Security_Trim.mp4') }}" type="video/mp4">
                    <source src="{{ URL::asset('uploads/Wk4T2 Internet Security_Trim.ogg') }}" type="video/ogg">
                        <track default src="{{ URL::asset('') }}"
                    srclang="en" label="(English) On"/>
                    <p><a href=""> Download the video</a></p>
                    Your browser does not support HTML5 video.
                </video></center>
                <!-- end of video file -->
        </div>
      </div>
      
      <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
        <div class="box border rounded flex flex-col shadow bg-white">
            <!-- download transcript -->
            <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
            rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
            <a href ="{{ URL::asset('') }}" download> 
                Download Transcript 
            </a></button> &nbsp;
            <!-- end of download transcript -->

                  <!-- add notes -->
                        <form method="POST" action="{{ url('video-view/internet-security') }}" id="add-notes-form">
                          @csrf
                              <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Internet Security" name="lesson_title"></div>
                                    <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Internet Security"){{ $notesdata->notes_desc }}@endif @endforeach</textarea>
                              <br/>
                              <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                            rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                          </form>
                    <!-- end of add notes -->
      
        </div>
      </div>
    </div>
  </div> <!-- end of 3/4 -->

  <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
  <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Internet Security")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach
  </div>

           <!--Modal-->
           <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
              
              <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
              </div>
        
              <!-- Add margin if you want to see some of the overlay behind the modal-->
              <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                  <p class="text-2xl font-bold">Edit Note</p>
                  <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                      <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                  </div>
                </div>
        
                <!--Body-->
                <form id="editForm">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Internet Security" name="lesson_title"></p>
                <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p>
                </form>
        
                <!--Footer-->
                <div class="flex justify-end pt-2">
                  <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
                  <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                </div>
                
              </div>
            </div>
          </div> <!-- end of modal -->

   </div> 
   </div>

   @elseif ($current_path = Request::segment(2) == "protecting-systems-using-antiviruses")
   <div class="w3-padding w3-white notranslate">
   <div style="text-align:center"> 
      <!-- notification if notes were added.-->
      @if(Session::has('status'))
      <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>{{ Session::get('status') }}</p>
      </div>
      <br/>
  @endif

  <div class="app min-v-screen p-8 bg-grey-lightest font-sans">
    <div class="row sm:flex">
      <div class="col sm:w-3/4">
        <div class="box border rounded flex flex-col shadow bg-white">
             <!-- start of video file -->
                <center><video id="video1" style="width:600px;max-width:100%;text-align:center" controls="">
                    <source src="{{ URL::asset('uploads/Wk2L1_Protecting_Systems_With_Antivirus.mp4') }}" type="video/mp4">
                    <source src="{{ URL::asset('uploads/Wk2L1_Protecting_Systems_With_Antivirus.ogg') }}" type="video/ogg">
                        <track default src="{{ URL::asset('subtitles/protecting-systems-using-antivirus.vtt') }}"
                    srclang="en" label="(English) On"/>
                    <p><a href=""> Download the video</a></p>
                    Your browser does not support HTML5 video.
                </video></center>
                <!-- end of video file -->
        </div>
      </div>
      
      <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
        <div class="box border rounded flex flex-col shadow bg-white">
            <!-- download transcript -->
            <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
            rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5">
            <a href ="{{ URL::asset('subtitles/txt/protecting-systems-using-antivirus.txt') }}" download> 
                Download Transcript 
            </a></button> &nbsp;
            <!-- end of download transcript -->

                        <!-- add notes -->
                        <form method="POST" action="{{ url('video-view/protecting-systems-using-antiviruses') }}" id="add-notes-form">
                          @csrf
                              <div class="box__title bg-grey-lighter px-3 py-2 border-b"><input type="text" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Protecting Systems using Antiviruses" name="lesson_title"></div>
                                    <textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent" style="height:173px;" placeholder="Place your notes here." name="notes_desc" id="notes_desc">@foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Protecting Systems using Antiviruses"){{ $notesdata->notes_desc }} @endif @endforeach</textarea>
                              <br/>
                              <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase 
                            rounded tracking-wider focus:outline-none hover:bg-blue-600 mt-5 ml-5" id="save_note"> Save note</button>
                          </form>
                    <!-- end of add notes -->
        </div>
      </div>
    </div>
  </div> <!-- end of 3/4 -->

  <h1 class="text-2xl text-gray-800 font-semibold">Notes</h1>
  <div class="" style="overflow:scroll; height:400px;">
      @foreach ($notes as $notesdata) @if ($notesdata->lesson_title == "Protecting Systems using Antiviruses")
      <!-- saved notes -->
      <div class="mb-10 items-center">
        <div class="max-w-screen-md md:w-3/4 mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl">
            <p class="text-gray-600 w-full pb-8 text-sm tracking-wide leading-tight notes_desc">{{ $notesdata->notes_desc }}</p>
            <button type="button" class="modal-open py-2 px-4 mt-8 bg-indigo-600 text-white rounded-md shadow-xl editbtn">Edit</button>
            <button type="submit" class="py-2 px-4 mt-8 bg-red-600 text-white rounded-md shadow-xl deletebtn">Delete</button>
          </div>
        </div>
      </div>
      <!-- end saved notes -->
      @endif @endforeach 
  </div>

           <!--Modal-->
           <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
              
              <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
              </div>
        
              <!-- Add margin if you want to see some of the overlay behind the modal-->
              <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                  <p class="text-2xl font-bold">Edit Note</p>
                  <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                      <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                  </div>
                </div>
        
                <!--Body-->
                <form id="editForm">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <p><input type="hidden" class="text-sm text-grey-darker font-medium font-bold" style="border:none; width: 100%; text-align:center;" value="Protecting Systems using Antiviruses" name="lesson_title"></p>
                <p><textarea class="text-grey-darkest w-full p-2 m-1 bg-transparent myTextarea" style="height:173px;" placeholder="Edit your notes here." name="notes_desc"></textarea></p> 
                </form>
        
                <!--Footer-->
                <div class="flex justify-end pt-2">
                  <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
                  <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                </div>
                
              </div>
            </div>
          </div> <!-- end of modal -->

   </div> 
   </div>
   @endif
</div>

<script>
  var openmodal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
    event.preventDefault()
    toggleModal()
    })
  }
  
  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)
  
  var closemodal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
  }
  
  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
    isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
    isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
    toggleModal()
    }
  };
  
  
  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }
</script>

<script>
  //$('.editbtn').click(function(e) {
 // var target = $(e.target),
  //  prevNote = target.parent().children().filter('p.notes_desc'),
  //  noteText = prevNote.text();

 // $('.myTextarea').text(noteText);
//});

//UPDATE DATA

//$('#editForm').on('submit', function(e){
 // e.preventDefault();

  //var id = $('#id').val();

 // $.ajax({
  //  type: "PUT",
  //  url: 'video-view/'+Request::segment(2)+id,
  //  data: $('#editForm').serialize(),
  //  success: function(response) {
 //     console.log(response);
  //    alert('Notes updated!');
  //  },
 //   error: function(error) {
 //     console.log(error);
 //   }
 // });
//});
</script>

<script>
  window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>'))
  toastr.options.preventDuplicates = true;

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });

  $(function() {
    //add new note
    $('#add-notes-form').on('submit', function(e){
      e.preventDefault();
      //var form = this;
      //var form_data = new FormData();

      $.ajax({
        type: "POST",
        url: '/video-view/'+Request::segment(2),
       // url:$(form).attr('action'),
        method:$(form).attr('method'),
       // data:new formData(form),
        data: $('#add-notes-form').serialize(),
        processData:false,
        dataType: 'json',
        contentType:false,
        success:function(response){
            console.log(response);
            alert("notes saved.");
        },
        error:function(error) {
          console.log(error);
          alert("notes not saved.");
        }
      });
    });
  });
</script>


<script>
    window.speechSynthesis.cancel();
</script>

<script>
   
</script>
                    <!-- Footer -->
                    <div class="mt-10 bottom-0 text-center">
                    <h4 class="text-sm font-semibold text-gray-600 "> &COPY; CyLearn. All Rights Reserved 2021</h4>
                    </div>
                </div>
                </div>
           </div> 
        </div>
    </div>
</x-app-layout>
