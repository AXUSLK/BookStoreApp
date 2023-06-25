@extends('layouts.app')

@section('head')
    <title> Online Book Store - WrightWay </title>
@endsection

@section('page-content')
    <!-- start category -->
    <section>
        <div class="bg-white">
            <div class="max-w-xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Shop by Collection</h2>
                <p class="mt-4 text-base text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                    urna ante, feugiat sit amet orci in, finibus interdum massa.
                </p>

                <div class="mt-10  lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    @foreach ($categories as $category)
                        <a href="{{ route('shop.category', $category->slug) }}" class="">
                            <div
                                class="container mx-auto p-4 bg-white max-w-sm rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300">
                                <img class="rounded-xl h-72" src="{{ $category->image }}" alt="" />
                                <div class="flex justify-between items-center">
                                    <div class="mt-2">
                                        <h1 class="mt-5 text-2xl font-semibold">
                                            {{ $category->name }}
                                        </h1>
                                        <p>
                                            {{ $category->products()->active()->count() }} Books
                                        </p>
                                    </div>
                                    <div class="mt-2">
                                        <button
                                            class="text-white mt-5 text-md font-semibold bg-green-400 py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-500 transform-gpu hover:scale-110 ">
                                            Shop
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->

    <!-- start shop -->
    <section>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white">
            <div class="max-w-xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-4">
                <h2 class="text-xl font-bold text-gray-900">Best Selling Books</h2>

                <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($recentProducts as $product)
                        <div>
                            <div class="relative">
                                <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                    <img src="{{ $product->thumb_image }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-center object-cover">
                                </div>
                                <div class="relative mt-4">
                                    <h3 style="max-width: 250px;" class="text-sm font-medium text-gray-900 truncate">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $product->category?->name }}
                                    </p>
                                </div>
                                <div
                                    class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                    <div aria-hidden="true"
                                        class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50">
                                    </div>
                                    <p class="relative text-lg font-semibold text-white">
                                        {{ $product->price }} LKR
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <x-add-to-cart-button :cart="session('cart')" :productId="$product->id" />
                            </div>
                        </div>
                    @endforeach
                    <!-- More products... -->
                </div>
            </div>
        </div>

    </section>
    <!-- end shop -->
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-to-cart").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                var productId = ele.attr('data-id');
                var url = "{{ route('add.to.cart', ['id' => ':productId']) }}";
                url = url.replace(':productId', productId);
                addProductToCart(ele, url, productId);
            });
        });
    </script>
@endsection
