<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <div class="space-y-4">

        <form method="POST" action="/register">
        <!-- This @csrf is used to prevent CSRF. If you see a 419 error page, it is probably due to this being missing -->
        @csrf
        @method('POST')

            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <x-form-field>
                            <x-form-label for='first_name'>Name</x-form-label>
                            
                            <div class="mt-2">

                                <x-form-input id="first_name" name="first_name" type=text placeholder="Callie" required/>
                                
                                <x-form-error name="first_name"/>
                                
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>
                            <div class="mt-2">

                                <x-form-input id="last_name" type="text" name="last_name" placeholder="Yomcher" required/>
                                
                                <x-form-error name='last_name'/>

                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="email">Email</x-form-label>
                            <div class="mt-2">

                                <x-form-input id="email" type="email" name="email" placeholder="yomcher@aol.com" required/>
                                
                                <x-form-error name='email'/>

                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="password">Password</x-form-label>
                            <div class="mt-2">

                                <x-form-input id="password" type="password" name="password" placeholder="*****" required/>
                                
                                <x-form-error name='password'/>

                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <div class="mt-2">

                                <x-form-input id="password_confirmation" type="password" name="password_confirmation" placeholder="*****" required/>
                                
                                <x-form-error name='password_confirmation'/>

                            </div>
                        </x-form-field>


                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href='/'  class="text-sm/6 font-semibold text-white">Cancel</a>
                <x-form-button>Register</x-form-button>
            </div>
        </form>


    </div>



</x-layout>