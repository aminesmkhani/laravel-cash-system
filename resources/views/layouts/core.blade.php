<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('aminpanel/public/style.css')}}">
    <title>امین پنل</title>
</head>

<body dir="rtl" class="bg-gray-100 dark:bg-gray-800 rounded-2xl h-screen overflow-hidden relative font-body">
<div class="flex items-start justify-between">
    <!-- Nav Bar -->
    @include('layouts.navbar')
    <!-- End Navbar  -->
    <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
        <!-- Header -->
        @include('layouts.header')
        <!-- Header -->

        <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">

            @yield('content')

        </div>


    </div>


</div>
</body>
</html>
