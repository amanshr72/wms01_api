<x-app-layout>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-3">id</th>
                    <th scope="col" class="p-3">Doc_Type</th>
                    <th scope="col" class="p-3">Doc_Code</th>
                    <th scope="col" class="p-3">Doc_Prefix</th>
                    <th scope="col" class="p-3">Doc_Number</th>
                    <th scope="col" class="p-3">DO_Date</th>
                    <th scope="col" class="p-3">DO_Branch_Code</th>
                    <th scope="col" class="p-3">PartyUserCode</th>
                    <th scope="col" class="p-3">SO_Head_Code</th>
                    <th scope="col" class="p-3">SO_No</th>
                    <th scope="col" class="p-3">SO_Date</th>
                    <th scope="col" class="p-3">Customer_Name</th>
                    <th scope="col" class="p-3">SO_Delivery_Date</th>
                    <th scope="col" class="p-3">Action_Code</th>
                    <th scope="col" class="p-3">Logic_User_Name</th>
                    <th scope="col" class="p-3">CurrencyName</th>
                    <th scope="col" class="p-3">ExchangeRate</th>
                    <th scope="col" class="p-3">PickListDocCode</th>

                    <th scope="col" class="p-3">ListItems</th>
                    <th scope="col" class="p-3">LastGlobalModifyCode</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-3">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}</td>

                        <td class="p-3">{{ $order->Doc_Type }}</td>
                        <td class="p-3">{{ $order->Doc_Code }}</td>
                        <td class="p-3">{{ $order->Doc_Prefix }}</td>
                        <td class="p-3">{{ $order->Doc_Number }}</td>
                        <td class="p-3">{{ $order->DO_Date }}</td>
                        <td class="p-3">{{ $order->DO_Branch_Code }}</td>
                        <td class="p-3">{{ $order->PartyUserCode }}</td>
                        <td class="p-3">{{ $order->SO_Head_Code }}</td>
                        <td class="p-3">{{ $order->SO_No }}</td>
                        <td class="p-3">{{ $order->SO_Date }}</td>
                        <td class="p-3">{{ $order->Customer_Name }}</td>
                        <td class="p-3">{{ $order->SO_Delivery_Date }}</td>
                        <td class="p-3">{{ $order->Action_Code }}</td>
                        <td class="p-3">{{ $order->Logic_User_Name }}</td>
                        <td class="p-3">{{ $order->CurrencyName }}</td>
                        <td class="p-3">{{ $order->ExchangeRate }}</td>
                        <td class="p-3">{{ $order->PickListDocCode }}</td>

                        <td class="p-3">ListItems[]</td>
                        <td class="p-3">{{ $order->LastGlobalModifyCode }}</td>
                    </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="20" style="text-align: center;" class="text-xl font-semibold py-4">No Data Found</td>
                </tr
                @endforelse
            </tbody>
        </table>
        <div class="justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
            {{ $orders->links() }}
        </div>
    </div>

</x-app-layout>