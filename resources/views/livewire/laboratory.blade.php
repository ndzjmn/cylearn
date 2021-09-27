<?php 
//PATH TO THE PDFTOTEXT EXE
$path = 'c:/Program Files/Git/mingw64/bin/pdftotext';
use Spatie\PdfToText\Pdf;
?>
<div>
    <button type="button" onclick="openModal('mymodalcenteredcreds')" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600 mr-56 ml-10">View Credentials</button> 

    <button type="button" onclick="openModal('mymodalcentered')" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600"><img src="{{ asset('images/settings_icon.jpg') }}" alt="Settings" style="width:20px; height:20px;">Settings</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600 ml-10" id="btnSpeak"><img src="{{ asset('images/ttspeech.png') }}" alt="Play" style="width:20px; height:20px;">Play</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnPause()"><img src="{{ asset('images/pause.png') }}" alt="Pause" style="width:20px; height:20px;">Pause</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnResume()"><img src="{{ asset('images/resume.png') }}" alt="Resume" style="width:20px; height:20px;">Resume</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnCancel()"><img src="{{ asset('images/stop.png') }}" alt="Stop" style="width:20px; height:20px;">Stop</button>
    
    <!-- Tabs -->
    <ul id="tabs" class="inline-flex w-full">
        <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Instructions</a></li>
        <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Virtual Machine</a></li>
        <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Assessment</a></li>
      </ul>

      <!-- Tab Contents -->
      <div id="tab-contents">
        <div id="first">
            @if ($current_path = Request::segment(2) == "securing-operating-systems")
            <embed src="{{ asset('labguides/Securing Operating Systems - Lab Guide.pdf') }}" width="100%" height="650px">
            <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                <?php echo Pdf::getText('labguides/Securing Operating Systems - Lab Guide.pdf', $path);?>
            </textarea>
            @elseif ($current_path = Request::segment(2) == "social-engineering-and-identity-theft")
            <embed src="{{ asset('labguides/Social Engineering and Identity Theft - Lab Guide.pdf') }}" width="100%" height="650px">
                <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                    <?php echo Pdf::getText('labguides/Conducting Passive Reconnaissance - Lab Guide.pdf', $path);?>
                </textarea>
            @elseif ($current_path = Request::segment(2) == "data-encryption")
            <embed src="{{ asset('labguides/Data Encryption - Lab Guide.pdf') }}" width="100%" height="650px">
                <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                    <?php echo Pdf::getText('labguides/Data Encryption - Lab Guide.pdf', $path);?>
                </textarea>
            @elseif ($current_path = Request::segment(2) == "data-backup-and-disaster-recovery")
            <embed src="{{ asset('labguides/Data Backup and Disaster Recovery - Lab Guide.pdf') }}" width="100%" height="650px">
                <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                    <?php echo Pdf::getText('labguides/Data Backup and Disaster Recovery - Lab Guide.pdf', $path);?>
                </textarea>
            @elseif ($current_path = Request::segment(2) == "protecting-systems-using-antiviruses")
            <embed src="{{ asset('labguides/Protecting Systems with Antivirus - Lab Guide.pdf') }}" width="100%" height="650px">
                <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                    <?php echo Pdf::getText('labguides/Protecting Systems with Antivirus - Lab Guide.pdf', $path);?>
                </textarea>
            @elseif ($current_path = Request::segment(2) == "conducting-passive-reconnaissance")
            <embed src="{{ asset('labguides/Conducting Passive Reconnaissance - Lab Guide.pdf') }}" width="100%" height="650px">
                <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                    <?php echo Pdf::getText('labguides/Conducting Passive Reconnaissance - Lab Guide.pdf', $path);?>
                </textarea>
            @elseif ($current_path = Request::segment(2) == "conducting-active-reconnaissance")
            <embed src="{{ asset('labguides/Conducting Active Reconnaissance - Lab Guide.pdf') }}" width="100%" height="650px">
                    <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                        <?php echo Pdf::getText('labguides/Conducting Active Reconnaissance - Lab Guide.pdf', $path);?>
                    </textarea>
            @elseif ($current_path = Request::segment(2) == "perform-non-technical-tests")
            <embed src="{{ asset('labguides/Perform Non-Technical Tests - Lab Guide.pdf') }}" width="100%" height="650px">
                    <textarea class="form-control ml-5" style="border: none; style=display:none; visibility: hidden; height:50px; text-align: left;" cols="65" id="txtInstruction" rows="10">
                        <?php echo Pdf::getText('labguides/Perform Non-Technical Tests - Lab Guide.pdf', $path);?>
                    </textarea>
            @endif
        </div>
        <div id="second" class="hidden">
            <iframe class="iframe" src="https://lab.cylearn.tk/#/%22%3E" width="100%" height="650px"></iframe>
        </div>
        
        <div id="third" class="hidden">
            {{-- Showing the quiz contents --}}
            <div class="flex items-center justify-start px-4 py-3 sm:px-6">
                @foreach ($quizzes as $quiz)
                    @if ($pages->count())
                        @foreach ($pages as $item)
                            @if ($item->slug."-lab-assessment" == $quiz->slug)
                                @if ($current_path = Request::segment(2)."-lab-assessment" == $item->slug."-lab-assessment")
                                        <div class="w-96 m-2 h-96 rounded shadow-md justify-around bg-gray-200 flex flex-col border-box p-4">
                                            <p class="text-blue-800 uppercase text-sm"> {{  $quiz->title  }}</p>
                                            <p class="text-2xl font-bold uppercase my-4">{{ Str::limit($quiz->description, 50) }}</p>
                                            <small class="" title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? __('quiz.finished_at') . ': ' . $quiz->finished_at->diffForHumans() : "" }}</small>
                                            <p class="text-sm uppercase text-gray-900">{{ __('quiz.questionCount').": ".$quiz->questions_count }}</p>
                                            <div class="flex flex-row">
                                                <a class="bg-blue-700 px-4 py-2 rounded uppercase font-bold text-sm text-white" href="{{ route('quiz.detail', $quiz->slug) }}">Start</a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                        @endforeach  
                        @else
                        <p class="text-blue-800 uppercase text-sm">No quiz found.</p>
                    @endif
                @endforeach
           
        <!-- modal button and elements for VM credentials-->
        <dialog id="mymodalcenteredcreds" class="bg-transparent z-0 relative w-screen h-screen">
            <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                <div class="bg-white flex rounded-lg relative">
                    <div class="flex flex-col items-start">
                        <div class="p-7 flex items-center w-full">
                            <div class="text-gray-900 font-bold text-lg">Virtual Machine Credentials</div>
                            <svg onclick="modalClose('mymodalcentered')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                            </svg>
                        </div>
                        <div class="px-4 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
                                    @if($data[2]->slug != $current_path = Request::segment(2))
                                        <p>Username: WS000 </p>
                                        <p>Password: ws000 </p>
                                    @else
                                        <p>Username: KL000 </p>
                                        <p>Password: kl000 </p>
                                    @endif
                        </div>
                        
                        <div class="p-7 flex justify-end items-center w-full">
                            <button type="button" onclick="modalClose('mymodalcenteredcreds')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </dialog> <!-- end of modal dialog -->
