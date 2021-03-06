<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Register your account
            </h2>
        </div>
        <form wire:submit.prevent="register" class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Email address</label>
                    <input wire:model="name" id="name" name="name" autocomplete="name" class="@error('name') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Your Name">
                    @error('name') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input wire:model="email" id="email-address" name="email" type="email" autocomplete="email" class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    @error('email') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input wire:model.lazy="password" id="password" name="password" type="password" autocomplete="current-password" class="@error('password') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    @error('password') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="passwordConfirmation" class="sr-only">Password Confirmation</label>
                    <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" type="password" class="@error('passwordConfirmation') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Confirmation">
                    @error('passwordConfirmation') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd" />
                </svg>
          </span>
                    Register
                </button>
            </div>
        </form>

        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Already have an account?
            </a>
        </p>
    </div>
</div>
