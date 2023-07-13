<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use DB;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'slider-list',
           'slider-create',
           'slider-edit',
           'slider-delete',
           'aboutus-list',
           'aboutus-create',
           'aboutus-edit',
           'aboutus-delete',
           'services-list',
           'services-create',
           'services-edit',
           'services-delete',
           'whychoose-list',
           'whychoose-create',
           'whychoose-edit',
           'whychoose-delete',
           'contactdetails-list',
           'contactdetails-create',
           'contactdetails-edit',
           'contactdetails-delete',
           'getintouch-list',
           'getintouch-create',
           'getintouch-edit',
           'getintouch-delete',
           'clients-list',
           'clients-create',
           'clients-edit',
           'clients-delete',
           'testimonials-list',
           'testimonials-create',
           'testimonials-edit',
           'testimonials-delete',
           'careers-list',
           'careers-create',
           'careers-edit',
           'careers-delete',
           'users-list',
           'users-create',
           'users-edit',
           'users-delete',
           'reportcategory-list',
           'reportcategory-create',
           'reportcategory-edit',
           'reportcategory-delete',
           'reports-list',
           'reports-create',
           'reports-edit',
           'reports-delete',
        ];
     
        foreach ($permissions as $permission) {
            $data=explode('-',$permission);
             $permissions=Permission::create(['name' => $permission,'per_name'=>ucfirst($data[0])]);

             $permissions_id=$permissions->id;
             $data=array('permission_id'=>$permissions_id,'role_id'=>1);
             DB::table('role_has_permissions')->insert($data);
        }
    }
}