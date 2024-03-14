<x-app-layout>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-3">id</th>
                    <th scope="col" class="p-3">StatusCode</th>
                    <th scope="col" class="p-3">SchemeCode</th>
                    <th scope="col" class="p-3">SchemeName</th>
                    <th scope="col" class="p-3">YearLimit</th>
                    <th scope="col" class="p-3">MonthLimit</th>
                    <th scope="col" class="p-3">BillLimit</th>
                    <th scope="col" class="p-3">YearLimitUsed</th>
                    <th scope="col" class="p-3">MonthLimitUsed</th>
                    <th scope="col" class="p-3">YearBalance</th>
                    <th scope="col" class="p-3">MonthBalance</th>
                    <th scope="col" class="p-3">DiscP</th>
                    <th scope="col" class="p-3">LstCompGroupDisc</th>
                    <th scope="col" class="p-3">LastSavedCode</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-3">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}</td>

                        <td class="p-3">{{ $order->StatusCode }}</td>
                        <td class="p-3">{{ $order->SchemeCode }}</td>
                        <td class="p-3">{{ $order->SchemeName }}</td>
                        <td class="p-3">{{ $order->YearLimit }}</td>
                        <td class="p-3">{{ $order->MonthLimit }}</td>
                        <td class="p-3">{{ $order->BillLimit }}</td>
                        <td class="p-3">{{ $order->YearLimitUsed }}</td>
                        <td class="p-3">{{ $order->MonthLimitUsed }}</td>
                        <td class="p-3">{{ $order->YearBalance }}</td>
                        <td class="p-3">{{ $order->MonthBalance }}</td>
                        <td class="p-3">{{ $order->DiscP }}</td>
                        <td class="p-3">{{ $order->LstCompGroupDisc }}</td>
                        <td class="p-3">{{ $order->LastSavedCode }}</td>

                    </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="14" style="text-align: center;" class="text-xl font-semibold py-4">No Data Found</td>
                </tr
                @endforelse
            </tbody>
        </table>
        <div class="justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
            {{ $orders->links() }}
        </div>
    </div>

</x-app-layout>