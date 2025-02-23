<x-layouts.app  meta-title='home'>

    <div class="flex flex-col gap-16 h-full w-full">
        <div class="w-full">
            <h1 class="text-7xl font-light">Bienvenido {{ $user->name }}.</h1>
        </div>
        <div class="grid grid-cols-4 grid-rows-2 gap-10">
            <div class="bg-[#F6F6F6] rounded-3xl p-10 col-span-2 flex flex-col gap-3">
                <h1 class="text-5xl font-light" >Usuarios Posee rol/es de: </h1>
                @forelse($user->roles as $role)
                    <a href="{{route('roles.show', $role)}}" class="text-5xl">{{ $role->name }}</a>
                @empty
                    <a class="text-5xl">Este usuario no tiene roles asignados.</a>
                @endforelse
            </div>
            <div class="bg-[#F6F6F6] rounded-3xl p-10 col-span-2">
                <h1 class="text-5xl font-light" >Roles registrados en la plataforma: {{ $rolesAll->count()}}</h1>
            </div>
            <div class="bg-[#F6F6F6] rounded-3xl p-10 col-span-4">
                <h1 class="text-5xl font-light" >Usuarios registrados en la plataforma: {{ $userAll->count()}}</h1>
            </div>
        </div>
    </div>

</x-layouts.app>