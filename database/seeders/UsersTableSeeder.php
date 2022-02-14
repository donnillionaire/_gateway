<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Accountant','Employee', 'Client'];

        /*create/update roles in db*/
        foreach ($roles as $role) {
            $role = Role::updateOrCreate(['name' => $role, 'guard_name' => 'api']);
        }

        /*get roles from db*/
        $admin_role = Role::where('name', "Admin")->first();
        $accountant_role = Role::where('name', "Accountant")->first();
        $employee_role = Role::where('name', "Employee")->first();
        $client_role = Role::where('name', "Client")->first();

        /*create user accounts*/
        $admin = User::create([
            'name' => 'Test Administrator',
            'email' => 'admin@innovativetoll.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $accountant = User::create([
            'name' => 'Test Accountant',
            'email' => 'accountant@innovativetoll.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $employee = User::create([
            'name' => 'Test Employee',
            'email' => 'employee@innovativetoll.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $client = User::create([
            'name' => 'Test Client',
            'email' => 'client@innovativetoll.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        /*assign roles*/
        $admin->assignRole($admin_role);
        $accountant->assignRole($accountant_role);
        $employee->assignRole($employee_role);
        $client->assignRole($client_role);
    }
}
