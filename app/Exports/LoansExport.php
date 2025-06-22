<?php

namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoansExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Loan::with(['user', 'inventory'])->get()->map(function ($loan) {
            return [
                'Nama User' => $loan->user->name ?? '-',
                'Nama Alat' => $loan->inventory->name ?? '-',
                'Jumlah' => $loan->quantity,
                'Tanggal Pinjam' => $loan->borrow_date,
                'Tanggal Kembali' => $loan->return_date ?? '-',
                'Status' => $loan->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama User',
            'Nama Alat',
            'Jumlah',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
        ];
    }
}
