<?php

namespace Database\Seeders;

use App\Models\User;  // استيراد نموذج User
use Illuminate\Database\Seeder;  // استيراد الفئة الأساسية لـ Seeder
use Illuminate\Support\Facades\Hash;  // استيراد Hash لتشفير كلمات المرور

class UserSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){// إنشاء مستخدم جديدUser::create(['name' => 'الحلاق 1',  // اسم المستخدم'email' => 'barber1@example.com',  // البريد الإلكتروني'password' => Hash::make('password'),  // تشفير كلمة المرور'role' => 'barber',  // دور المستخدم (حلاق)]);

        // يمكنك إضافة المزيد من المستخدمين هنا
        User::create([
            'name' => 'المستخدم 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',  // دور المستخدم (مستخدم عادي)
        ]);
    }
}