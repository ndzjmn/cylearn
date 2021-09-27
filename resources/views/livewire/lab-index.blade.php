<div class="flex flex-wrap md items-center h-screen">
      <div class="bg-white w-full md:w-1/2 h-screen">
        <div class="mx-32">
          @if ($data->count())
          @foreach ($data as $item)
          <h2 class="text-4xl font-bold mt-16">
              @if ($item->is_cybersec_one == 1)
                  <?php $title_page = 'Cybersecurity 1'; ?>
              @elseif ($item->is_cybersec_two == 1)
                  <?php $title_page = 'Cybersecurity 2'; ?>
              @endif
              @endforeach
              {{ $title_page }}
            </h2>
              <!-- header text -->
              @foreach ($data as $item)
                @if ($item->slug == $current_path = Request::segment(2))
                  <div class="flex mt-16 font-light text-gray-500">
                    <div class="pr-4">
                      <span class="uppercase">{{ $item->title }}</span>
                    </div>
                  </div>
          <!-- description -->
          <div class="description w-full sm: md:w-2/3 mt-16 text-gray-600 text-sm">
          A laboratory exercise and assessment to test your learnings about the lesson, "{{ $item->title }}".
          </div>
              @endif
            @endforeach
          @endif
        <br/>
          <a class="uppercase mt-5 text-sm font-semibold hover:underline" href="{{ URL::to('/laboratory-contents', $current_path) }}">
            Start Laboratory
          </a>
        </div>
      </div>
      <div class="bg-gray-600 w-full md:w-1/2 h-screen">
        
      </div>
</div>

<script>
  window.speechSynthesis.cancel();
</script>