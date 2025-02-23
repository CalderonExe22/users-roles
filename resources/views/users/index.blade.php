
<x-layouts.app meta-title='users'>

    <div class="flex flex-col gap-24 w-full p-10">
        <div class="flex justify-between items-center">
            <h1 class=" font-light text-5xl">Usuarios registrados</h1>
            <a class="py-2 px-10 font-medium text-white bg-black " href="{{ route('users.create') }}">
                Crear usuario <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="flex flex-col h-full w-full border-2">
            <div class="flex justify-center items-center gap-3 p-3 text-left w-full bg-black text-white border-b-2">
                <div class="flex-1 font-bold p-2">
                    <span>Nombre usuario</span>
                </div>
                <div class="flex-1 font-bold p-2">
                    <span>Correo electronico</span>
                </div>
                <div class="flex-1 font-bold p-2">
                    <span>Fecha de creacion</span>
                </div>
                <div class="flex-1 font-bold p-2">
                    <span>Estado</span>
                </div>
                <div class="flex-1 font-bold p-2">
                    <span>Roles</span>
                </div>
                <div class="flex-1 p-2">
                </div>
            </div>
            @foreach ($users as $user)
                <div class="flex justify-center items-center gap-3 p-3 text-left w-full border-b-2">
                    <div class="flex-1 p-2 text-left">
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="flex-1 p-2">
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="flex-1 p-2">
                        <span>{{ $user->created_at }}</span>
                    </div>
                    <div class="flex-1 p-2">
                        <span>{{ $user->deleted_at === NULL ? 'Activo' : 'No activo' }}</span>
                    </div>
                    <div class="flex-1 flex flex-col p-2">
                        @forelse($user->roles as $role)
                        <a href="{{route('roles.show', $role)}}">{{ $role->name }}</a>
                        @empty
                            <p>Sin roles asignados.</p>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-3 flex-1 p-2 text-[18px]">
                        @can('delete', $user)
                            @if ($user->trashed())
                            <form class="form-restore" action="{{ route('users.restore', $user->id) }}" method="POST">
                                @csrf
                                <button class="cursor-pointer" type="submit">Restaurar <i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            </form>
                        
                            <form class="form-force-delete" action="{{ route('users.forceDelete', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="cursor-pointer" type="submit">Eliminar <i class="fa-solid fa-trash"></i></button>
                            </form>
                        @else
                            <form class="form-delete" action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="cursor-pointer" type="submit">Deshabilitar <i class="fa-solid fa-circle-xmark"></i></button>
                            </form>
                        @endif
                        @endcan
                    @can('update', $user)
                        @if (!$user->trashed())
                            <form class="form-edit" action="{{ route('users.edit', $user) }}" method="GET">
                                @csrf
                                <button class="cursor-pointer" type="submit">Editar <i class="fa-solid fa-pen"></i></button>
                            </form>
                        @endif
                    @endcan
                    @can('update', $user)
                        <a href="{{ route('users.assign-roles.edit', $user)}}">
                            Administrar roles <i class="fa-solid fa-screwdriver-wrench"></i>
                        </a>
                    @endcan
                        <a href="{{ route('users.show', $user) }}">
                            Ver <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>


<script>

    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Deshabilitar este usuario",
                text: "El usuario no estara activo.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, deshabilitar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    document.querySelectorAll('.form-restore').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Restaurar este usuario?",
                text: "El usuario volverá a estar activo.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, restaurar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Confirmación para eliminar definitivamente
    document.querySelectorAll('.form-force-delete').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Eliminar definitivamente?",
                text: "¡Esta acción no se puede deshacer!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar definitivamente",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>