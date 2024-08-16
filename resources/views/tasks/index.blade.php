<x-layouts>
    <div class="w-full mt-2 p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold mb-4 font-mono">All Tasks</h1>
            <div>
                <a href="{{ route('tasks') }}" class="btn btn-sm">Pending</a>
                <a href="{{ route('completed') }}" class="btn btn-sm btn-success">Completed</a>
            </div>
        </div>

        <form action="/tasks" method="post">
            @csrf
            <div class="mb-4 flex">
                <input type="text" placeholder="Add a new task..."
                       name="name"
                       class="flex-1 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600">Add</button>
            </div>
        </form>

        <ul class="list-none p-0 m-0 space-y-2">
            <!-- Example Task Item -->
                            @foreach($tasks as $task)
            <li class=" {{ $task->completed ? 'hidden' : 'flex items-center p-2 border-b border-gray-300' }} ">
                <form method="post" action="/tasks/{{$task->id}}">
                    @csrf
                    <button>
                        <div class="mr-3">
                            @if(!$task->completed)
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="3" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"/>
                                </svg>
                            @endif
                        </div>
                    </button>
                </form>
                                        <span class="flex-1
{{--                                            @if($task->completed)--}}
{{--                                               line-through--}}
{{--                                            @endif--}}
                                        ">{{ $task->name }}

                                        </span>

                    @if(!$task->completed)
                    <div class="absolute right-96 ml-32 badge">Pending</div>
                    @endif
{{--                Edit     --}}
                <a href="/tasks/{{$task->id}}" class="px-3 py-1 text-gray-600 hover:bg-gray-200 rounded-md mr-2">Edit</a>
                <form method="post" action="/tasks/{{$task->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 text-red-600 hover:bg-red-200 rounded-md">Delete</button>
                </form>
            </li>
                            @endforeach
            <!-- More tasks will be added here -->
        </ul>
    </div>
    <div class="mt-5 mx-3">
        {{ $tasks->links() }}
    </div>
</x-layouts>
