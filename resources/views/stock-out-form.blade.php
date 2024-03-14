<x-app-layout>
    
    <div>
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
        <h1 class="text-2xl font-semibold m-4 text-center uppercase">Product Consumption Form</h1>
        <form action="{{ route('stockOut.store') }}" method="POST" class="mt-10 max-w-7xl mx-auto">
            @csrf

            <input type="hidden" id="listItems" name="listItems" value="">

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
                <div>
                    <label for="batche_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batch No.</label>
                    <select id="batche_no_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>select Batch No</option>
                    </select>
                </div>
                <div>
                    <label for="mfg_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MFG Date</label>
                    <select id="mfg_date_val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>select MFG Date</option>
                    </select>
                </div>
                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" id="quantity_val" placeholder="Enter Quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" id="quantity_2_val" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
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
                            <th scope="col" class="p-3">Batch Number</th>
                            <th scope="col" class="p-3">MFG Date</th>
                            <th scope="col" class="p-3">Quantity</th>
                            <th scope="col" class="p-3">Qty</th>
                        </tr>
                    </thead>
                    <tbody id="listBody">

                    </tbody>
                </table>
            </div>

            <div class="flex justify-center py-4">
                <button type="submit" class="bg-teal-500 hover:bg-green-500 text-white px-4 py-2 rounded w-64">Submit</button>
            </div>
        </form>
    </div>
    
    <script src="{{ asset('assets/js/stock-out-form.js') }}"></script>

</x-app-layout>