<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\zonas_atencion;
use Illuminate\Support\Facades\DB;



class ZonasAtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('zonas_atencion')->insert(['nombre' => 'Caba' ]);
        DB::table('zonas_atencion')->insert(['nombre' => 'Gran Buenos Aires' ]);
        DB::table('zonas_atencion')->insert(['nombre' => 'Zona Norte' ]);
        DB::table('zonas_atencion')->insert(['nombre' => 'Zona Sur' ]);
        DB::table('zonas_atencion')->insert(['nombre' => 'Zona Este' ]);
        DB::table('zonas_atencion')->insert(['nombre' => 'Zona Oeste' ]);
    }
}
