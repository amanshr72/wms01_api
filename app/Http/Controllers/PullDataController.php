<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDiscPointsStatus;
use App\Models\GetDeliveryOrder;
use App\Models\GetPUChallanReturn;
use App\Models\GetPurchaseOrder;
use App\Models\GetPurchaseVoucher;
use App\Models\GetSaleInvoice;
use App\Models\GetSaleOrder;
use App\Models\GetStockInHand;
use App\Models\GetStockTransferIn;
use App\Models\GetStockTransferOut;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PullDataController extends Controller
{
    public function viewSaleOrderData(){
        $orders = GetSaleOrder::latest()->paginate(10);
        return view('pull.sale-order', compact('orders'));
    }

    public function viewsaleChallanReturn(){
        $orders = GetPUChallanReturn::latest()->paginate(10);
        return view('pull.sale-challan-return', compact('orders'));
    }

    public function viewSaleInvoice(){
        $orders = GetSaleInvoice::latest()->paginate(10);
        return view('pull.sale-invoice', compact('orders'));
    }

    public function viewSalePurchaseOrderData(){
        $orders = PurchaseOrder::latest()->paginate(10);
        return view('pull.sale-purchase-voucher', compact('orders'));
    }

    public function viewSalePurchaseVoucherOrder(){
        $orders = GetPurchaseVoucher::latest()->paginate(10);
        return view('pull.sale-purchase-voucher-order', compact('orders'));
    }

    public function viewStockTransferInData(){
        $orders = GetStockTransferIn::latest()->paginate(10);
        return view('pull.stock-transferin', compact('orders'));
    }

    public function viewStockTransferOutData(){
        $orders = GetStockTransferOut::latest()->paginate(10);
        return view('pull.stock-transferout', compact('orders'));
    }

    public function viewStockInHandData(){
        $orders = GetStockInHand::latest()->paginate(10);
        return view('pull.stock-in-hand', compact('orders'));
    }
    
    public function viewEmployeeDiscPointData(){
        $orders = EmployeeDiscPointsStatus::latest()->paginate(10);
        return view('pull.employee-disc-point', compact('orders'));
    }
    public function viewDeliveryOrderData(){
        $orders = GetDeliveryOrder::latest()->paginate(10);
        return view('pull.delivery-order', compact('orders'));
    }
}
