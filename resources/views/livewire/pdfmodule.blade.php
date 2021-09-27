<?php 
//PATH TO THE PDFTOTEXT EXE
$path = 'c:/Program Files/Git/mingw64/bin/pdftotext';
use Spatie\PdfToText\Pdf;
?>

<div class="p-6">
    <button type="button" onclick="openModal('mymodalcentered')" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600"><img src="{{ asset('images/settings_icon.jpg') }}" alt="Settings" style="width:20px; height:20px;">Settings</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600 ml-10" id="btnSpeak"><img src="{{ asset('images/ttspeech.png') }}" alt="Play" style="width:20px; height:20px;">Play</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnPause()"><img src="{{ asset('images/pause.png') }}" alt="Pause" style="width:20px; height:20px;">Pause</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnResume()"><img src="{{ asset('images/resume.png') }}" alt="Resume" style="width:20px; height:20px;">Resume</button>
    <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600" onclick="btnCancel()"><img src="{{ asset('images/stop.png') }}" alt="Stop" style="width:20px; height:20px;">Stop</button>

    @if ($current_path = Request::segment(2) == "securing-operating-systems")
      <embed src="{{ asset('pdf-files/CSCU Module 02 Securing Operating Systems.pdf') }}" width="100%" height="700px">
        <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
            <?php echo Pdf::getText('pdf-files/CSCU Module 02 Securing Operating Systems.pdf', $path);?>
        </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "security-control-and-framework-types")
      <embed src="{{ asset('pdf-files/Wk2T2 Security Control and Framework Types.pdf') }}" width="100%" height="700px">
        <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
            <?php echo Pdf::getText('pdf-files/Wk2T2 Security Control and Framework Types.pdf', $path);?>
        </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "social-engineering-and-identity-theft")
      <embed src="{{ asset('pdf-files/CSCU Module 10 Social Engineering and Identity Theft.pdf') }}" width="100%" height="1000px">
        <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
            <?php echo Pdf::getText('pdf-files/CSCU Module 10 Social Engineering and Identity Theft.pdf', $path);?>
        </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "data-encryption")
      <embed src="{{ asset('pdf-files/CSCU Module 04 Data Encryption.pdf') }}" width="100%" height="1000px">
        <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
            <?php echo Pdf::getText('pdf-files/CSCU Module 04 Data Encryption.pdf', $path);?>
        </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "protecting-systems-using-antiviruses")
    <embed src="{{ asset('pdf-files/CSCU Module 03 Protecting Systems Using Antiviruses.pdf') }}" width="100%" height="1000px">
      <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
          <?php echo Pdf::getText('pdf-files/CSCU Module 03 Protecting Systems Using Antiviruses.pdf', $path);?>
      </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "data-backup-and-disaster-recovery")
    <embed src="{{ asset('pdf-files/CSCU Module 05 Data Backup and Disaster Recovery.pdf') }}" width="100%" height="1000px">
      <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
          <?php echo Pdf::getText('pdf-files/CSCU Module 05 Data Backup and Disaster Recovery.pdf', $path);?>
      </textarea>
    @endif
   
    @if ($current_path = Request::segment(2) == "internet-security")
    <embed src="{{ asset('pdf-files/CSCU Module 06 Internet Security.pdf') }}" width="100%" height="1000px">
      <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
          <?php echo Pdf::getText('pdf-files/CSCU Module 06 Internet Security.pdf', $path);?>
      </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "securing-network-connections")
    <embed src="{{ asset('pdf-files/CSCU Module 07 Securing Network Connections.pdf') }}" width="100%" height="1000px">
      <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
          <?php echo Pdf::getText('pdf-files/CSCU Module 07 Securing Network Connections.pdf', $path);?>
      </textarea>
    @endif

    @if ($current_path = Request::segment(2) == "securing-email-communications")
    <embed src="{{ asset('pdf-files/CSCU Module 09 Securing Email Communications.pdf') }}" width="100%" height="1000px">
      <textarea class="form-control ml-5 hidden" style="border: none;" value="" rows="1" cols="8" id="txtInstruction">
          <?php echo Pdf::getText('pdf-files/CSCU Module 09 Securing Email Communications.pdf', $path);?>
      </textarea>
    @endif
    

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

</div>

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

    getVoices();

    if(speechSynthesis !== undefined){
        speechSynthesis.onvoiceschanged = getVoices;
    }

//Event listener
    btnSpeak.addEventListener('click', ()=>{
        var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
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
        var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
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
        var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
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
        var Speak = new SpeechSynthesisUtterance(txtInstruction.value);
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
</script>