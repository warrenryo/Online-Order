<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point of Sale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <!-- component -->
        <div class="container mx-auto bg-white ">
            <div class="flex lg:flex-row flex-col-reverse  shadow-lg">
                <!-- left section -->
                <div class="w-full lg:w-3/5 min-h-screen shadow-lg max-h-[50vh]">
                    <!-- header -->
                    <div class="flex flex-row justify-between items-center px-5 mt-5">
                        <div class="text-gray-800">
                            <div>
                                <img src="{{ asset('assets/images/anaa_logs.png') }}" class="w-[15vh]" alt="">
                            </div>
                        </div>
                        <div>
                            <form action="" method="GET" class="flex items-center">
                                <dd class="font-medium text-gray-800 dark:text-gray-200 mr-2">
                                    <div x-data="{ isOptionSelected: false }" class="relative dark:bg-form-input">
                                        <select name="filter_status" class="form-select text-white-dark w-[20vh]">
                                            <option selected disabled>Categories</option>
                                            @foreach($category as $categories)
                                            <option class="text-black dark:text-white-dark" {{ Request::get('filter_status') == $categories->title ? 'selected' : '' }} value="{{ $categories->title }}">{{ $categories->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </dd>
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter mr-2" viewBox="0 0 16 16">
                                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                    Filter
                                </button>
                            </form>
                            <br>
                            <a href="{{url('point-of-sale')}}" class="btn btn-info ml-1">
                                All Menu
                            </a>
                        </div>
                    </div>
                    <!-- end header -->
                    <!-- categories -->
                   
                    <!-- end categories -->
                    <!-- products -->
                    <div class="grid grid-cols-3 gap-4 px-5 mt-5 overflow-y-auto ">
                        @foreach ($menu as $menus)
                            <a href="{{ url('add-to-cart/' . $menus->title . '/' . $menus->price) }}"
                                class="hover:scale-105 duration-300 px-3 py-3 flex flex-col border border-gray-200 rounded-md h-32 justify-between">
                                <div>
                                    <div class="font-bold text-gray-800">{{ $menus->title }}</div>
                                    <span class="font-light text-sm text-gray-400">{{ $menus->category }}</span>
                                </div>
                                <div class="flex flex-row justify-between items-center">
                                    <span class="self-end font-bold text-lg text-yellow-500"><i
                                            class="fa-solid fa-peso-sign"></i> {{ $menus->price }}</span>
                                    <img src="{{ asset($menus->image) }}" class=" h-14 w-14 object-cover rounded-md"
                                        alt="">
                                </div>

                            </a>
                        @endforeach
                    </div>
                    <!-- end products -->
                </div>
                @include('sweetalert::alert')
                <!-- end left section -->
                <!-- right section -->
                <div class="w-full lg:w-2/5">
                    <!-- header -->
                    <div class="flex items-center justify-between px-5 mt-5">
                        <div class="font-bold text-xl">Current Order</div>
                        <div class="font-semibold flex ">
                            <a href="{{ url('delete-cart') }}" class="btn btn-danger">Clear All</a>
                        </div>
                    </div>
                    <!-- end header -->
                    <!-- order list -->
                    <div class="px-5 py-4 mt-5 overflow-y-auto md:max-h-[36vh] ">
                        @foreach ($carts as $cart)
                            <div class="flex flex-row justify-between items-center mb-4">
                                <div class="flex flex-row items-center w-2/5">
                                    <img src="{{asset($cart->image)}}"
                                        class="w-10 h-10 object-cover rounded-md" alt="">
                                    <span class="ml-4 font-semibold text-sm">{{ $cart->item_name }}</span>
                                </div>

                                <div class="w-32 flex justify-between">
                                    <!-- Input Number -->
                                    <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700"
                                        data-hs-input-number>
                                        <div class="flex items-center gap-x-1.5">
                                            <a href="{{ url('decrement-quantity/'.$cart->id) }}" 
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                data-hs-input-number-decrement>
                                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                </svg>
                                            </a>
                                            <input
                                                class="ml-2 p-0 w-[5vh] bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white"
                                                type="number" value="{{$cart->quantity}}" data-hs-input-number-input>
                                            <a href="{{ url('add-quantity/'.$cart->id) }}"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                data-hs-input-number-increment>
                                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Input Number -->

                                </div>
                                <div class="font-semibold text-lg w-16 text-center">
                                    <i class="fa-solid fa-peso-sign"></i> {{number_format($cart->total_price)}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end order list -->
                    <!-- totalItems -->
                    <div class="px-5 mt-5">
                        <div class="py-4 rounded-md shadow-lg">
                            <div class=" px-4 flex justify-between ">
                                <span class="font-semibold text-sm">Subtotal</span>
                                <span class="font-bold"><i class="fa-solid fa-peso-sign"></i> {{number_format($count_total)}}</span>
                            </div>
                            <div class="border-t-2 mt-3 py-2 px-4 flex items-center justify-between">
                                <span class="font-semibold text-2xl">Total</span>
                                <span class="font-bold text-2xl"><i class="fa-solid fa-peso-sign"></i> {{number_format($count_total)}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- end total -->
                    <!-- cash -->

                    <!-- end cash -->
                    <!-- button pay-->
                    <div class=" mt-5 px-5">
                        <div class="mb-5" x-data="modal">
                            <!-- button -->
                            <div class="flex items-center justify-center">
                                <button type="button" class="px-4 py-4 w-full rounded-md shadow-lg text-center btn btn-primary font-semibold" @click="toggle">Place Order</button>
                            </div>
                        
                            <!-- modal -->
                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <div class="dark:text-white-dark/70 text-center block justify-center  font-medium text-[#1f2937]">
                                                <div class="flex  justify-center">
                                                    <img src="{{asset('assets/images/shopping-cart.gif')}}" class="w-[20vh] " alt="">
                                                   
                                                </div>
                                                <form action="{{ url('place-order/'.$count_total) }}" method="POST" class="mt-6">
                                                    @csrf
                                                    <div class="relative ">
                                                        <input type="text" name="name" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                        <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Customer Name</label>
                                                    </div>
                                                
                                                
                                            </div>
                                            <div class="flex justify-center items-center mt-8">
                                                <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Place Order Now</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end button pay -->
                </div>
                <!-- end right section -->
            </div>
        </div>
    </div>
    <script>
        function submit() {
            document.getElementById("filter_form").submit();
        }
    </script>
    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
</x-app-layout>