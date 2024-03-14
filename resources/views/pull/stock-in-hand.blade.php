<x-app-layout>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-3">id</th>
                    <th scope="col" class="p-3">Branch_Code</th>
                    <th scope="col" class="p-3">Branch_Name</th>
                    <th scope="col" class="p-3">Godown_Name</th>
                    <th scope="col" class="p-3">LogicUserCode</th>
                    <th scope="col" class="p-3">AddlItemCode</th>
                    <th scope="col" class="p-3">Item_Name</th>
                    <th scope="col" class="p-3">Shade_Name</th>
                    <th scope="col" class="p-3">Pack_Name</th>
                    <th scope="col" class="p-3">Lot_Number</th>
                    <th scope="col" class="p-3">Lot_Code</th>
                    <th scope="col" class="p-3">Packing</th>
                    <th scope="col" class="p-3">Stock_Qty</th>
                    <th scope="col" class="p-3">Lot_Sale_Rate</th>
                    <th scope="col" class="p-3">Lot_Basic_Rate</th>
                    <th scope="col" class="p-3">Lot_MRP</th>
                    <th scope="col" class="p-3">Lot_SPRate1</th>
                    <th scope="col" class="p-3">Item_Sale_Rate</th>
                    <th scope="col" class="p-3">Item_MRP</th>
                    <th scope="col" class="p-3">Carton_Stock</th>
                    <th scope="col" class="p-3">Godown_Code</th>
                    <th scope="col" class="p-3">Item_Cf_1</th>
                    <th scope="col" class="p-3">Item_Cf_2</th>
                    <th scope="col" class="p-3">Item_Cf_3</th>
                    <th scope="col" class="p-3">Lot_Pur_Date</th>
                    <th scope="col" class="p-3">Lot_Expiry_Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-3">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}</td>

                        <td class="p-3">{{ $order->Branch_Code }}</td>
                        <td class="p-3">{{ $order->Branch_Name }}</td>
                        <td class="p-3">{{ $order->Godown_Name }}</td>
                        <td class="p-3">{{ $order->LogicUserCode }}</td>
                        <td class="p-3">{{ $order->AddlItemCode }}</td>
                        <td class="p-3">{{ $order->Item_Name }}</td>
                        <td class="p-3">{{ $order->Shade_Name }}</td>
                        <td class="p-3">{{ $order->Pack_Name }}</td>
                        <td class="p-3">{{ $order->Lot_Number }}</td>
                        <td class="p-3">{{ $order->Lot_Code }}</td>
                        <td class="p-3">{{ $order->Packing }}</td>
                        <td class="p-3">{{ $order->Stock_Qty }}</td>
                        <td class="p-3">{{ $order->Lot_Sale_Rate }}</td>
                        <td class="p-3">{{ $order->Lot_Basic_Rate }}</td>
                        <td class="p-3">{{ $order->Lot_MRP }}</td>
                        <td class="p-3">{{ $order->Lot_SPRate1 }}</td>
                        <td class="p-3">{{ $order->Item_Sale_Rate }}</td>
                        <td class="p-3">{{ $order->Item_MRP }}</td>
                        <td class="p-3">{{ $order->Carton_Stock }}</td>
                        <td class="p-3">{{ $order->Godown_Code }}</td>
                        <td class="p-3">{{ $order->Item_Cf_1 }}</td>
                        <td class="p-3">{{ $order->Item_Cf_2 }}</td>
                        <td class="p-3">{{ $order->Item_Cf_3 }}</td>
                        <td class="p-3">{{ $order->Lot_Pur_Date }}</td>
                        <td class="p-3">{{ $order->Lot_Expiry_Date }}</td>
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