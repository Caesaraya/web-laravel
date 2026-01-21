@auth
<nav
    class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        {{-- LEFT --}}
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg md:hidden hover:bg-gray-100 dark:hover:bg-gray-700">
                ☰
            </button>

            <a href="{{ route('admin.dashboard') }}" class="flex items-center mr-4">
                <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" />
                <span class="text-xl font-semibold dark:text-white">Admin Panel</span>
            </a>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center">
            {{-- USER AVATAR --}}
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                id="user-menu-button"
                data-dropdown-toggle="dropdown-user">
                <img class="w-8 h-8 rounded-full"
                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                    alt="user avatar">
            </button>

            {{-- DROPDOWN --}}
            <div class="hidden z-50 my-4 w-56 bg-white rounded shadow dark:bg-gray-700"
                id="dropdown-user">
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                        {{ Auth::user()->name }}
                    </span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-300">
                        {{ Auth::user()->email }}
                    </span>
                </div>

                <ul class="py-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                            Dashboard
                        </a>
                    </li>
                </ul>

                <ul class="py-1 border-t">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@endauth