</div>

  <!-- modal button and elements for Settings-->
  <dialog id="mymodalcentered" class="bg-transparent z-0 relative w-screen h-screen">
    <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
        <div class="bg-white flex rounded-lg relative">
            <div class="flex flex-col items-start">
                <div class="p-7 flex items-center w-full">
                    <div class="text-gray-900 font-bold text-lg">Text-To-Speech Settings</div>
                    <svg onclick="modalClose('mymodalcentered')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                    </svg>
                </div>

                <div class="px-7 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
                   <div class="form-group">
                       <label for="voice"> Select voice:</label>
                        <select name="" id="voiceList"></select>
                   </div>
                   <br/>
                   <div class="form-group">
                    <label for="range">Volume: </label>
                    <input type="range" id="volume" class="custom-range" min="0" max="1" value="0.5" step="0.1">
                </div>
                   <div class="form-group">
                       <label for="range">Speed: </label>
                       <input type="range" id="rate" class="custom-range" min="0.5" max="2" value="1" step="0.1">
                   </div>

                </div>
                
                <div class="p-7 flex justify-end items-center w-full">
                    <button type="button" onclick="modalClose('mymodalcentered')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
</dialog> <!-- end of modal dialog -->

<script>
    function checkCompatibility (){
        if(('speechSynthesis' in window)){
            alert('Your browser is not supported. Please update your browser.');
        }
    }

    //elements
    var voiceList = document.querySelector('#voiceList');
    var txtInstruction = document.querySelector('#txtInstruction');
    var rateSlider = document.querySelector('#rate');
    var volumeSlider = document.querySelector('#volume');
    var btnSpeak = document.querySelector('#btnSpeak');

    var textToSpeech = window.speechSynthesis;
    var voices = [];

    var Speak = new SpeechSynthesisUtterance(txtInstruction.value);

    getVoices();

    if(speechSynthesis !== undefined){
        speechSynthesis.onvoiceschanged = getVoices;
    }

