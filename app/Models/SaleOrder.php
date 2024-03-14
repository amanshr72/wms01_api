<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $table = 'sale_orders';

    protected $fillable = [
        'Branch_Short_Name',
        'Branch_Code',
        'Order_Prefix',
        'Order_Date',
        'Party_User_code',
        'Party_Order_No',
        'External_Order_ID',
        'Remarks',
        'Tax_Region',
        'RCU_Mem_Prefix',
        'RCU_Mem_Number',
        'RCU_Mobile_No',
        'RCU_Email',
        'RCU_First_Name',
        'RCU_Last_Name',
        'RCU_State',
        'RCU_PinCode',
        'RCU_Country',
        'RCU_City',
        'Billing_FirstName',
        'Billing_MiddleName',
        'Billing_LastName',
        'Billing_MobileNo',
        'Billing_EmailID',
        'Billing_Address1',
        'Billing_Address2',
        'Billing_Country',
        'Billing_State',
        'Billing_City',
        'Billing_PinCode',
        'Billing_ContactPerson',
        'Shipping_FirstName',
        'Shipping_MiddleName',
        'Shipping_LastName',
        'Shipping_MobileNo',
        'Shipping_EmailID',
        'Shipping_Address1',
        'Shipping_Address2',
        'Shipping_Country',
        'Shipping_State',
        'Shipping_City',
        'Shipping_PinCode',
        'Shipping_ContactPerson',
        'Payment_Method',
        'Exfactory_Date',
        'Delivery_Date',
        'Total_Other_Val_1',
        'Total_Other_Val_2',
        'Total_Other_Val_3',
        'Total_Other_Val_4',
        'Total_Other_Val_5',
        'Total_Other_Val_6',
        'Total_Other_Val_7',
        'Indirect_Customer_User_Code',
        'Agent_Name',
        'Company_Name',
        'Transport_Name',
        'Order_Type',
        'Party_Order_Date',
        'AdvanceEntry',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
        'Order_No'
    ];

    public function saleOrderListItems()
    {
        return $this->hasMany(SaleOrderListItem::class, 'sale_order_id');
    }
}
