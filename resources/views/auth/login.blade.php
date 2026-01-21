<x-layout>
  <x-slot:judul>{{ $title }}</x-slot:judul>

  <body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"
          class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">
          Sign in to your account</h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form method="POST" action="{{ route('login.process') }}" class="space-y-6">
          @csrf
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Email
              address</label>
            <div class="mt-2">
              <input id="email" type="email" name="email" required autocomplete="email"
                class="block w-full rounded-md border-0 bg-white px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:text-white dark:ring-gray-700"
                value="{{ old('email') }}" />
              @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password"
                class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Password</label>
              <div class="text-sm">
                <a href="#"
                  class="font-semibold text-indigo-600 hover:text-indigo-500 dark:hover:text-indigo-400">Forgot
                  password?</a>
              </div>
            </div>
            <div class="mt-2">
              <input id="password" type="password" name="password" required autocomplete="current-password"
                class="block w-full rounded-md border-0 bg-white px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:text-white dark:ring-gray-700" />
              @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox"
              class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 dark:border-gray-600 dark:bg-gray-700">
            <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-white">Remember
              me</label>
          </div>

          @if ($errors->any())
            <div class="rounded-md bg-red-50 dark:bg-red-900/20 p-4">
              <div class="text-sm text-red-800 dark:text-red-200">
                <p class="font-medium">Terjadi kesalahan:</p>
                <ul class="mt-2 list-inside list-disc">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif

          <div>
            <button type="submit"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
              in</button>
          </div>
        </form>
      </div>
    </div>

  </body>
</x-layout>