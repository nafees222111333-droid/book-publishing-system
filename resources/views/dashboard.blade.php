<div class="container mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        📚 Publishing Company Dashboard
    </h1>

    <div class="grid grid-cols-4 gap-6">

        <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Total Books</h2>
            <h1 class="text-3xl font-bold">{{ \App\Models\Book::count() }}</h1>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Categories</h2>
            <h1 class="text-3xl font-bold">{{ \App\Models\Category::count() }}</h1>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Users</h2>
            <h1 class="text-3xl font-bold">{{ \App\Models\User::count() }}</h1>
        </div>

        <div class="bg-red-500 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Free Books</h2>
            <h1 class="text-3xl font-bold">
                {{ \App\Models\Book::where('is_free', 1)->count() }}
            </h1>
        </div>

    </div>

</div>