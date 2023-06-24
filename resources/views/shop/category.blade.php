@extends('layouts.app')

@section('head')
    <title> Online Book Store - WrightWay </title>
@endsection

@section('page-content')
    <section class="py-16">
        <div class="bg-white py-6 sm:py-8 lg:py-24">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2 class="text-center mb-4 md:mb-6 text-2xl font-bold text-gray-800 lg:text-3xl">Online Book Store
                    </h2>

                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                        urna ante, feugiat sit amet orci in, finibus interdum massa.
                    </p>
                </div>
                <!-- text - end -->

                <div class="flex items-center pb-4">
                    <h2 class="text-xl font-bold text-gray-900">{{ $category->name }} Books</h2>
                    <span class="px-2 py-1 mx-2 rounded-full text-white bg-indigo-500">{{ count($products) }}</span>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                    <!-- product - start -->
                    @foreach ($products as $product)
                        <x-product-grid :product="$product" />
                    @endforeach
                    <!-- product - end -->
                </div>
            </div>
        </div>
    </section>
@endsection
