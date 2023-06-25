@extends('layouts.app')

@section('head')
    <title> Online Book Store - Checkout Page</title>
@endsection

@section('page-content')
    <section>
        <div class="bg-white">
            <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">

                <div class="mb-10 md:mb-16">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <div class="flex items-center">
                            <span class="mr-4">Checkout</span>
                            <svg fill="none" class="h-8" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z">
                                </path>
                            </svg>
                        </div>
                    </h1>
                </div>

                <form id="coupon-form" action="{{ route('apply.coupon') }}" method="get">
                    @csrf
                    <div class="grid mt-12 mb-4">
                        <span class="py-2">Do you have a coupon?</span>
                        <input type="text" name="coupon" required id="add-coupon"
                            class="pointer-events-auto block w-1/4 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ Session::has('coupon') ? Session::get('coupon')['code'] : null }}"
                            {{ Session::has('coupon') ? 'disabled' : '' }}>
                        <button type="submit" id="" {{ Session::has('coupon') ? 'disabled' : '' }}
                            style="pointer-events: auto; cursor: pointer;"
                            class="w-1/5 mt-4 bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                            Apply
                        </button>
                    </div>
                </form>

                @if (session('success'))
                    <x-messages.success :success="session('success')" />
                @endif

                @if (session('error'))
                    <x-messages.error :error="session('error')" />
                @endif

                @if (session()->has('discount'))
                    <x-messages.discount :discount="session('discount')" />
                @endif

                <form id="checkout-submit-form" action="" method="get"
                    class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16 pt-8">
                    @csrf
                    <div>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">Contact Information</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <div class="mt-1">
                                        <input type="text" id="first_name" name="first_name"
                                            value="{{ old('first_name') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                        name</label>
                                    <div class="mt-1">
                                        <input type="text" id="last_name" name="last_name" autocomplete="family-name"
                                            value="{{ old('last_name') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email
                                        address</label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email" autocomplete="email"
                                            value="{{ old('email') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <div class="mt-1">
                                        <input type="text" name="phone" id="phone" autocomplete="tel"
                                            value="{{ old('phone') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <div class="mt-1">
                                        <input type="text" name="address" id="address" autocomplete="street-address"
                                            value="{{ old('address') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal
                                        code</label>
                                    <div class="mt-1">
                                        <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code"
                                            value="{{ old('postal_code') }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="note" class="block text-sm font-medium text-gray-700">
                                        Special Note</label>
                                    <div class="mt-1">
                                        <textarea name="note" id="note"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900">Order Summary</h2>

                        <div class="mt-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
                            <h3 class="sr-only">Items in your cart</h3>
                            <ul role="list" class="divide-y divide-gray-200">
                                @php $totalPrice = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $totalPrice =  cart_total(session('cart', []))  @endphp
                                        <li class="flex py-6 px-4 sm:px-6">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $details['image'] }}" class="w-20 rounded-md">
                                            </div>

                                            <div class="ml-6 flex-1 flex flex-col">
                                                <div class="flex">
                                                    <div class="min-w-0 flex-1">
                                                        <h4 class="text-sm">
                                                            {{ $details['name'] }}
                                                        </h4>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $details['category'] }}
                                                        </p>
                                                    </div>

                                                    <div class="ml-4 flex-shrink-0 flow-root">
                                                        <p class="mt-1 text-sm font-medium text-gray-900">
                                                            {{ $details['price'] }} LKR
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">
                                        Subtotal
                                    </dt>
                                    <dd class="text-sm font-medium text-gray-900">
                                        {{ number_format($totalPrice, 2, '.', ',') }} LKR
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">
                                        Online Bank Changers
                                    </dt>
                                    <dd class="text-sm font-medium text-gray-900">
                                        3.5%
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                    <dt class="text-base font-medium">
                                        Total
                                    </dt>
                                    <dd class="text-base font-medium text-gray-900">
                                        {{ number_format($totalPrice, 2, '.', ',') }} LKR
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div class="border-t w-full border-gray-200 py-6">
                            <button type="submit" id="checkout-submit" style="pointer-events: auto; cursor: pointer;"
                                class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#coupon-form button[type="submit"]').click(function(e) {
                e.preventDefault();
                $coupon = $('#add-coupon').val();
                if ($coupon == '') {
                    Swal.fire('Wait!', 'Please enter a coupon code to redeem', 'info')
                } else {
                    $('#coupon-form').submit();
                }

            });
        });
    </script>
@endsection
