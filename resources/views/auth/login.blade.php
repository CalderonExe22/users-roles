<x-layouts.auth  meta-title='Login'>
    <div class="flex justify-center items-center w-full h-full">
        @session('status')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @endsession
        <div class="flex flex-col gap-10">
            <h1 class="font-light text-6xl text-center">Iniciar sesion</h1>
            <span class="font-light text-[16px] text-center">Inicia sesion con un usuario autorizado antes de interactuar en la pagina</span>
            <form class="flex flex-col gap-10" method="POST" action="{{ route('auth.login.submit') }}">
                @csrf
                <div class="flex flex-col gap-3">
                    <label for="email">Correo electronico</label>
                    <input value="{{old('email')}}" class="border-2 rounded-4xl" type="email" class="form-control" id="email" name="email">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-3">
                    <label for="password">Contraseña</label>
                    <input value="{{old('password')}}" class="border-2 rounded-4xl" type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="rounded-2xl transition-colors bg-black text-white p-2 hover:outline-2 hover:bg-white hover:text-black">Iniciar sesión</button>
            </form>
        </div>
    </div>
</x-layouts.auth>