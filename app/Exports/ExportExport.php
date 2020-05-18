<?php

namespace App\Exports;
use App\Tonkho;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\TonkhoController;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;  
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;

class ExportExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'ID',
            'Sản phẩm',
            'Tổng số',
            'Nhập',
            'Xuất',
            'Ngày nhập',
            'Ngày xuất',
            'Tồn kho'
        ];
    }

    public function collection()
    {
        return Tonkho::all();
    }
    
    
}
