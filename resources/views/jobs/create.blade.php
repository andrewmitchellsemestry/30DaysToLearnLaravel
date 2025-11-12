<x-layout>
    <x-slot:heading>
        Create a Job
    </x-slot:heading>

    <div class="space-y-4">

        <form method="POST" action="/jobs">
        <!-- This @csrf is used to prevent CSRF. If you see a 419 error page, it is probably due to this being missing -->
        @csrf

            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-white">Create a new Job</h2>
                    <p class="mt-1 text-sm/6 text-gray-400">Give us the nuts and bolts</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                    <input id="title" type="text" name="title" placeholder="Shift Leader" class="block min-w-0 grow bg-transparent py-1.5 pr-3 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
                                </div>

                                @error('title')
                                    <p class='text-xs font-semibold text-red-500 mt-2'>{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="salary" class="block text-sm/6 font-medium text-white">Salary</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                    <input id="salary" type="text" name="salary" placeholder="$35,000 per year" class="block min-w-0 grow bg-transparent py-1.5 pr-3 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
                                </div>

                                @error('salary')
                                    <p class='text-xs font-semibold text-red-500 mt-2'>{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>
                    
                    <!-- 
                    <div class='mt-10'>
                        @if($errors->any()) 
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class='text-red-500 italic'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    -->

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
        </form>


    </div>



</x-layout>