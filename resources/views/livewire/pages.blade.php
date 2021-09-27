<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Add Lesson Module') }}
        </x-jet-button>
    </div>


    <!-- The data table -->
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm-rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Link</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Overview</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->title }} 
                                        {!! $item->is_cybersec_one ? '<span class="text-green-400 font-bold">[Cybersecurity 1]</span>':''!!}
                                        {!! $item->is_cybersec_two ? '<span class="text-green-400 font-bold">[Cybersecurity 2]</span>':''!!}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <a
                                                class="text-indigo-600 hover:text-indigo-900"
                                                target="_blank"
                                                href="{{ URL::to('/', $item->slug) }}"
                                            >
                                                {{ $item->slug }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($item->content, 50, "...")  !!}</td>
                                        <td class="px-6 py-4 text-right text-sm flex">
                                            <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                {{ __('Update') }}
                                            </x-jet-button>

                                            <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                                {{ __('Delete') }}
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4"> No Results Found. </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <br/> <br/>
    {{ $data->links() }}
    <!-- Modal Form -->

    <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save Lesson Module') }}
            </x-slot>

            <x-slot name="content">
                <!-- Title -->
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Lesson Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"/>
                    @error('title') <span class = "error">{{ $message }}</span> @enderror
                </div>

                <!-- Slug -->
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-gray-300 bg=gray-50 text-gray-500 text-sm">
                            http://localhost:8000/
                        </span>
                        <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                    </div>
                    @error('slug') <span class = "error">{{ $message }}</span> @enderror
                </div>

               <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $isCybersecurityOnePage }}" wire:model="isCybersecurityOnePage"/>
                        <span class="ml-2 text-sm text-gray-600"> Set as a Cybersecurity 1 lesson </span>
                    </label>
                </div> 

                <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $isCybersecurityTwoPage }}" wire:model="isCybersecurityTwoPage"/>
                        <span class="ml-2 text-sm text-gray-600"> Set as a Cybersecurity 2 lesson </span>
                    </label>
                </div>

                <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $hasLaboratory }}" wire:model="hasLaboratory"/>
                        <span class="ml-2 text-sm text-gray-600"> Has a laboratory assessment </span>
                    </label>

                    &nbsp;

                    <label>
                        <input class="form-radio" type="radio" value="windows" wire:model="server" id="server" name="server"/>
                        <span class="text-sm text-gray-600"> Windows </span>
                    </label>

                    <label>
                        <input class="form-radio" type="radio" value="kali" wire:model="server" id="server" name="server"/>
                        <span class="text-sm text-gray-600"> Kali Linux </span>
                    </label>
                </div>

                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Lesson Overview') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <trix-editor
                                class = "trix-content"
                                x-ref ="trix"
                                wire:model.debounce.100000ms = "content"
                                wire:key = "trix-content-unique-key">
                                </trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content') <span class = "error">{{ $message }}</span> @enderror
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if ($modelId)
                <x-jet-danger-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
                @else
                <x-jet-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
                @endif
                
            </x-slot>
        </x-jet-dialog-modal>

        <!-- The Delete Modal -->
        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete Module') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this module? Once the module is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Module') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>

<script>
    window.speechSynthesis.cancel();
</script>