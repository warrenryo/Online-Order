<x-app-layout>


    <div class="panel">
      
        <div class="flex items-center justify-end">
          
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal">
                Add Menu
              </button>
              
              <div id="hs-slide-down-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                  <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                      <h3 class="font-bold text-gray-800 dark:text-white">
                        Add Menu
                      </h3>
                      <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                      </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                      <form action="{{ url('create-menu') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Title</label>
                            <input id="title" type="text" name="title" placeholder="Title" class="form-input" required />
                        </div>
                        <div class="mt-2">
                            <label for="cat">Category</label>
                            <select id="cat" name="category" class="form-select text-white-dark" required>
                                <option selected disabled>Select Category</option>
                                @foreach($category as $categories)
                                <option value="{{$categories->title}}">{{$categories->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="ctnTextarea">Description</label>
                            <textarea id="ctnTextarea" rows="3" name="description" class="form-textarea" placeholder="Description" required></textarea>
                        </div>
                        <!-- Input Number -->
                        <label class="mt-2">Price</label>
                        <div class="mt-2 bg-white border border-gray-200 rounded-lg dark:bg-slate-700 dark:border-gray-700" data-hs-input-number>
                            <div class="w-full flex justify-between items-center gap-x-1">
                            <div class="grow py-2 px-3">
                                <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white" type="text" name="price" value="1" data-hs-input-number-input>
                            </div>
                            <div class="flex items-center -gap-y-px divide-x divide-gray-200 border-s border-gray-200 dark:divide-gray-700 dark:border-gray-700">
                                <button type="button" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                </button>
                                <button type="button" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                </button>
                            </div>
                            </div>
                        </div>
                        <!-- End Input Number -->
     
                        <div class="mt-2">
                            <label for="iamge">Food Image</label>
                            <input id="iamge" type="file" name="image" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
                        </div>
           
                  
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal">
                        Close
                      </button>
                      <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Submit
                      </button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="mt-4 table-responsive">
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
                <a href="{{url('menu')}}" class="btn btn-info ml-1">
                  All Menu
              </a>
            </form>
            
        </div>
            <table>
              <br>
                <thead>
                    <tr class="text-center">
                        <th>Food Image</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $item)
                        <tr class="text-center">
                            <td class="whitespace-nowrap">
                                <img src="{{asset($item->image)}}" class="w-20" alt="">
                            </td>
                            <td class="whitespace-nowrap">{{$item->title}}</td>
                            <td >{{$item->category}}</td>
                            <td>₱{{$item->price}}</td>
                            <td>{{$item->description}}</td>
                            <td class="flex">
                                <button type="button" class="btn btn-primary" data-hs-overlay="#edit{{$item->id}}">
                                    <i class="fas fa-edit"></i>
                                  </button>
                                  
                                  <div id="edit{{$item->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                      <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                          <h3 class="font-bold text-gray-800 dark:text-white">
                                            Edit Menu
                                          </h3>
                                          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit{{$item->id}}">
                                            <span class="sr-only">Close</span>
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                          </button>
                                        </div>
                                        <div class="p-4 overflow-y-auto">
                                          <form action="{{ url('update-menu/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label for="title">Title</label>
                                                <input id="title" type="text" value="{{$item->title}}" name="title" placeholder="Title" class="form-input" required />
                                            </div>
                                            <div class="mt-2">
                                                <label for="cat">Category</label>
                                                <select id="cat" name="category" class="form-select text-white-dark" required>
                                                    <option >Select Category</option>
                                                    @foreach($category as $categories)
                                                    <option value="{{$categories->title}}" {{$categories->title == $item->category ? 'selected':''}}>{{$categories->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <label for="ctnTextarea">Description</label>
                                                <textarea id="ctnTextarea" rows="3" name="description" class="form-textarea" required>{{$item->description}}</textarea>
                                            </div>
                                            <!-- Input Number -->
                                            <label class="mt-2">Price</label>
                                            <div class="mt-2 bg-white border border-gray-200 rounded-lg dark:bg-slate-700 dark:border-gray-700" data-hs-input-number>
                                                <div class="w-full flex justify-between items-center gap-x-1">
                                                <div class="grow py-2 px-3">
                                                    <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white" type="text" name="price" value="{{$item->price}}" data-hs-input-number-input>
                                                </div>
                                                <div class="flex items-center -gap-y-px divide-x divide-gray-200 border-s border-gray-200 dark:divide-gray-700 dark:border-gray-700">
                                                    <button type="button" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                                    </button>
                                                    <button type="button" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- End Input Number -->
                         
                                            <div class="mt-4">
                                                <img src="{{asset($item->image)}}" class="w-20" alt="">
                                                <label class="mt-2" for="iamge">Food Image</label>
                                                <input id="iamge" type="file" name="image" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"  />
                                            </div>
                               
                                      
                                        </div>
                                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit{{$item->id}}">
                                            Close
                                          </button>
                                          <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                            Submit
                                          </button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!--END EDIT BUTTON -->

                                  <!-- DELETE BUTTON -->
                                  <div class="ml-2 text-center">
                                    <button type="button" class="btn btn-danger" data-hs-overlay="#delete{{$item->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                  </div>
                                  
                                  <div id="delete{{$item->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                                      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                        <div class="absolute top-2 end-2">
                                          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete{{$item->id}}">
                                            <span class="sr-only">Close</span>
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                          </button>
                                        </div>
                                  
                                        <div class="p-4 sm:p-10 overflow-y-auto">
                                          <div class="flex gap-x-4 md:gap-x-7">
                                            <!-- Icon -->
                                            <span class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                                              <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                              </svg>
                                            </span>
                                            <!-- End Icon -->
                                  
                                            <div class="grow">
                                              <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                Delete Menu
                                              </h3>
                                              <p class="text-gray-500">
                                                Permanently remove "{{$item->title}}" Menu and all of its contents from ANAA HOTEL RESTAURANT. This action is not reversible, so please continue with caution.
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                  
                                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete{{$item->id}}">
                                            Cancel
                                          </button>
                                          <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" 
                                          href="{{ URL('delete-menu/'.$item->id) }}">
                                            Delete 
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                   <!--END DELETE BUTTON -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>