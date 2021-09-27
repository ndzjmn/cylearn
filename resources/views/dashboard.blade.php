<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="max-w-screen-lg bg-white shadow-2xl rounded-lg mx-auto text-center py-12 mt-4">
                    <h2 class="text-3xl leading-9 font-bold tracking-tight text-gray-800 sm:text-4xl sm:leading-10">
                        Start studying with us
                    </h2>
                    <div class="mt-8 flex justify-center">
                        <div class="inline-flex rounded-md bg-blue-500 shadow">
                            <a href="{{ route('student.lessons.index') }}" class="text-gray-200 font-bold py-2 px-6">
                                Browse Courses
                            </a>
                        </div>
                    </div>
                </div>
                    <!-- Footer -->
                    <div class="mt-10 bottom-0 text-center">
                    <h4 class="text-sm font-semibold text-gray-600 "> &COPY; CyLearn. All Rights Reserved 2021</h4>
                    </div>
                </div>
                </div>
           <!-- </div> -->
        </div>
    </div>
</x-app-layout>

<script>
    window.speechSynthesis.cancel();
</script>