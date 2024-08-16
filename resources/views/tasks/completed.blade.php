<x-layouts>
    <div class="w-full mt-2 p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold mb-4 font-mono">All Tasks</h1>
            <div>
                <a href="{{ route('tasks') }}" class="btn btn-sm">All Tasks</a>
                <a href="{{ route('completed') }}" class="btn btn-sm btn-success">Completed</a>
            </div>
        </div>
        <ul class="list-none p-0 m-0 space-y-2">
            <!-- Example Task Item -->
            @if(count($tasks) <= 0)
                <h1>No Tasks</h1>
            @endif
            @foreach($tasks as $task)
                <li class="flex items-center p-4 bg-green-100 border border-green-300 rounded-lg shadow-sm">
                    <div class="flex-1 flex items-center">
                        <form method="post" action="/tasks/{{$task->id}}">
                            @csrf
                            <button>
                                <div class="mr-3">
                                    @if($task->completed)
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <!-- Checkbox Outline -->
                                            <rect x="3" y="3" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <!-- Tick Mark -->
                                            <path d="M6 12l4 4 8-8" stroke="currentColor" stroke-width="2" fill="none"/>
                                        </svg>
                                    @endif
                                </div>
                            </button>
                        </form>
                        <span class="text-gray-700">{{ $task->name }}</span>
                        @if($task->completed)
                            <div class="absolute right-96 ml-32 badge badge-success font-semibold ">Completed</div>
                        @endif
                    </div>
                    <div class="ml-4 flex">
                        <a href="/tasks/{{$task->id}}" class="px-3 py-1 text-gray-600 hover:bg-gray-200 rounded-md mr-2">Edit</a>
                        <form method="post" action="/tasks/{{$task->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-red-600 hover:bg-red-100 rounded-md">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-5 mx-3">
        {{ $tasks->links() }}
    </div>
</x-layouts>
