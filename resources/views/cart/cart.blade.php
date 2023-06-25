@extends('layouts.app')

@section('head')
    <title> Online Book Store - Shopping Cart </title>
@endsection

@section('page-content')
    <section>
        <div class="bg-white">

            <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl mb-8">
                    <div class="flex items-center">
                        <span class="mr-4">Shopping Cart</span>
                        <svg fill="none" class="h-8" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                            </path>
                        </svg>
                    </div>
                </h1>

                @if (session('success'))
                    <x-messages.success :success="session('success')" />
                @endif

                @if (session()->has('discount'))
                    <x-messages.discount :discount="session('discount')" />
                @endif

                @if (session('cart'))
                    <form class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                        <section aria-labelledby="cart-heading" class="lg:col-span-7">
                            <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                            <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                                @foreach (session('cart') as $id => $details)
                                    <li class="flex py-3 sm:py-5" data-id="{{ $id }}">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $details['image'] }}"
                                                class="w-24 h-24 rounded-md object-center object-contain sm:w-24 sm:h-24">
                                        </div>

                                        <div class="ml-4 flex-1 flex flex-col justify-center sm:ml-6">
                                            <div class="relative pr-9 sm:grid sm:grid-cols-1 sm:gap-x-6 sm:pr-0">
                                                <div>
                                                    <div class="mt-1 text-sm font-medium text-gray-900">
                                                        <h3 class="text-md text-blue-700">
                                                            {{ $details['name'] }}
                                                        </h3>
                                                    </div>
                                                    <p class="mt-1 text-sm font-medium text-gray-900">
                                                        <strong>Amount:</strong> {{ $details['price'] }} LKR
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-900">
                                                        <strong>Category:</strong> {{ $details['category'] }}
                                                    </p>
                                                </div>

                                                <div class="mt-4 sm:mt-0 sm:pr-9">
                                                    <div class="absolute top-0 right-0">
                                                        <button type="button"
                                                            class="remove-from-cart -m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                            <span class="sr-only">Remove</span>
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>

                        <!-- Order summary -->
                        <section aria-labelledby="summary-heading"
                            class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                            <h2 id="summary-heading" class="text-lg font-extrabold text-gray-800">Order Summary</h2>
                            {{-- <span>{{}}</span> --}}

                            <dl class="mt-6 space-y-4">
                                @foreach (session('cart') as $id => $details)
                                    <div class="flex items-center justify-between">
                                        <dt class="text-sm text-gray-600">
                                            {{ $i . '.' }}
                                        </dt>
                                        <dt class="text-sm text-gray-600">
                                            {{ $details['name'] }}
                                        </dt>
                                        <dd class="text-sm font-medium text-gray-900">
                                            {{ $details['price'] }} LKR
                                        </dd>
                                    </div>
                                    @php $i++ @endphp
                                @endforeach

                                <div class="border-t border-gray-200 pt-4 space-y-4">
                                    <div class="flex items-center justify-between">
                                        <dt class="text-sm text-gray-600">
                                            Subtotal
                                        </dt>
                                        <dd class="text-sm font-medium text-gray-900">
                                            {{ number_format($totalPrice, 2, '.', ',') }} LKR
                                        </dd>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <dt class="flex text-sm text-gray-600">
                                            <span>Tax estimate</span>

                                            <!-- Component Start -->
                                            <div
                                                class="mx-2 relative flex flex-col items-center group text-gray-400 hover:text-gray-500">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div
                                                    class="absolute bottom-0 flex flex-col items-center hidden mb-6 group-hover:flex">
                                                    <span
                                                        class="relative z-10 p-4 text-xs whitespace-nowrap text-white  bg-black shadow-lg">
                                                        Please note that additional charges may apply for online payments.
                                                    </span>
                                                    <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                                </div>
                                            </div>
                                            <!-- Component End  -->
                                        </dt>
                                        <dd class="text-sm font-medium text-gray-900">3.5%</dd>
                                    </div>
                                </div>

                                <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                                    <dt class="text-base font-medium text-gray-900">Order Total</dt>
                                    <dd class="text-base font-medium text-gray-900">
                                        {{ number_format($totalPrice, 2, '.', ',') }} LKR</dd>
                                    </dd>
                                </div>
                            </dl>

                            <div class="mt-6 flex justify-end items-center">
                                <a href="{{ route('checkout') }}"
                                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-4 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </section>
                    </form>
                @else
                    <div class="mb-32 mt-12">
                        <div class="rounded-md bg-red-100 p-4 mt-8">
                            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                                <div class="text-center">
                                    <h2 class="font-semibold text-indigo-600 tracking-wide uppercase">
                                        <i class="text-8xl icon-cart2" style="font-size: 4rem !important;"></i>
                                    </h2>
                                    <p
                                        class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                                        shopping cart is empty</p>
                                    <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                                        Browse our extensive selection of courses and start adding them to your cart
                                        to kickstart your learning journey with us</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 flex justify-end">
                            <a href="{{ route('shop') }}"
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".remove-from-cart").click(function(e) {
                e.preventDefault();
                var item = $(this);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('remove.from.cart') }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: item.parents("li").attr("data-id")
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Item has been successfully removed.',
                                    'success'
                                ).then((result) => {
                                    window.location.reload();
                                })
                            },
                            error: function(request, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: error,
                                })
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            'Cancelled',
                            'Your items are safe :)',
                            'error'
                        )
                    }
                })
            });
        });
    </script>
@endsection
