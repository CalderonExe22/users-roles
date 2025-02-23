<x-layouts.app meta-title='asign role'>
    <div class="flex flex-col gap-5">
        <h1 class="text-6xl font-light">Asignar Roles a {{ $user->name }}</h1>
        <p>Administra los roles a usuarios especificos, ya sea agregando o quitando roles</p>
        <form class="form-roles flex flex-col gap-5" action="{{ route('users.assign-roles.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-5 text-2xl">
                <label for="roles">Roles:</label>
                @foreach($roles as $role)
                    <div>
                        <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}"
                            {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                        <label for="role_{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
            <button class="p-3 w-1/2 cursor-pointer rounded-3xl transition-colors bg-black text-white hover:bg-white hover:text-black hover:outline-2" type="submit">Guardar cambios</button>
        </form>
    </div>
<script>
    document.querySelectorAll('.form-roles').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Desea actualizar los roles de este usuario",
                text: "El usuario se asignaran o quitaran roles.",
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
</script>
</x-layouts.app>