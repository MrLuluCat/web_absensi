<?php

// namespace App\Exports;

// use App\Models\Presensi;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;


// class PresensiExport implements FromCollection, WithHeadings
// {
//     protected $presensi;

//     public function __construct($presensi)
//     {
//         $this->presensi = $presensi;
//     }

//     public function collection()
//     {
//         return $this->presensi;
//     }

//     public function headings(): array
//     {
//         return [
//             'No',
//             'NIM',
//             'Tanggal Presensi',
//             'Jam Masuk',
//             'Jam Keluar',
//             'Status'
//         ];
//     }
// }

// namespace App\Imports;
  
// use App\Models\User;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Hash;
  
// class UsersImport implements ToModel, WithHeadingRow
// {
//     /**
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//     public function model(array $row)
//     {
//         return new User([
//             'name'     => $row['name'],
//             'email'    => $row['email'], 
//             'password' => Hash::make($row['password']),
//         ]);
//     }
// }