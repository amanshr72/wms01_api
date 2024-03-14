<?php $cur_route = Route::current()->getName(); ?>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-5 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800 mt-14">
        <ul class="space-y-2 font-medium">
            <li>
                <button type="button"class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="material-symbols-outlined">text_snippet</span>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pull</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <x-nav-link :href="route('view.saleOrder')">Sale Order</x-nav-link>
                        <x-nav-link :href="route('view.saleChallanReturn')">Sale Challan Return</x-nav-link>
                        <x-nav-link :href="route('view.viewSaleInvoice')">Sale Invoice</x-nav-link>
                        <x-nav-link :href="route('view.salePurchaseOrder')">Purchase Voucher</x-nav-link>
                        <x-nav-link :href="route('view.salePurchaseVoucherOrder')">Purchase Voucher Order</x-nav-link>
                        <x-nav-link :href="route('view.stockTransferIn')">Stock Trasnfer In</x-nav-link>
                        <x-nav-link :href="route('view.stockTransferOut')">Stock Trasnfer Out</x-nav-link>
                        <x-nav-link :href="route('view.stockInHand')">Stock In Hand</x-nav-link>
                        <x-nav-link :href="route('view.employeeDiscPoint')">Employee Discount Point</x-nav-link>
                        <x-nav-link :href="route('view.deliveryOrder')">Delivery Order</x-nav-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-nav-link :href="route('push.packingslipagainstso')">PackingSlip Against Sor</x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('push.saleOrder')">Save Sale Order</x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('push.SaveAssignedDO')">Save Assigned DO</x-nav-link>
            </li>
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64">
    <div class="border-gray-200 rounded-lg dark:border-gray-700">
        <main class="mt-20">
            {{ $slot }}
        </main>
    </div>
</div>
