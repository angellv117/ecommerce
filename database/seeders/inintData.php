<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Family;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Presentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class inintData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            'Solidos' => [
                'Quesos' => [
                    'Queso rallado',
                    'Queso en barra',
                    'Queso en bloque',
                ],
            ],
            'Cremosos' => [
                'Salas' => [
                    'Salsa de nachos',
                ],
                'Queso crema' => [
                    'Queso crema',
                ],
            ],
            'Semilíquidos' => [
                'Yogur' => [
                    'Yogur natural',
                    'Yogur con frutas',
    
                ],
            ],
        ];

        $presentations = [
            '200 gr',
            '500 gr',
            '1 kg',
        ];

        // Crear familias
        foreach ($families as $family => $categories) {
            $family = Family::create([
                'name' => $family,
            ]);

            // Crear categorías
            foreach ($categories as $category => $subcategories) {
                $category = Category::create([
                    'name' => $category,
                    'family_id' => $family->id,
                ]);

                // Crear subcategorías
                foreach ($subcategories as $subcategory) {
                    $subcategory = Subcategory::create([
                        'name' => $subcategory,
                        'category_id' => $category->id,
                    ]);
                }
            }
        

            
        }

        // Crear presentaciones
        foreach ($presentations as $presentation) {
            Presentation::create([
                'name' => $presentation,
            ]);
        }

        // Crear un usuario

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Manuel Angel Lopez Vazquez',
                'email' => 'sistemas@productossanjuan.com.mx',
                'email_verified_at' => null,
                'password' => '$2y$12$lMlTmirrPXD9CD.P6BJOUuYPRD897m0jr/RFi1YmniBbDt29qTFhm', // ya está hasheado
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => '2025-04-06 19:38:31',
                'updated_at' => '2025-04-06 19:38:31',
            ],
            [
                'id' => 2,
                'name' => 'David Zavala',
                'email' => 'cuentasporpagar@productossanjuan.com.mx',
                'email_verified_at' => null,
                'password' => Hash::make('david123'),
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => '2025-04-06 19:38:31',
                'updated_at' => '2025-04-06 19:38:31',
            ]
        ]);

    }
}
