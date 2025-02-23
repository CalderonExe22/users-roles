<style>

.active-link::before, .active-link::after {
    content: '';
    position: absolute;
    top: -50px;
    right: 0;
    width: 20px;
    height: 50px;
    border-radius: 0 0 25px 0;
}

.active-link::before
{
    top: auto;
    bottom: -50px;
    border-radius: 0 25px 0 0;
}

.active-link::before {
   box-shadow: 0 -20px 0 0 #fff;
}

.active-link::after {
   box-shadow: 0 20px 0 0 #fff;
}


</style>

<aside class="fixed top-0 left-0 flex flex-col gap-10 bg-black text-white w-[200px] h-screen">
    <div class="p-10">
        <h1 class="font-bold text-2xl">
            My App
        </h1>
    </div>
    <nav>
        <ul class="flex flex-col gap-10 ps-5">
            <li class="relative {{ Route::is('home') ? 'active-link bg-white text-black ' : 'bg-black text-white' }} p-4 rounded-s-[20px]">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="relative {{ Route::is('users.index') ? 'active-link bg-white text-black ' : 'bg-black text-white' }} p-4 rounded-s-[20px]">
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li class="relative {{ Route::is('roles.index') ? 'active-link bg-white text-black ' : 'bg-black text-white' }} p-4 rounded-s-[20px]">
                <a href="{{ route('roles.index') }}">Roles</a>
            </li>
            @auth
                <li class="relative transition-colors mt-32 hover:bg-white hover:text-black p-4 rounded-s-[20px]">
                    <a href="{{ route('auth.logout') }}">Logout</a>
                </li>
            @else
            @endauth
        </ul>
    </nav>
</aside>