<x-layouts>
    <div class=" p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Update Task</h2>
        <form action="/tasks/{{$task->id}}" method="post">
            @method('PATCH')
            @csrf
            <div class="mb-4">
                <label for="taskName" class="block text-sm font-medium text-gray-700 mb-1">Task</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{$task->name}}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layouts>
