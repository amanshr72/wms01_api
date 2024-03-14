<x-app-layout>

    <div id="multistepForm">
        
        <div class="text-center">
            @if(session('success'))
            <div class="alert alert-success py-2 px-4">
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('success') }}</span> 
                </div>
            </div>
            @elseif(session('danger'))
            <div class="alert alert-danger py-2 px-4">
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ session('danger') }}</span> 
                </div>
            </div>
            @endif
        </div>

        <!-- Step 1 -->
        <div id="step1" style="display: block;">
            <h1 class="text-2xl font-semibold m-4 text-center uppercase">Stock Receipt Form</h1>
            <form class="mt-10 max-w-7xl mx-auto" id="formStep1">
                <div class="grid grid-cols-6 gap-4">
                    <div>
                        <div class="mb-5">
                            <label for="vendor_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendor Name</label>
                            <select id="vendor_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                <option value="" disabled selected>select vendor</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->companyName }}">{{ $vendor->companyName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <select id="location" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                <option value="" disabled selected>select location</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Kolkata">Kolkata</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="refrence_document_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Refrence Document No.</label>
                        <input type="text" id="refrence_document_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="refrence_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Refrence Date</label>
                        <input type="date" id="refrence_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="current_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Date</label>
                        <input type="date" id="current_date" value="{{ now()->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="user_prefix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Prefix</label>
                        <input type="text" id="user_prefix" placeholder="Enter user Prefix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="flex justify-center py-4">
                    <button type="button" onclick="captureFormValuesAndNext(2)" class="bg-teal-500 hover:bg-green-500 text-white px-4 py-2 rounded w-64">Next</button>
                </div>
            </form>
        </div>

        <!-- Step 2 -->
        <div id="step2" style="display: none;">
            <h1 class="text-2xl font-semibold m-4 text-center uppercase">Step 2: Stock Receipt Form</h1>
            <form action="{{ route('store') }}" method="POST" class="mt-10 max-w-7xl mx-auto" id="formStep2">
                @csrf

                <input type="hidden" id="listItems" name="listItems" value="">
                <input type="hidden" id="locationVal" name="location" value="">
                <input type="hidden" id="refrenceDocumentNo" name="refrence_document_no" value="">
                <input type="hidden" id="refrenceDate" name="refrence_date" value="">
                <input type="hidden" id="userPrefix" name="user_prefix" value="">

                <div class="grid grid-cols-6 gap-4 py-4 px-6 my-4">
                    <div class="col-span-2">
                        <label for="item_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                        <select id="item_name_val" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>Select Item Name</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->item_name }}">{{ $item->item_code.' - '.$item->item_name.' - '.$item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="vendorName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendor Name</label>
                        <input type="text" id="vendorName" name="vendor_name" value="" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="item_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Code</label>
                        <select id="item_code_val" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>Select Item Code</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->item_code }}">{{ $item->item_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="available_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available Stock</label>
                        <input type="text" id="available_stock_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" id="quantity_val" placeholder="Enter Quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <label for="batche_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batch No.</label>
                        <select id="batche_no_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>select Batch No</option>
                            @foreach ($batches as $val)
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="mfg_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MFG Date</label>
                        <select id="mfg_date_val_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>select MFG Date</option>
                            @foreach ($mfgDates as $val)
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <select id="price_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>select Price</option>
                            @foreach ($prices as $val)
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax</label>
                        <select id="tax_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>select Tax</option>
                            @foreach ($tax as $val)
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="button" id="addToList" class="mt-7 sm:inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                            Add to list
                        </button>
                    </div>
                </div>

                <div class="relative overflow-x-auto" id="listContainer">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-3">Action</th>
                                <th scope="col" class="p-3">Iten Name</th>
                                <th scope="col" class="p-3">Vendor Name</th>
                                <th scope="col" class="p-3">Item Code</th>
                                <th scope="col" class="p-3">Available Stock</th>
                                <th scope="col" class="p-3">Batch No.</th>
                                <th scope="col" class="p-3">MFG Date</th>
                                <th scope="col" class="p-3">MFG Name</th>
                                <th scope="col" class="p-3">Price</th>
                                <th scope="col" class="p-3">Tax</th>
                                <th scope="col" class="p-3">tax Amount</th>
                                <th scope="col" class="p-3">Gross Amount</th>
                                <th scope="col" class="p-3">Final Amount</th>
                            </tr>
                        </thead>
                        <tbody id="listBody">
                            {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"><td class="p-3"></tr> --}}
                            
                        </tbody>
                    </table>
                </div>

                <!-- Your form fields for Step 3 go here -->
                <div class="flex justify-between my-10">
                    <button type="button" onclick="previousStep(1)" class="bg-gray-500 text-white px-4 py-2 rounded">Previous</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/stock-receipt-form.js') }}"></script>

</x-app-layout>
