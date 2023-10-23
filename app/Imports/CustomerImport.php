<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class CustomerImport implements ToCollection, WithBatchInserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $item) {
            # code...
            // if ($key == 0) {
            //     continue;
            // }
            // echo $item;
            Customer::create([
                'first_name' => $item[0],
                'last_name' => $item[1],
                'main_address' => $item[2],
                'secondary_address' => $item[3],
                'city' => $item[4],
                'state' => $item[5],
                'zip_code' => $item[6],
                'county' => $item[7],
                'phone_number' => $item[8],
                'owner_renter' => $item[9],
                'credit_rating' => $item[10],
                'home_value' => $item[11],
                'income' => $item[12],
                'age' => $item[13],
                'birth_month' => $item[14],
                'user_id' => $item[15],
                'team_id' => $item[16],
            ]);
            // if ($key >= 70) {
            //     break;
            // }
        }
    }
    // }(array $row)
    // {
    //     // dd($row);
    //     return DB::table('customers')->insert($row);
    //         //
    //     //     'first_name' => $row['first_name'],
    //     //     'last_name' => $row['last_name'],
    //     //     'main_address' => $row['main_address'],
    //     //     'secondary_address' => $row['secondary_address'],
    //     //     'city' => $row['city'],
    //     //     'state' => $row['state'],
    //     //     'zip_code' => $row['zip_code'],
    //     //     'county' => $row['county'],
    //     //     'phone_number' => $row['phone_number'],
    //     //     'owner_renter' => $row['owner_renter'],
    //     //     'credit_rating' => $row['credit_rating'],
    //     //     'home_value' => $row['home_value'],
    //     //     'income' => $row['income'],
    //     //     'age' => $row['age'],
    //     //     'birth_month' => $row['birth_month'],
    //     //     // 'status' => $row['status'],
    //     //     'user_id' => $row['user_id'],
    //     //     'team_id' => $row['team_id'],
    //     // ]);
    // }
    // public function headingRow()
    // {
    //     return 1;
    // }
    public function batchSize(): int
    {
        return 70;
    }
}
