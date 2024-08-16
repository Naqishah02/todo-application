<x-layouts>
<x-guest />
    @auth
        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Hello there</h1>
                    <p class="py-6">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                        quasi. In deleniti eaque aut repudiandae et a id nisi.
                    </p>
                    <a href="{{ route('tasks') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    @endauth

</x-layouts>

