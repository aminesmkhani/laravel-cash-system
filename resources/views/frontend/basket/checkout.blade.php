@extends('layouts.front.core')

@section('content')
    <div class="mt-4 max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="md:flex ">
            <div class="w-full p-4 px-5 py-5">
                <div class="md:grid md:grid-cols-1 gap-2 ">
                    <div class="col-span-2 p-5">
                        <h1 class="text-xl font-medium ">اطلاعات پرداخت</h1>
                        @if($items->isEmpty())
                            <p class="mt-2">
                                کارت پرداخت شما خالی است
                                <a class="text-blue-500" href="{{route('products.index')}}">محصولات</a>
                            </p>
                        @else
                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <span class="mr-2 text-gray-700"> {{Auth::user()->name}} </span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <span class="mr-2 text-gray-700"> آدرس : {{Auth::user()->address}} </span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <span
                                            class="mr-2 text-gray-700"> شماره تماس : {{Auth::user()->phone_number}} </span>
                                    </label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="mt-4 max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="md:flex ">
            <div class="w-full p-4 px-5 py-5">
                <div class="md:grid md:grid-cols-1 gap-2 ">
                    <div class="col-span-2 p-5">
                        <h1 class="text-xl font-medium ">روش پرداخت</h1>
                        @if($items->isEmpty())
                            <p class="mt-2">
                                کارت پرداخت شما خالی است
                                <a class="text-blue-500" href="{{route('products.index')}}">محصولات</a>
                            </p>
                        @else
                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="method" id="online" value="online" class="h-5 w-5 text-red-600"/>
                                        <span class="mr-2 text-gray-700">  پرداخت آنلاین </span>
                                    </label>
                                </div>

                                <select
                                    class="block w-52 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    name="gateway">
                                    <option value="saman">
                                        سامان
                                    </option>
                                    <option value="pasargad">
                                        پاسارگاد
                                    </option>

                                </select>

                            </div>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <input type="radio" id="cash" name="method" value="cash" class="h-5 w-5 text-red-600"/>
                                        <span class="mr-2 text-gray-700"> پرداخت نقدی </span>
                                    </label>
                                </div>
                                <p class="text-gray-400">
                                    در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex justify-center items-center">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="method" id="cart" value="cart" class="h-5 w-5 text-red-600"/>
                                        <span class="mr-2 text-gray-700"> کارت به کارت </span>
                                    </label>
                                </div>
                                <p class="text-gray-400">
                                    لطفاٌ مبلغ را به شماره کارت 5555-5555-5555-5555 واریز نمایید. و کد پیگیری را به همکاران ما اطلاع دهید.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="md:flex ">
            <div class="w-full p-4 px-5 py-5">
                <div class="md:grid md:grid-cols-1 gap-2 ">
                    <div class="col-span-2 p-5">
                        <h1 class="text-xl font-medium ">پرداخت</h1>
                        @inject('basket','App\Support\Basket\Basket')
                        <div class="flex justify-between items-center mt-6 pt-6 border-t">
                            <div class="flex items-center">
                                <i class="fa fa-arrow-left text-sm pr-2"></i>
                                <a href="{{route('basket.checkout.form')}}" class="text-md font-medium text-blue-500">

                                    <button
                                        class="text-blue-500 bg-transparent border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold px-8 py-3 rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="lin ">
                                        پرداخت
                                    </button>
                                </a>
                            </div>
                            <div class="flex justify-center items-end">
                                <span class="text-gray-400 ml-1">جمع محصولات :</span>
                                <span class="text-gray-800 ">{{number_format($basket->subTotal())}}</span>
                            </div>
                            <div class="flex justify-center items-end">
                                <span class="text-gray-400 ml-1">هزینه حمل و نقل</span>
                                <span class="text-gray-800 ">{{number_format(10000)}}</span>
                            </div>
                            <div class="flex justify-center items-end">
                                <span class="text-gray-400 ml-1">هزینه نهایی</span>
                                <span class="text-gray-800 ">{{number_format($basket->subTotal() + 10000)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
