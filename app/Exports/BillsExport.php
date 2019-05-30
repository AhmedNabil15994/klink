<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Backend\bill;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BillsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function __construct($from='', $to='')
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function headings(): array
    {
        return [
            // 'id',
            trans('backend/bills.number'),
            trans('backend/bills.orderNumber'),
            trans('backend/bills.customer'),
            trans('backend/bills.orderCost'),
            trans('backend/bills.tax'),
            trans('backend/bills.fees'),
            trans('backend/bills.discount'),
            trans('backend/bills.subTotal'),
            trans('backend/bills.billDate'),
            trans('backend/bills.note'),
        ];
    }
    public function collection()
    {
        // $sheet->getColumnDimension($column)->setAutoSize(true) ;

        if ($this->from!=''&&$this->to!='') {
            return bill::select('number', 'order_num', 'customerName', 'order_cost', 'tax', 'fees', 'discount', 'sub_total', 'invionce_date', 'note')->whereBetween('invionce_date', [$this->from,$this->to])->get();
        }
        return bill::select('number', 'order_num', 'customerName', 'order_cost', 'tax', 'fees', 'discount', 'sub_total', 'invionce_date', 'note')->get();
    }
}
