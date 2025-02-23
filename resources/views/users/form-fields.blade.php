<div class="flex flex-col gap-10 text-[18px]"> 
    <div class="flex flex-col gap-2">
        <label for="name">Nombre:</label>
        <input class="h-10 border-2 rounded-xl" value="{{ old('name', $user->name) }}" type="text" id="name" name="name">
        @error('name')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <div class="flex flex-col gap-2">
        <label for="email">Correo electronico:</label>
        <input class="h-10 border-2 rounded-xl" value="{{ old('email', $user->email) }}" type="email" id="email" name="email">
        @error('email')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <div class="flex flex-col gap-2">
        <label for="password">Contraseña:</label>
        <input class="h-10 border-2 rounded-xl" value="{{ old('password', $user->password) }}" type="password" id="password" name="password">
        @error('password')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <div class="flex flex-col gap-2">
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input class="h-10 border-2 rounded-xl" type="password" name="password_confirmation" id="password_confirmation" required>
        @error('password')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>
    @if(!$isEdit)
        <div class="flex flex-col gap-2">
            <label for="roles">Roles(mas de uno):</label>
            <select name="roles[]" id="roles" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    
</div>