<div class="m-auto w-1/2 mb-4">
    <h3 class="text-lg text-black mb-3">Login</h3>
    @if(isset($loginMessage))
    <div class="my-3 text-red-600">{{$loginMessage}}</div>
    @endif
    <form wire:submit="authenticate">
        <div class="mb-3">
            <label for="" class="block">Email</label>
            <input 
                type="text" 
                id="email-address" 
                class="p-2 w-full border rounded-md bg-gray-700 text-white"
                wire:model="email"
            >
            <div>
                @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="block">Password</label>
            <input 
                type="password" 
                id="password" 
                class="p-2 w-full border rounded-md bg-gray-700 text-white"
                wire:model="password"

            >
            <div>
                @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <button
                class="text-gray-200 p-2 bg-blue-700 rounded-sm disabled:opacity-75 disabled:bg-blue-300"
                type="submit"
            >
                Login
            </button>
        </div>
    </form>
</div>
