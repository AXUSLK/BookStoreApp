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
                    <span class="px-2 py-1 mx-2 rounded-full text-white bg-indigo-500">
                        {{ $products->total() }}
                    </span>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                    <!-- product - start -->
                    @foreach ($products as $product)
                        <x-product-grid :product="$product" />
                    @endforeach
                    <!-- product - end -->
                </div>

                <div class="my-4">
                    {{ $products->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </section>
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
