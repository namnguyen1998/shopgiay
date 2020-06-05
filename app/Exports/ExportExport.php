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
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ExportExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithEvents
{
    use RegistersEventListeners;
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

    public function registerEvents(): array
    {
        $normal_style = array('font' => array('name' => 'Times New Roman','size' => 15));
        $styleArray = [
            'font' => [
                'bold' => true,
                'name' => 'Times New Roman',
                'size' => 15
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],

            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFA0A0A0',
                ],
            ],
        ];

        
        return [
            AfterSheet::class => function(AfterSheet $event) use($styleArray) {
                // $event->sheet->getStyle("A:G")->getAlignment()->setWrapText(true);
                // $event->sheet->getStyle("A:G")->applyFromArray($normal_style);
                $to = $event->sheet->getDelegate()->getHighestColumn();
                $event->sheet->getDelegate()->getStyle('A2:'.$to.'2')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->freezePane('A3');
                $event->sheet->getDelegate()->getStyle('B3:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(false);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(false);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);
                

            },
        ];
    }

    public function collection()
    {
        return Tonkho::select('tensanpham', 'tongsp', 'ngay_nhap', 'sl_nhap', 'ngay_xuat', 'sl_xuat')
                                ->join('sanpham', 'sanpham.sanpham_id', '=', 'tonkho.id_sp')
                                ->get();
    }
    
    

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
