<x-app-layout>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-3">id</th>
                    <th scope="col" class="p-3">Vouch_Code</th>
                    <th scope="col" class="p-3">Order_Prefix</th>
                    <th scope="col" class="p-3">Order_Number</th>
                    <th scope="col" class="p-3">Order_Date</th>
                    <th scope="col" class="p-3">Party_Name</th>
                    <th scope="col" class="p-3">Party_User_Code</th>
                    <th scope="col" class="p-3">Agent_Name</th>
                    <th scope="col" class="p-3">Branch_Name</th>
                    <th scope="col" class="p-3">Branch_Short_Name</th>
                    <th scope="col" class="p-3">Exchange_Rate</th>
                    <th scope="col" class="p-3">Currency_Name</th>
                    <th scope="col" class="p-3">Order_Amount</th>
                    <th scope="col" class="p-3">Total_Tax</th>
                    <th scope="col" class="p-3">Net_Order_Amount</th>
                    <th scope="col" class="p-3">Supplier_Order_No</th>
                    <th scope="col" class="p-3">Delivery_Date</th>
                    <th scope="col" class="p-3">Quotation_No</th>
                    <th scope="col" class="p-3">Transfer_Branch_Name</th>
                    <th scope="col" class="p-3">Transfer_Branch_Code</th>
                    <th scope="col" class="p-3">Quotation_Date</th>
                    <th scope="col" class="p-3">Action_Code</th>
                    <th scope="col" class="p-3">ListItems</th>
                    <th scope="col" class="p-3">LastGlobalModifyCode</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-3">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}</td>

                        <td class="p-3">{{ $order->Vouch_Code }}</td>
                        <td class="p-3">{{ $order->Order_Prefix }}</td>
                        <td class="p-3">{{ $order->Order_Number }}</td>
                        <td class="p-3">{{ $order->Order_Date }}</td>
                        <td class="p-3">{{ $order->Party_Name }}</td>
                        <td class="p-3">{{ $order->Party_User_Code }}</td>
                        <td class="p-3">{{ $order->Agent_Name }}</td>
                        <td class="p-3">{{ $order->Branch_Name }}</td>
                        <td class="p-3">{{ $order->Branch_Short_Name }}</td>
                        <td class="p-3">{{ $order->Exchange_Rate }}</td>
                        <td class="p-3">{{ $order->Currency_Name }}</td>
                        <td class="p-3">{{ $order->Order_Amount }}</td>
                        <td class="p-3">{{ $order->Total_Tax }}</td>
                        <td class="p-3">{{ $order->Net_Order_Amount }}</td>
                        <td class="p-3">{{ $order->Supplier_Order_No }}</td>
                        <td class="p-3">{{ $order->Delivery_Date }}</td>
                        <td class="p-3">{{ $order->Quotation_No }}</td>
                        <td class="p-3">{{ $order->Transfer_Branch_Name }}</td>
                        <td class="p-3">{{ $order->Transfer_Branch_Code }}</td>
                        <td class="p-3">{{ $order->Quotation_Date }}</td>
                        <td class="p-3">{{ $order->Action_Code }}</td>

                        <td class="p-3">ListItems[]</td>
                        <td class="p-3">{{ $order->LastGlobalModifyCode }}</td>
                    </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="24" style="text-align: center;" class="text-xl font-semibold py-4">No Data Found</td>
                </tr
                @endforelse
            </tbody>
        </table>
        <div class="justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
            {{ $orders->links() }}
        </div>
    </div>

</x-app-layout>