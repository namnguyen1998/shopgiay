<?php

namespace App\Exports;
use App\Tonkho;
use App\Sanpham;
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
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell
{

     public function startCell(): string
    {
        return 'A2';
    }


    
    public function headings(): array
    {
        return [
            'Sản phẩm',
            'Tổng số',
            'Ngày nhập',
            'Nhập',
            'Ngày xuất',
            'Xuất',
            'Tồn kho'
        ];
    }

    public function collection()
    {
        return Tonkho::select('tensanpham', 'tongsp', 'ngay_nhap', 'sl_nhap', 'ngay_xuat', 'sl_xuat')
                                ->join('sanpham', 'sanpham.sanpham_id', '=', 'tonkho.id_sp')
                                ->get();
    }
    
    // public function map($customer): array
    // {
    //     return [
    //         $customer->id,
    //         '=B2+C2',
    //         $customer->first_name,
    //         $customer->last_name,
    //         $customer->email,
    //     ];
    // }
    // public function columnFormats(): array
    // {
    //     return [
    //         'D' => NumberFormat::FORMAT_DATE_DDMMYYYY
    //     ];
    // }

    public function map($tonkho): array
    {
        return [
            $tonkho->tensanpham,
            $tonkho->tongsp +$tonkho->sl_nhap,
            $tonkho->ngay_nhap,
            $tonkho->sl_nhap,
            $tonkho->ngay_xuat,
            $tonkho->sl_xuat,
            $tonkho->tongsp +$tonkho->sl_nhap - $tonkho->sl_xuat

        ];
    }
    
}
