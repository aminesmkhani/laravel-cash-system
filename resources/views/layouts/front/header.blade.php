@inject('basket','App\Support\Basket\Basket')
<header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
    <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
        <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
            <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                <div class="relative flex items-center w-full lg:w-32 h-full group">
                    <a href="{{route('basket.index')}}">
                    <button type="button" class="py-2 px-2 flex justify-center items-center  bg-green-600 hover:bg-green-700 focus:ring-gray-500 focus:ring-offset-gray-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-full ">
                       سبد خرید {{$basket->itemCount()}}
                    </button>
                    </a>
                </div>
            </div>
            <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                <a href="#" class="block relative">
                    <img alt="پرفایل" src="{{asset('aminpanel/src/images/amin.jpg')}}" class="mx-auto object-cover rounded-full h-10 w-10 " />
                </a>
            </div>
        </div>
    </div>
</header>
