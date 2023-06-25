@if ($cart && array_key_exists($productId, $cart))
    <a href="{{ route('cart') }}" style="pointer-events: auto; cursor: pointer;"
        class="relative flex pointer-events-auto bg-green-500 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-100 hover:bg-green-700">
        View cart
    </a>
@else
    <a style="pointer-events: auto; cursor: pointer;" data-id="{{ $productId }}"
        class="add-to-cart relative flex pointer-events-auto bg-indigo-500 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-100 hover:bg-indigo-700">
        Add to cart
    </a>
@endif
