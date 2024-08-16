<div class="navbar bg-base-200">
    <div class="flex-1">
        @guest
            <a href="/" class="btn btn-ghost text-xl">TODO</a>
        @endguest
        @auth
                <a href="{{ route('tasks') }}" class="btn btn-ghost text-xl">TODO</a>
        @endauth
    </div>

    <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
            </div>
            @auth
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">

                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                    <li><a>Settings</a></li>
                    <li>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-left w-44">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
