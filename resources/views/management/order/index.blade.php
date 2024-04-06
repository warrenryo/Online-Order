<x-app-layout>
    <div class="panel">
        <div class="flex items-center justify-end">

        </div>
        
        <div class="table-responsive">

            <table>
                <thead>
                    <tr class="text-center">
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Action </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->order_invoice }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>₱{{ $order->total_price }}</td>
                            <td class="flex">
                                <div class="">
                                    <button data-hs-overlay="#addMaintenanceItem{{ $order->id }}"
                                        class="btn btn-primary mr-4" type="button">
                                        View Orders
                                    </button>
                                </div>
                                <div id="addMaintenanceItem{{ $order->id }}"
                                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                        <div
                                            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div
                                                class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    Orders
                                                </h3>
                                                <button type="button"
                                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#addMaintenanceItem{{ $order->id }}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-4 overflow-y-auto">
                                                <div class="table-responsive">
                                                    <table>
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>Image</th>
                                                                <th>Food Menu</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($order->cartItem as $item)
                                                                <tr>
                                                                    <td align="center"><img src="{{ asset($item->image) }}"
                                                                            alt="" class="w-[10vh]"></td>
                                                                    <td align="center">{{ $item->item_name }}</td>
                                                                    <td align="center">₱{{ $item->price }}</td>
                                                                    <td align="center">{{ $item->quantity }}</td>
                                                                    <td align="center">₱{{number_format($item->total_price)  }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div
                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#addMaintenanceItem{{ $order->id }}">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="button"
                                        class="btn btn-info"
                                        data-hs-overlay="#hs-ai-offcanvas{{ $order->id }}">
                                        View Ticket
                                    </button>
                                </div>

                                <div id="hs-ai-offcanvas{{ $order->id }}"
                                    class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-md w-full z-[80] bg-white border-e dark:bg-gray-800 dark:border-gray-700"
                                    tabindex="-1">
                                        <!-- Close Button -->
                                        <div class="absolute top-2 end-2">
                                            <button type="button"
                                                class="py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-xs dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                                data-hs-overlay="#hs-ai-offcanvas{{ $order->id }}">
                                                Close
                                            </button>

                                            <a class="py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-xs dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                            href="#" onclick="window.print()">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="6 9 6 2 18 2 18 9" />
                                                <path
                                                    d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                <rect width="12" height="8" x="6" y="14" />
                                            </svg>
                                            Print
                                        </a>
                                        </div>
                                        <!-- End Close Button -->

                                    

                                    

                                    <!-- Body -->
                                    
                                    <div class="p-4 sm:p-7 overflow-y-auto">
                                        <div class="text-gray-800">
                                            <div>
                                                <img src="{{ asset('assets/images/anaa_logs.png') }}" class="w-[15vh]" alt="">
                                            </div>
                                            <div class="text-center">
                                                <p class="text-sm text-gray-500">
                                                    Order Ticket #{{$order->order_invoice}}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Grid -->
                                        
                                        <div class="mt-5 sm:mt-10 grid grid-cols-2 sm:grid-cols-3 gap-5">
                                            <div>
                                                <span class="block text-xs uppercase text-gray-500">Payment
                                                    Type:</span>
                                                <div class="flex items-center gap-x-2">
                                                    
                                                    <span
                                                        class="block text-sm font-medium text-gray-800 dark:text-gray-200">Cash Mode</span>
                                                </div>
                                            </div>

                                            <div>
                                                <span class="block text-xs uppercase text-gray-500">Amount Fee:</span>
                                                <span
                                                    class="block text-sm font-medium text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> {{$order->total_price}}</span>
                                            </div>
                                            <!-- End Col -->

                                            <div>
                                                <span class="block text-xs uppercase text-gray-500">Date of Payment:</span>
                                                <span
                                                    class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{$order->created_at}}</span>
                                            </div>
                                            <!-- End Col -->

                                            
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Grid -->

                                        <div class="mt-5 sm:mt-10">

                                            <h4
                                                class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">
                                                SUMMARY</h4>

                                            <ul class="mt-3 flex flex-col">
                                                @foreach($order->cartItem as $item)
                                                <li
                                                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
                                                    <div class="flex items-center justify-between w-full">
                                                        <span>{{$item->item_name}}</span>
                                                        <span><i class="fa-solid fa-peso-sign"></i> {{$item->price}}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <li
                                                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold bg-gray-50 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-gray-700 dark:text-gray-200">
                                                    <div class="flex items-center justify-between w-full">
                                                        <span>Total Amount: </span>
                                                        <span><i class="fa-solid fa-peso-sign"></i> {{$order->total_price}}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Button -->
                                          
                                        </div>
                                        <!-- End Buttons -->

                                        <div class="p-4 sm:p-7 overflow-y-auto" align="center">
                                            <p class="text-sm text-gray-500">If you have any questions, please contact
                                                us at <a
                                                    class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                                    href="#">anaa-hrms@site.com</a> or call at <a
                                                    class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                                    href="tel:+1898345492">+1 898-34-5492</a></p>
                                        </div>
                                    </div>
                                    <!-- End Body -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
