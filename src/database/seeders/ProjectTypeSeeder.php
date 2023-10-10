<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['id'=>101, 'project_class_id'=>1, 'name'=>'Edificio'],
            ['id'=>102, 'project_class_id'=>1, 'name'=>'Hotel'],
            ['id'=>103, 'project_class_id'=>1, 'name'=>'Ph'],
            ['id'=>104, 'project_class_id'=>1, 'name'=>'Casa'],
            ['id'=>105, 'project_class_id'=>1, 'name'=>'Barrio cerrado'],
            ['id'=>106, 'project_class_id'=>1, 'name'=>'Country club'],
            ['id'=>107, 'project_class_id'=>1, 'name'=>'Tiempo compartido'],
            ['id'=>201, 'project_class_id'=>2, 'name'=>'Local'],
            ['id'=>202, 'project_class_id'=>2, 'name'=>'Local Shopping Center'],
            ['id'=>203, 'project_class_id'=>2, 'name'=>'Oficina'],
            ['id'=>301, 'project_class_id'=>3, 'name'=>'Depósito'],
            ['id'=>302, 'project_class_id'=>3, 'name'=>'Baulera'],
        ];
        
        foreach($rows as $row) {
            ProjectType::create($row);
        }
    }
}
