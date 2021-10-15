@extends('layouts.front.core')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="flex flex-wrap items-center px-5 py-24 mx-auto">
            @foreach($products as $product)
                <div
                    class="flex-shrink-0 mt-4 mx-2 mb-6 sm:mb-0 relative overflow-hidden bg-blue-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                              fill="#6da3fb">
                        </rect>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                              fill="#6da3fb">
                        </rect>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3">
                        </div>
                        <img class="relative w-40" src="{{asset('aminpanel/src/images/product-1.png')}}"
                             alt="shopping"/>
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">

                        <div class="flex justify-between">
                        <span class="block font-semibold text-xl">
                            {{$product->title}}
                        </span>
                            <span
                                class="bg-white rounded-full text-blue-500  text-sm px-3 py-2 leading-none flex items-center">
                            {{$product->price}}
                        </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
