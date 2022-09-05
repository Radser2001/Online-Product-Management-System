<nav class="bg-white p-4 fixed w-full z-20 top-0 left-0 border-b border-gray-200">

    <form method="POST" action="{{ route('logout') }}" x-data class="flex items-end justify-end">
        @csrf

        @if (Auth::user())
            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block py-2 pr-4 pl-3 rounded bg-blue-700 text-white hover:text-blue-700 ">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>

        @endif

    </form>

</nav>
