<?php

namespace App\Exports\Admin;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    use Exportable;
    
    public function collection()
    {
        return User::all();
    }

    public function map($user) : array
    {
        return [
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->role,
            $user->parent?->first_name,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Role',
            'Referral name',
            'Created',
        ];
    }
}
