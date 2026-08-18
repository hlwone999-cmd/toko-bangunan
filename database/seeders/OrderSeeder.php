<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            ['customer_name' => 'PT. Mega Bangun Semesta', 'customer_email' => 'order@megabangun.co.id', 'customer_phone' => '0813000001', 'total_amount' => 12500000, 'status' => 'completed', 'created_at' => '2024-10-24 14:30:00'],
            ['customer_name' => 'CV. Mitra Karya Alam', 'customer_email' => 'info@mitrakarya.co.id', 'customer_phone' => '0813000002', 'total_amount' => 8200000, 'status' => 'pending', 'created_at' => '2024-10-24 10:15:00'],
            ['customer_name' => 'Bpk. Hendra Gunawan', 'customer_email' => 'hendra@gmail.com', 'customer_phone' => '0813000003', 'total_amount' => 1450000, 'status' => 'processing', 'created_at' => '2024-10-25 09:00:00'],
            ['customer_name' => 'PT. Sinar Jaya Konstruksi', 'customer_email' => 'purchasing@sinarjaya.co.id', 'customer_phone' => '0813000004', 'total_amount' => 45000000, 'status' => 'pending', 'created_at' => '2024-10-25 11:20:00'],
            ['customer_name' => 'PT. Jaya Konstruksi', 'customer_email' => 'order@jayakonstruksi.co.id', 'customer_phone' => '0813000005', 'total_amount' => 45200000, 'status' => 'processing', 'created_at' => '2024-10-24 14:30:00'],
            ['customer_name' => 'Megah Bangun Persada', 'customer_email' => 'sales@megahbangun.co.id', 'customer_phone' => '0813000006', 'total_amount' => 12500000, 'status' => 'pending', 'created_at' => '2024-10-24 10:15:00'],
            ['customer_name' => 'CV. Mitra Baja', 'customer_email' => 'info@mitrabaja.co.id', 'customer_phone' => '0813000007', 'total_amount' => 88000000, 'status' => 'completed', 'created_at' => '2024-10-23 16:45:00'],
            ['customer_name' => 'PT. Sumber Kayu', 'customer_email' => 'order@sumberkayu.co.id', 'customer_phone' => '0813000008', 'total_amount' => 5400000, 'status' => 'processing', 'created_at' => '2024-10-23 09:20:00'],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
