@extends('layouts.public')

@section('title', 'Todas las Categorías')

@section('content')
    <div class="container mx-auto px-4 mt-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 mt-10 mb-12">Todas las Categorías</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category) }}"
                    class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h3>
                        <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                            {{ $category->posts_count }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm">
                        Explora todos nuestros artículos sobre {{ $category->name }}
                    </p>
                    <label
                        class="mt-4 inline-flex items-center px-3 py-1 text-sm font-medium rounded-full border transition duration-150 bg-blue-100 text-blue-800 border-blue-200 hover:bg-blue-200">
                        Ver articulos<i class="fas fa-arrow-right ml-1"></i>
                    </label>


                    {{-- <div class="mt-4 text-blue-600 text-sm font-medium">
                        Ver artículos 
                    </div> --}}
                </a>
            @endforeach
        </div>
    </div>
@endsection
