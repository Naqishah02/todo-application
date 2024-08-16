<x-layouts>
    <div class=" flex items-center justify-center mt-24">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Login</h2>

            <form method="post" action="{{ route('login') }}">
            @csrf
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="formLabel">Email</label>
                    <input type="email" id="email" name="email" class="formInput" placeholder="johndoe@example.com" >
                    @error('email')
                    <p class="text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="formLabel">Password</label>
                    <input type="password" id="password" name="password" class="formInput" placeholder="••••••••" >
                    @error('password')
                    <p class="text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="formBtn">Login</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600 text-sm">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </div>

</x-layouts>
