<x-layouts.app  meta-title='show role'>
    <div class="flex flex-col gap-10">
        <h1 class="text-7xl font-light">Detalles del rol</h1>
        <div class="flex flex-col gap-10">
            <h1 class="text-3xl">Nombre del rol: {{ $role->name }}</h1>
            <p class="text-3xl">Descripcion del rol: {{ $role->description }}</p>
            <p class="text-3xl">Rol creado: {{ $role->created_at }}</p>
            <p class="text-3xl">Estado: {{ $role->deleted_at === NULL ? 'Activo' : 'No activo' }}</p>
        </div>
    </div>
</x-layouts.app>