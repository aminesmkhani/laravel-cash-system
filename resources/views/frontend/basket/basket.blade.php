@extends('layouts.front.core')

@section('content')
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="md:flex ">
            <div class="w-full p-4 px-5 py-5">
                <div class="md:grid md:grid-cols-1 gap-2 ">
                    <div class="col-span-2 p-5">
                        <h1 class="text-xl font-medium ">سبد خرید</h1>
                        @if($items->isEmpty())
                            <p class="mt-2">
                                سبد خرید شما خالی میباشد
                                <a class="text-blue-500" href="{{route('products.index')}}">محصولات</a>
                            </p>
                        @else
                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="flex items-center">
                                    <img src="{{asset('aminpanel/src/images/product-1.png')}}" width="60" class="rounded-full ">
                                    <div class="flex flex-col ml-3">
                                        <span class="md:text-md">گلدان یک</span>
                                        <span class="text-xs font-light text-gray-400">#41551</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center">
                                    <div class="pr-8 flex ">
                                        <span class="font-semibold">-</span>
                                        <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2" value="1">
                                        <span class="font-semibold">+</span>
                                    </div>
                                    <div class="pr-8 ">
                                        <span class="text-xs font-medium">۱۷ هزار تومان</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-close text-xs font-medium"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex items-center">
                                    <i class="fa fa-arrow-left text-sm pr-2"></i>
                                    <span class="text-md font-medium text-blue-500">ثبت و ادامه سفارش</span>
                                </div>
                                <div class="flex justify-center items-end">
                                    <span class="text-gray-400 ml-1">جمع کلی :</span>
                                    <span class="text-gray-800 "> 17 هزار تومان</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
