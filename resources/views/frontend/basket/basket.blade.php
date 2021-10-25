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
                            @foreach($items as $item)
                                <div class="flex justify-between items-center mt-6 pt-6">
                                    <div class="flex items-center">
                                        <img src="{{asset('aminpanel/src/images/product-1.png')}}" width="60" class="rounded-full ">
                                        <div class="flex flex-col ml-3">
                                            <span class="md:text-md">{{$item->title}}</span>
                                            <span class="text-xs font-light text-gray-400">#{{$item->id}}</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <div class="pr-8 flex ">
                                            <form action="" method="post">
                                                @csrf
                                            <select name="quantity" id="quantity">
                                                @for($i = 0; $i <= $item->stock; $i++)
                                                <option {{$item->quantity == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                            </form>
                                        </div>
                                        <div class="pr-8 ">
                                            <span class="text-xs font-medium">{{number_format($item->price)}} تومان</span>
                                        </div>
                                        <div>
                                            <i class="fa fa-close text-xs font-medium"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @inject('basket','App\Support\Basket\Basket')
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex items-center">
                                    <i class="fa fa-arrow-left text-sm pr-2"></i>
                                    <span class="text-md font-medium text-blue-500">ثبت و ادامه سفارش</span>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
