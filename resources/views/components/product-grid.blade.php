<div class="py-2">
    <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
        <img src="{{ $product->main_image }}" loading="lazy" alt="{{ $product->name }}"
            class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
    </a>

    <div class="bg-gray-100 p-4">
        <div class="flex items-start justify-between gap-2 rounded-b-lg">
            <div class="flex flex-col">
                <a href="#" style="max-width: 300px;"
                    class="font-bold text-gray-800 transition duration-100 truncate hover:text-gray-500 lg:text-lg">
                    {{ $product->name }}
                </a>
            </div>

            <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">
                    {{ $product->price }} LKR
                </span>
            </div>
        </div>

        <div class="flex items-center justify-between mt-2">
            <span class="text-sm text-gray-500 lg:text-base">
                {{ $product->category?->name }}
            </span>
            <button class="text-white text-md font-semibold bg-indigo-500 py-2 px-4 rounded-lg ">
                Add to cart
            </button>
        </div>
    </div>
</div>