//Event listener
    btnSpeak.addEventListener('click', ()=>{
        //var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
        var selectedVoice = voiceList.selectedOptions[0].getAttribute('data-name');

        voices.forEach((voice)=>{
            if (voice.name === selectedVoice){
                Speak.voice = voice;
                Speak.volume = volumeSlider.value;
                Speak.rate = rateSlider.value;
                Speak.text = txtInstruction.value; 
            }
        });
        textToSpeech.speak(Speak);
    });

    function btnPause(){
        //var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
        var selectedVoice = voiceList.selectedOptions[0].getAttribute('data-name');

        voices.forEach((voice)=>{
            if (voice.name === selectedVoice){
                Speak.voice = voice;
                Speak.volume = volumeSlider.value;
                Speak.rate = rateSlider.value;
                Speak.text = txtInstruction.value; 
            }
        });
        textToSpeech.pause(Speak);
    }

    function btnResume(){
        var selectedVoice = voiceList.selectedOptions[0].getAttribute('data-name');

        voices.forEach((voice)=>{
            if (voice.name === selectedVoice){
                Speak.voice = voice;
                Speak.volume = volumeSlider.value;
                Speak.rate = rateSlider.value;
                Speak.text = txtInstruction.value; 
            }
        });
        textToSpeech.resume(Speak);
    }

    function btnCancel(){
        //var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
        var selectedVoice = voiceList.selectedOptions[0].getAttribute('data-name');

        voices.forEach((voice)=>{
            if (voice.name === selectedVoice){
                Speak.voice = voice;
                Speak.volume = volumeSlider.value;
                Speak.rate = rateSlider.value;
                Speak.text = txtInstruction.value; 
            }
        });


        textToSpeech.cancel(Speak);
    }


    function getVoices(){
        voices = textToSpeech.getVoices();
        voiceList.innerHTML = '';

        voices.forEach((voice)=>{
            var listItem = document.createElement('option');
            listItem.textContent = voice.name;
            listItem.setAttribute('data-lang', voice.lang);
            listItem.setAttribute('data-name', voice.name);
            voiceList.appendChild(listItem);
        });
        voiceList.selectedIndex = 0;
    }
   
    window.speechSynthesis.cancel();


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

    //tabs
    let tabsContainer = document.querySelector("#tabs");

    let tabTogglers = tabsContainer.querySelectorAll("a");
    console.log(tabTogglers);

    tabTogglers.forEach(function(toggler) {
    toggler.addEventListener("click", function(e) {
        e.preventDefault();

        let tabName = this.getAttribute("href");

        let tabContents = document.querySelector("#tab-contents");

        for (let i = 0; i < tabContents.children.length; i++) {

        tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
        if ("#" + tabContents.children[i].id === tabName) {
            continue;
        }
        tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
    });
    });

    document.getElementById("default-tab").click();

</script>