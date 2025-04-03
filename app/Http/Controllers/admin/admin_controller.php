<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class admin_controller extends Controller
{
    function dashboard()
    {
        return view("admin.dashboard");
    }

    function subCategory()
    {
        return view("admin.category.subCategory");
    }

    function stockIn()
    {
        return view("admin.stock.stockIn");
    }

    function stockOut()
    {
        return view("admin.stock.stockOut");
    }

    function stockTransfer()
    {
        return view("admin.stock.stockTransfer");
    }

    function stockAdjustment()
    {
        return view("admin.stock.stockAdjustment");
    }

    function sale()
    {
        return view("admin.sale.sale");
    }

    function invoice()
    {
        return view("admin.sale.invoice");
    }

    function saleReturn()
    {
        return view("admin.sale.saleReturn");
    }

    function card()
    {
        return view("admin.membershipCard.card");
    }

    function createCard()
    {
        return view("admin.membershipCard.createCard");
    }

    function customer()
    {
        return view("admin.people.customer");
    }

    function employee()
    {
        return view("admin.employee.employee");
    }

    function user()
    {
        return view("admin.user.user");
    }

    function addUser()
    {
        return view("admin.user.addUser");
    }

    function supplier()
    {
        return view("admin.people.supplier");
    }

    function purchase()
    {
        return view("admin.purchase.purchase");
    }

    public function getSaleReport(Request $request)
    {
        $apiUrlSales = "http://127.0.0.1:8081/api/saleReports";
        $apiUrlFilteredSales = "http://127.0.0.1:8081/api/saleFillterByDates";

        $resSales = Http::get($apiUrlSales);
        $saleReports = $resSales->successful() ? $resSales->json()['data'] : [];

        $resSaleFilter = Http::get($apiUrlFilteredSales);
        $saleReportFilter = $resSaleFilter->successful() ? $resSaleFilter->json()['data'] : [];

        return view('admin.report.saleReport', [
            'sales' => $saleReports,
            'saleReportFilterByDates' => $saleReportFilter
        ]);
    }


    function inventoryReport()
    {
        $apiUrl = "http://127.0.0.1:8081/api/inventoryReports";

        $res = Http::get($apiUrl);

        if ($res->successful()) {
            $inventoryReports = $res->json()['data'];
        } else {
            $inventoryReports = [];
        }

        return view('admin.report.inventoryReport', ['inventories' => $inventoryReports]);
    }

    function purchaseReport()
    {
        $apiUrl = "http://127.0.0.1:8081/api/purchaseReports";

        $res = Http::get($apiUrl);

        if ($res->successful()) {
            $purchaseReports = $res->json()['data'];
        } else {
            $purchaseReports = [];
        }

        return view('admin.report.purchaseReport', ['purchases' => $purchaseReports]);
    }

    function endOfDayClosingReport()
    {
        $apiUrl = "http://127.0.0.1:8081/api/endDayClosingReports";

        $res = Http::get($apiUrl);

        if ($res->successful()) {
            $edclReports = $res->json()['data'];
        } else {
            $edclReports = [];
        }

        return view('admin.report.endOfDayClosing', ['edcls' => $edclReports]);
    }

    function expenseReport()
    {
        return view('admin.report.expenseReport');
    }

    function incomeReport()
    {
        $apiUrl = "http://127.0.0.1:8081/api/incomeReports";

        $res = Http::get($apiUrl);

        if ($res->successful()) {
            $incomeReports = $res->json()['data'];
        } else {
            $incomeReports = [];
        }

        return view('admin.report.incomeReport', ['incomes' => $incomeReports]);
    }

    function vatReport()
    {
        $apiUrl = "http://127.0.0.1:8081/api/vatReports";

        $res = Http::get($apiUrl);

        if ($res->successful()) {
            $vatReports = $res->json()['data'];
        } else {
            $res = [];
        }

        return view('admin.report.vatReport', ['vats' => $vatReports]);
    }

    function exchangeRate()
    {
        return view('admin.branches.exchangeRate');
    }
}
