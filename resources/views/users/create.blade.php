<x-layouts.app meta-title='create user'>
    <div class="flex flex-col gap-12 pt-10 h-full">
        <h1 class="font-light text-7xl">Crear un usuario</h1>
        <form class="flex flex-col gap-10" action="{{ route('users.store') }}" method="post">
            @csrf
            @include('users.form-fields')
            <button class="p-3 w-1/2 cursor-pointer rounded-3xl transition-colors bg-black text-white hover:bg-white hover:text-black hover:outline-2" type="submit">Crear usuario</button>
        </form>
    </div>
</x-layouts.app>