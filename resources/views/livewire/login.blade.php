<div class="bg-cover bg-center h-screen relative" style="background-image: url('{{ asset('assets/latar.jpg') }}')">
    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>

<!-- Box Form -->
<div class="flex items-center justify-center h-screen relative z-10">
    <div class="bg-purple-200 bg-opacity-70 rounded-xl shadow-lg px-10 py-8 w-[420px] border-[3px] border-black">

        <!-- Logo -->
        <div class="flex flex-col items-center">
            <div class="h-[130px] w-full flex justify-center items-center overflow-hidden">
                <img src="{{ asset('assets/logo.png') }}" class="w-[370px] object-contain" alt="logo">
            </div>
        </div>

        <!-- Bungkus Form & Judul -->
        <div class="border border-black rounded p-4">
            <h2 class="text-center text-xl font-bold text-black mb-4">ADMIN</h2>

            <!-- Form Login -->
            @if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded text-sm mb-4 text-center">
        {{ session('error') }}
    </div>
@endif

            <form wire:submit.prevent="login" class="space-y-4">
                <div>
                    <input type="text" placeholder="username"
                        wire:model="username"
                        class="w-full bg-gray-100/80 px-4 py-2 rounded border border-gray-400 focus:outline-none text-sm">
                    @error('username') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input type="password" placeholder="password"
                        wire:model="password"
                        class="w-full bg-gray-100/80 px-4 py-2 rounded border border-gray-400 focus:outline-none text-sm">
                    <div class="flex justify-between items-center text-xs mt-1">
                        @error('password') <p class="text-red-600">{{ $message }}</p> @enderror
                      
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-gray-300 hover:bg-gray-400 text-black font-semibold py-2 rounded">Masuk</button>
                </div>
            </form>
        </div>

    </div>
</div>


</div>
