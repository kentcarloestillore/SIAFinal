<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            [
                'firstname'     => 'Kent Carlo',                         
                'lastname'      => 'Estillore',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-01-31',               
                'address'       => 'Cogon, Inabanga, Bohol',
                'phone'         => fake()->numerify('##########'),       
                'jobTitle'      => 'CEO',
                'prn'           => strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee1.jpg'
            ],
            [
                'firstname'     => 'Miljohn',                         
                'lastname'      => 'Pador',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-03-24',               
                'address'       => 'Macaas, Tubigon, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Project Manager',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee2.jpg'
            ],
            [
                'firstname'     => 'Alejandro',                         
                'lastname'      => 'Paclibar',           
                'gender'        => 'male',
                'dateOfBirth'   => '2002-10-10',               
                'address'       => 'Cabulijan, Tubigon, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Senior Developer',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee3.jpg'
            ],
            [
                'firstname'     => 'Clyde',                         
                'lastname'      => 'Sumayao',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-02-01',               
                'address'       => 'Santa Cruz, Calape, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Supervisor',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee4.jpg'
            ],
            [
                'firstname'     => 'Dane',                         
                'lastname'      => 'Cosicol',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-01-17',               
                'address'       => 'Libertad, Tubigon, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Manager',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee5.jpg'
            ],
            [
                'firstname'     => 'James',                         
                'lastname'      => 'Mante',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-05-24',               
                'address'       => 'Ilijan, Tubigon, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Human Resource Officer',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee6.jpg'
            ],
            [
                'firstname'     => 'Miguel',                         
                'lastname'      => 'Junayon',           
                'gender'        => 'male',
                'dateOfBirth'   => '2003-05-24',               
                'address'       => 'Macaas, Tubigon, Bohol',
                'phone'         =>fake()->numerify('##########'),       
                'jobTitle'      =>'Wala lang para dugang',
                'prn'           =>strtoupper(fake()->bothify('??#########??')),
                'img'           => '../../../css/employee6.jpg'
            ],
        ]);
    }
}
