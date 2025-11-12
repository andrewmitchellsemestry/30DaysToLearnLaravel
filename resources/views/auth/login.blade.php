<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <div class="space-y-4">

        <form method="POST" action="/login">
        <!-- This @csrf is used to prevent CSRF. If you see a 419 error page, it is probably due to this being missing -->
        @csrf

            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

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

                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href='/'  class="text-sm/6 font-semibold text-white">Cancel</a>
                <x-form-button>Login</x-form-button>
            </div>
        </form>


    </div>



</x-layout>