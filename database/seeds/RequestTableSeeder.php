<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_details')->insert([
            'request_date' => '2020-10-16',
      		'requester' => 'Admin',
            'Keterangan' => 'Pulang Kampung',
            'dari_tanggal' => '2020-10-16',
            'sampai_tanggal' => '2020-10-20',
            'jenis_cuti' => 'Reguler',
        ]);
         DB::table('request_details')->insert([
            'request_date' => '2020-10-12',
            'requester' => 'Muhamad Rizkianda',
            'Keterangan' => 'Jalan Jalan',
            'dari_tanggal' => '2020-10-16',
            'sampai_tanggal' => '2020-10-20',
            'jenis_cuti' => 'Umum',
        ]);
          DB::table('request_details')->insert([
            'request_date' => '2020-02-16',
            'requester' => 'User',
            'Keterangan' => 'Cuti',
            'dari_tanggal' => '2020-10-16',
            'sampai_tanggal' => '2020-10-20',
            'jenis_cuti' => 'Reguler',
        ]);
    }
}
