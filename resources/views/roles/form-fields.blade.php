<div class="flex flex-col gap-10 text-[18px]">
    <div class="flex flex-col gap-2">
        <label for="">Nombre:</label>
        <input class="h-10 border-2 rounded-xl" value="{{ old('name', $role->name) }}" type="text" id="name" name="name">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-col gap-2">
        <label for="description">Descripccion:</label>
        <textarea class="h-10 border-2 rounded-xl" value="{{ old('description', $role->description) }}" name="description" id="description" cols="30" rows="30">
            {{ old('description', $role->description) }}
        </textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>