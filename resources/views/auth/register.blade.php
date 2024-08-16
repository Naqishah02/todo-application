<x-layouts>
    <div class="flex items-center justify-center mt-24">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Register</h2>

            <form method="post" action="{{ route('register') }}">
                @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="formLabel">Name</label>
                    <input type="text" id="name" name="name" class="formInput" placeholder="John Doe" >
                    @error('name')
                    <p class="text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

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
                    <button type="submit" class="formBtn">Register</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </div>

</x-layouts>
