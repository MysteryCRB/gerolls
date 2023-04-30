<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employes')->insert([
            [
                'id' => 49,
                'user_id' => null,
                'full_name' => 'Almendo Gabriel',
                'father_name' => 'Michael',
                'basic_salary' => '50000',
                'salary' => 50000,
                'BreakUpTypeId' => 5,
                'dob' => '2005-11-07',
                'emp_address' => 'NBH',
                'gender' => 'M',
                'mobile_phone' => '082198595634',
                'country' => 'Indonesia',
                'country_phone' => '082198505634',
                'contact_name' => 'Almendo',
                'permanent_address' => 'NBH',
                'designation' => 'Web Developer',
                'visa_title' => 'Visit',
                'joining_date' => '2023-03-07',
                'visa_expiry_date' => '2023-04-04',
                'notify' => 0,
                'attachment' => 'uploads/employeeprofile/1682004459.jpg',
                'status' => 'active',
                'ending_date' => null,
                'reason' => null,
                'status_attachment' => null,
                'created_on' => '2023-04-20',
                'created_by' => 1,
                'modified_on' => null,
                'modified_by' => 0,
                'is_deleted' => 'N'
            ]
        ]);
    }
}
