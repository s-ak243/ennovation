<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <label for="first_name" class='block font-medium text-sm text-gray-700'>First Name</label>

                <input id="first_name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       type="text" name="first_name" value="{{old('first_name')}}" required autofocus />
            </div>
<!-- Last Name -->
                <div class="mt-4">
                    <label for="last_name"class='block font-medium text-sm text-gray-700'>Last Name</label>

                    <input id="last_name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           type="text" name="last_name" value="{{old('last_name')}}" required />
                </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class='block font-medium text-sm text-gray-700'>Email Id</label>

                <input id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       type="email" name="email" value="{{old('email')}}" required />
            </div>

                <!-- Mobile No. -->
                <div class="mt-4">
                    <label for="mobile_no" class='block font-medium text-sm text-gray-700'>Mobile No.</label>

                    <input id="mobile_no" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           type="text" name="mobile_no" value="{{old('mobile_no')}}" required oninput='this.value=(parseInt(this.value)||" ")' placeholder="+91" maxlength="10"/>
                </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class='block font-medium text-sm text-gray-700'>Password</label>

                <input id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class='block font-medium text-sm text-gray-700'>Confirm Password</label>

                <input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="reset" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition
                ease-in-out duration-150" onClick="window.location.reload();">
                    {{ __('Cancel') }}
                </button>
                <button type= "submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition
                ease-in-out duration-150">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
