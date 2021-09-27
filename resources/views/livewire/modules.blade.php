<div class = "py-6">
  <body class="h-screen bg-blue-50">
    <main class="p-5 bg-light-blue">
      <div class="flex justify-center items-start my-2">
        <div class="w-full sm:w-10/12 md:w-1/2 my-1">
        @if ($data->count() || $data->is_cybersec_one == 1)
          <h2 class="text-xl font-semibold text-vnet-blue mb-2">Cybersecurity 1</h2>
          @foreach ($data as $item) 
          @if($item->is_cybersec_one == 1)
          <ul class="flex flex-col">
            <li class="bg-white my-2 shadow-lg" x-data="accordion({{ $item->id }})">
              <h2
                @click="handleClick()"
                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
              >
                <span><a class="stretched-link" href="{{ URL::to('lessons', $item->slug) }}" title="{{ $item->title }}">
                      {{ $item->title }} 
                      </a></span>
                <svg
                  :class="handleRotate()"
                  class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                  viewBox="0 0 20 20"
                >
                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                </svg>
              </h2>
              <div
                x-ref="tab"
                :style="handleToggle()"
                class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
              >
              <p class="p-3 text-gray-900">
                <!--{{ str_replace("&nbsp;",' ',strip_tags(\Str::words($item->content, 10))) }}
                -->
                
                <div class="text-left ml-5">
                    Lesson Overview: {!! $item->content !!} <br/>
                    Video: 0 minutes <br/>
                    @foreach($quizzes as $quiz)
                    @if ($item->id == $quiz->lesson_id && $item->title == $quiz->title)
                    Quiz: {{ $quiz->questions_count }} items <br/>
                    @endif
                    @endforeach
                    Module Reading: 30 minutes <br/>
                    Laboratory Exercise: 1 hour 
                  </div>
               </p> 
              </div>
            </li>
            
          </ul>
          @endif
              @endforeach
    @else
            <h4 class="text-center px-6 py-4 text-sm whitespace-no-wrap"> No Additional Contents Found. </h4>
  <br/> <br/>
    @endif
        </div>
      </div>
    </main>
&nbsp;
    <main class="p-5 bg-light-blue">
      <div class="flex justify-center items-start my-2">
        <div class="w-full sm:w-10/12 md:w-1/2 my-1">
        @if ($data->count() || $data->is_cybersec_two == 1)
          <h2 class="text-xl font-semibold text-vnet-blue mb-2">Cybersecurity 2</h2>
          @foreach ($data as $item) 
          @if($item->is_cybersec_two == 1)
          <ul class="flex flex-col">
            <li class="bg-white my-2 shadow-lg" x-data="accordion({{ $item->id }})">
              <h2
                @click="handleClick()"
                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
              >
                <span><a class="stretched-link" href="{{ URL::to('lessons', $item->slug) }}" title="{{ $item->title }}">
                      {{ $item->title }} 
                      </a></span>
                <svg
                  :class="handleRotate()"
                  class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                  viewBox="0 0 20 20"
                >
                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                </svg>
              </h2>
              <div
                x-ref="tab"
                :style="handleToggle()"
                class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
              >
              <p class="p-3 text-gray-900">
                <!--{{ str_replace("&nbsp;",' ',strip_tags(\Str::words($item->content, 10))) }}
                -->
                <div class="text-left ml-5">
                    Lesson Overview: {!! $item->content !!} <br/>
                    Video: 0 minutes <br/>
                    Quiz: 0 items <br/>
                    Module Reading: 0 minutes <br/>
                    Laboratory Exercise: 0 hours 
                  </div>
               </p> 
              </div>
            </li>
            
          </ul>
          @endif
              @endforeach
    @else
            <h4 class="text-center px-6 py-4 text-sm whitespace-no-wrap"> No Additional Contents Found. </h4>
  <br/> <br/>
 
    @endif
        </div>
      </div>
    </main>
  </body>
  <div class="flex flex-col ml-5 mr-5">
    {{ $data->links() }}
  </div>
</div>
<script>
    Spruce.store('accordion', {
      tab: 0,
    });

    const accordion = (idx) => ({
      handleClick() {
        this.$store.accordion.tab = this.$store.accordion.tab === idx ? 0 : idx;
      },
      handleRotate() {
        return this.$store.accordion.tab === idx ? 'rotate-180' : '';
      },
      handleToggle() {
        return this.$store.accordion.tab === idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
      }
    });
  </script>

<script>
  window.speechSynthesis.cancel();
</script>