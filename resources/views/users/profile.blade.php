<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>

    <div class="flex justify-center">

        <!-- Profile form -->
        <div class="card size-100 bg-base-100 shadow mt-20 items-center h-full">
            <div class="card-body">
                <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full">
                        <div class="flex flex-col items-center justify-center p-4">
                        @if(auth()->user()->picture)
                            <img id="picture-image" src="{{ asset('storage/images/' . auth()->user()->picture) }}" alt="Profile picture" class="rounded-full size-40">
                        @else
                            <img id="picture-image" src="{{ asset('images/placeholders/profile.png')}}" alt="Profile picture" class="rounded-full size-40">
                        @endif

                            <div class="flex justify-center p-2">                                                    
                                <button id="picture-button" type="button" class="btn btn-ghost btn-sm text-base">Change</button>
                            </div>
                            
                            <div id="picture-input" class="flex items-center justify-center w-70 hidden ">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-25 bg-neutral-secondary-medium border border-dashed rounded-sm hover:bg-gray-200 border-default-strong rounded-base cursor-pointer hover:bg-neutral-tertiary-medium">
                                    <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/></svg>
                                        <p class="mb-2 text-sl"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs">SVG, PNG, or JPG</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="profile-picture" class="hidden" />
                                </label>
                            </div> 

                        </div>
                        <div class="flex mt-5 justify-center">
                            <label for="name" class="floating-label mb-6">
                                <input type="text"
                                    name="name"
                                    placeholder="Name"
                                    value="{{ auth()->user()->name }}"
                                    class="input w-70 input-bordered @error('name') input-error @enderror"
                                    required>
                                <span>Name</span>
                            </label>
                        </div>
                        @error('name')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-2 flex items-center justify-end mb-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>



</x-layout>