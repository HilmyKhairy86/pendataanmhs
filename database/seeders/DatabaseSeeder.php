<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kaprodi = User::factory()->count(1)->create([
            'role' => 'kaprodi',
        ]);
        
        foreach ($kaprodi as $kap) {
            Kaprodi::factory()->create([
                'user_id' => $kap->id,
            ]);
        }

        $dosenid = User::factory()->count(3)->create([
            'role' => 'dosen',
        ]);

        foreach ($dosenid as $did) {
            Dosen::factory()->create([
                'user_id' => $did->id,
                'kelas_id' => null,
            ]);
        }
       
        $kelas = Kelas::factory()->count(2)->create();
        
        foreach ($kelas as $k) {
            $dosen_wali_user = User::factory()->create([
                'role' => 'dosen_wali',
            ]);
            
            Dosen::factory()->create([
                'user_id' => $dosen_wali_user->id,
                'kelas_id' => $k->id,
            ]);

            $mhsid = User::factory()->count(10)->create([
                'role' => 'mahasiswa',
            ]);
            foreach ($mhsid as $mid) {
                Mahasiswa::factory()->create([
                    'user_id' => $mid->id,
                    'kelas_id' => $k->id,
                ]);
            }
        }

    }
}
