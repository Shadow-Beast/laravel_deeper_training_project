<x-guest-layout>
    <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
        <div class="flex flex-col md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img class="object-cover w-full h-full pointer-events-none"
                    src="https://source.unsplash.com/user/erondu/1600x900" alt="img" />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2 bg-secondary">
                <form action="{{ route('login') }}" method="post" class="w-full">
                    @csrf
                    <div class="flex justify-center">
                        <img class="w-20 h-20" src="{{ asset('images/logo.svg') }}" alt="Logo">
                    </div>
                    <h1 class="mb-4 text-2xl font-bold text-center text-primary">
                        Login to Your Account
                    </h1>
                    <div>
                        <label class="block text-sm text-white">
                            Email
                        </label>
                        <x-form.input class="input" type="email" name="email" placeholder="" />
                    </div>
                    <div>
                        <label class="block mt-4 text-sm text-white">
                            Password
                        </label>
                        <x-form.input class="input" type="password" name="password" placeholder="" />
                    </div>
                    <div class="mt-4 flex justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <x-form.checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-muted">Remember Me</span>
                        </label>
                        <a class="text-sm text-primary hover:underline" href="#">
                            Forgot your password?
                        </a>
                    </div>

                    <x-button.primary class="mt-4">Log in</x-button.primary>

                    <hr class="my-8 border-white" />

                    <div class="flex items-center justify-center gap-4">
                        <x-link.primary-outline href="{{ route('facebook.login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5 mr-2">
                                <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993"
                                    y2="40.615" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#2aa4f4" />
                                    <stop offset="1" stop-color="#007ad9" />
                                </linearGradient>
                                <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)"
                                    d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z" />
                                <path fill="#fff"
                                    d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z" />
                            </svg>
                            Facebook
                        </x-link.primary-outline>                        

                        <x-link.primary-outline href="{{ route('google.login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                class="w-4 h-4 mr-2" viewBox="0 0 48 48">
                                <defs>
                                    <path id="a"
                                        d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                </defs>
                                <clipPath id="b">
                                    <use xlink:href="#a" overflow="visible" />
                                </clipPath>
                                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                            </svg>
                            Google
                        </x-link.primary-outline>

                        {{-- <x-button.primary-outline>
                            <svg class="w-4 h-4 mr-2" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                            Github
                        </x-button.primary-outline> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-guest-layout>
