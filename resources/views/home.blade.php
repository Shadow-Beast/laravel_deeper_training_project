<x-app-layout>
    <x-alert />

    <div class="flex flex-wrap lg:-m-4 -m-2" x-data="MeetingCRUD">
        @forelse($meetings as $meeting)
            <x-card :meeting="$meeting" />
        @empty
            <x-empty-record />
        @endempty

        <!-- Detail Modal -->
        <div x-show="detailModalOpen"
            class="overflow-y-auto overflow-x-hidden fixed w-full h-full z-20 flex justify-center items-center inset-0"
            id="detailModal">
            <!-- Blank Screen -->
            <div class="fixed bg-secondary/[0.5] w-full h-full z-20 inset-0"></div>
            <div class="w-[80%] z-30" @click.away="closeDetailModal()">
                <!-- Modal content -->
                <div class="rounded-lg shadow bg-white mx-auto flex">
                    <div id="meeting-image" class="w-1/2 h-auto rounded-l-lg bg-cover bg-center bg-no-repeat">
                        {{-- <img id="meeting-image" src="" alt="Meeting Image"
                            class="rounded-l-lg w-full h-full object-cover object-center pointer-events-none"> --}}
                    </div>
                    <div class="w-1/2 h-full rounded-tr-lg">
                        <div class="px-4 py-2">
                            <div class="flex justify-end py-1">
                                <button @click="closeDetailModal()" type="button"
                                    class="text-secondary-light bg-transparent hover:text-secondary-dark rounded-lg text-sm ml-auto inline-flex items-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <h3 id="meeting-title" class="text-3xl font-semibold text-secondary"></h3>
                            <div class="flex justify-end my-4 relative">
                                <x-badge id="meeting-category"
                                    class="absolute left-0 top-2 items-center px-2 py-1 inline-flex"></x-badge>
                                <div>
                                    <img id="meeting-host-profile" src="" alt="Profile Imge"
                                        class="h-8 w-8 rounded-full">
                                    <span id="meeting-host-name"
                                        class="text-xs text-primary font-semibold text-right"></span>
                                </div>
                            </div>
                            <hr class="bg-primary/[0.7] py-0.5 w-1/2 mx-auto my-4 rounded">
                            <p id="meeting-description" class="text-base text-black text-justify"></p>
                        </div>
                        <div class=" w-full bg-primary text-white px-4 py-4 rounded-br-lg">
                            <div class="w-full flex wrap my-1">
                                <span class="w-1/2">Meeting Type</span>
                                <span id="meeting-type" class="w-1/2"></span>
                            </div>
                            <div class="w-full flex wrap my-2">
                                <span class="w-1/2">Meeting ID</span>
                                <span id="meeting-id" class="w-1/2"></span>
                            </div>
                            <div class="w-full flex wrap my-2">
                                <span class="w-1/2">Meeting Password</span>
                                <span id="meeting-password" class="w-1/2"></span>
                            </div>
                            <div class="w-full flex wrap my-2">
                                <span class="w-1/2">Start at</span>
                                <span id="meeting-time" class="w-1/2"></span>
                            </div>
                            <div class="w-full flex wrap my-2">
                                <span class="w-1/2">Duration</span>
                                <span id="meeting-duration" class="w-1/2"></span>
                            </div>
                            <div class="w-1/2 mx-auto">
                                <x-link.primary-outline-white id="meeting_url" target="_blank"
                                    class="my-4">
                                    <span class="mr-2">
                                        Join Meeting
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </x-link.primary-outline-white>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth
            <!-- Save Modal -->
            <div x-show="saveModalOpen"
                class="overflow-y-auto overflow-x-hidden fixed w-full h-full z-20 flex justify-center inset-0">
                <!-- Blank Screen -->
                <div class="fixed bg-secondary/[0.5] w-full h-full z-20 inset-0"></div>
                <div class="w-[80%] z-30 mt-10" @click.away="closeSaveModal()">
                    <!-- Modal content -->
                    <div class="rounded-lg shadow bg-secondary p-4">
                        <!-- Modal header -->
                        <div class="flex justify-between p-2">
                            <h3 id="saveModalTitle" class="text-2xl"></h3>
                            <button @click="closeSaveModal()" type="button"
                                class="text-muted bg-transparent hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <hr class="border-muted">
                        <!-- Modal body -->
                        <div class="pt-6 px-6 text-center">
                            <form id="saveForm" class="w-full -mx-2 flex flex-wrap text-left"
                                action="{{ route('meeting.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="input-id" name="id" value="">
                                <div class="w-1/2 px-2">
                                    <div class="w-full my-8">
                                        <label for="title" class="w-full">Title</label>
                                        <x-form.input type="text" name="title" id="input-title" placeholder="title">
                                            </x-form-input>
                                            <x-error-message name="title"></x-error-message>
                                    </div>
                                    <div class="w-full mt-8 mb-[26px]">
                                        <label for="description" class="w-full">Description</label>
                                        <x-form.textarea name="description" id="input-description"
                                            placeholder="description">
                                        </x-form.textarea>
                                        <x-error-message name="description" class="mt-1"></x-error-message>
                                    </div>
                                    <div class="w-full mb-8">
                                        <label for="meeting_id" class="w-full">Meeting ID <span
                                                class="text-muted">(Optional)</span></label>
                                        <x-form.input type="text" name="meeting_id" id="input-meeting-id"
                                            placeholder="meeting id">
                                            </x-form-input>
                                            <x-error-message name="meeting_id"></x-error-message>
                                    </div>
                                    <div class="w-full my-8">
                                        <label for="start_at" class="w-full">Start At</label>
                                        <x-form.input type="datetime-local" name="start_at" id="input-start-at"
                                            style="color-scheme: dark;">
                                            </x-form-input>
                                            <x-error-message name="start_at"></x-error-message>
                                    </div>

                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="w-full my-8">
                                        <label for="category_id" class="w-full">Category</label>
                                        <x-form.select name="category_id" id="input-category-id">
                                            <option value="" disabled selected>Please Choose One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </x-form.select>
                                        <x-error-message name="category_id"></x-error-message>
                                    </div>
                                    <div class="w-full my-8">
                                        <label for="meeting_type_id" class="w-full">Meeting Type</label>
                                        <x-form.select name="meeting_type_id" id="input-meeting-type-id">
                                            <option value="" disabled selected>Please Choose One</option>
                                            @foreach ($meetingTypes as $meetingType)
                                                <option value="{{ $meetingType->id }}">{{ $meetingType->name }}
                                                </option>
                                            @endforeach
                                        </x-form.select>
                                        <x-error-message name="meeting_type_id"></x-error-message>
                                    </div>
                                    <div class="w-full my-8">
                                        <label for="url" class="w-full">Meeting Link <span
                                                class="text-muted">(URL)</span></label>
                                        <x-form.input type="url" name="url" id="input-url"
                                            placeholder="http://example.com/">
                                            </x-form-input>
                                            <x-error-message name="url"></x-error-message>
                                    </div>
                                    <div class="w-full my-8">
                                        <label for="meeting_password" class="w-full">Meeting Password <span
                                                class="text-muted">(Optional)</span></label>
                                        <x-form.input type="text" name="meeting_password" id="input-meeting-password"
                                            placeholder="meeting password">
                                            </x-form-input>
                                            <x-error-message name="meeting_password"></x-error-message>
                                    </div>
                                    <div class="w-full my-8">
                                        <label for="duration" class="w-full">Duration</label>
                                        <x-form.input type="time" name="duration" id="input-duration"
                                            style="color-scheme: dark;">
                                            </x-form-input>
                                            <x-error-message name="duration"></x-error-message>
                                    </div>
                                </div>
                                <div class="w-full flex mt-4 mb-4">
                                    <div class="w-1/3 text-center">
                                        <div class="w-full my-2 flex justify-center relative">
                                            <x-form.file name="image" id="input-image" @change="previewImage(event)" />
                                            <x-error-message name="image" class="-bottom-7"></x-error-message>
                                        </div>
                                        <div class="w-full mt-8">
                                            <label for="is_published" class="w-full">Show to Everyone</label>
                                            <x-form.toggle-switch name="is_published" id="input-is-published" />
                                            <x-error-message name="is_published"></x-error-message>
                                        </div>
                                    </div>
                                    <div class="w-2/3 h-44 pl-4">
                                        <img id="preview-image"
                                            src="{{ asset('images/preview-image-placeholder.png') }}"
                                            class="object-contain object-center w-full h-full pointer-events-none"
                                            alt="Preview Image">
                                    </div>
                                </div>
                                <div class="w-full flex justify-between">
                                    <div class="w-1/4 mx-20">
                                        <x-button.primary>
                                            Save
                                        </x-button.primary>
                                    </div>
                                    <div class="w-1/4 mx-20">
                                        <x-button.secondary type="button" @click="closeSaveModal()">
                                            Cancel
                                        </x-button.secondary>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Confirm Modal -->
            <div x-show="deleteConfirmModalOpen"
                class="overflow-y-auto overflow-x-hidden fixed w-full h-full z-20 flex justify-center items-center inset-0">
                <!-- Blank Screen -->
                <div class="fixed bg-secondary/[0.5] w-full h-full z-20 inset-0"></div>
                <div class="z-30" @click.away="closeDeleteConfirmModal()">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-secondary">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button @click="closeDeleteConfirmModal()" type="button"
                                class="text-muted bg-transparent hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg class="mx-auto mb-4 w-14 h-14 stroke-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-muted">Are you sure you want to remove this
                                meeting?</h3>
                            <form id="deleteForm" class="flex justify-between gap-4" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button.delete>
                                    Yes, I'm sure
                                </x-button.delete>
                                <x-button.secondary type="button" @click="closeDeleteConfirmModal()">
                                    No, cancel
                                </x-button.secondary>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-button.floating @click="openSaveModal()" />
        @endauth
</div>
<div>{{ $meetings->links() }}</div>

@section('scripts')
    <script>
        var alpineData = {
            meetings: @json($allMeetings),
            currentUrl: "{{ route('home') }}",
            defaultProfileUrl: "{{ asset('images/avator.png') }}",
            previewImageUrl: "{{ asset('images/preview-image-placeholder.png') }}",
            isErrorExist: {{ ($errors->isEmpty()) ? 'false' : 'true' }},
            oldValueList: @json(session()->getOldInput())
        }
    </script>
    <script src="{{ mix('js/home.js') }}"></script>
@endsection
</x-app-layout>
