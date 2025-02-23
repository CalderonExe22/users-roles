<x-layouts.app meta-title='show user'>
    <div class="flex flex-col gap-10">
        <h1 class="text-7xl font-light">Detalles del usuario</h1>
        <div class="flex flex-col gap-10">
            <h1 class="text-3xl">Nombre: {{ $user->name }}</h1>
            <p class="text-3xl">Correo electronico: {{ $user->email }}</p>
            <p class="text-3xl">Usuario creado: {{ $user->created_at }}</p>
            <p class="text-3xl">Estado: {{ $user->deleted_at === NULL ? 'Activo' : 'No activo' }}</p>
            <div class="flex flex-col gap-1.5">
                <p class="text-3xl">Roles:</p>
                    @forelse($user->roles as $role)
                        <a href="{{route('roles.show', $role)}}" class="text-xl ms-3">{{ $role->name }}</a>
                    @empty
                        <p class="text-xl ms-3">Este usuario no tiene roles asignados.</p>
                    @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>