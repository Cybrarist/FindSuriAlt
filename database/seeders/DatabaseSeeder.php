<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $provinces=[
            "Damascus"=>"دمشق",
            "Rural Damascus"=>"ريف دمشق",
            "Aleppo"=>"حلب",
            "Homs"=>"حمص",
            "Hama"=>"حماة",
            "Latakia"=>"اللاذقية",
            "Tartus"=>"طرطوس",
            "Idlib"=>"إدلب",
            "Raqqa"=>"الرقة",
            "Hasakah"=>"الحسكة",
            "Daraa"=>"درعا",
            "As-Suwayda"=>"السويداء",
            "Quneitra"=>"القنيطرة",
            "Deir ez-Zor"=>"دير الزور",
        ];

        foreach ($provinces as $english=>$arabic)
            Province::updateOrCreate([
                'name' => $english,
            ],[
                'name_ar' => $arabic,
                'user_id' => 1
            ]);



        $cities=[
            ["name"=>"Damascus","name_ar"=>"دمشق", "province_id"=>Province::firstOrCreate(['name_ar'=>"دمشق"])->id],
            ["name"=>"Douma","name_ar"=>"دوما", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Harasta","name_ar"=>"حرستا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Darayya","name_ar"=>"داريا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Al-Moadamiyah","name_ar"=>"المعضمية", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Al-Zabadani","name_ar"=>"الزبداني", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Al-Tal","name_ar"=>"التل", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Qudsaya","name_ar"=>"قدسيا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Jaramana","name_ar"=>"جرمانا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Yabroud","name_ar"=>"يبرود", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Al-Nabek","name_ar"=>"النبك", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Al-Qutayfah","name_ar"=>"القطيفة", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Ein Tarma","name_ar"=>"عين ترما", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Kafr Batna","name_ar"=>"كفر بطنا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Saqba","name_ar"=>"سقبا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Arbin","name_ar"=>"عربين", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Deir Atiyah","name_ar"=>"دير عطية", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Saidnaya","name_ar"=>"صيدنايا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Maaloula","name_ar"=>"معلولا", "province_id"=>Province::firstOrCreate(['name_ar'=>"ريف دمشق"])->id],
            ["name"=>"Aleppo","name_ar"=>"حلب", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Manbij","name_ar"=>"منبج", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Al-Bab","name_ar"=>"الباب", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Azaz","name_ar"=>"إعزاز", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Afrin","name_ar"=>"عفرين", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Al-Safira","name_ar"=>"السفيرة", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Deir Hafer","name_ar"=>"دير حافر", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Tall Rifaat","name_ar"=>"تل رفعت", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Jarabulus","name_ar"=>"جرابلس", "province_id"=>Province::firstOrCreate(['name_ar'=>"حلب"])->id],
            ["name"=>"Homs","name_ar"=>"حمص", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Palmyra","name_ar"=>"تدمر", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Al-Rastan","name_ar"=>"الرستن", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Talbiseh","name_ar"=>"تلبيسة", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Al-Qusayr","name_ar"=>"القصير", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Al-Mukharram","name_ar"=>"المخرم", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Al-Houla","name_ar"=>"الحولة", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Talkalakh","name_ar"=>"تلكلخ", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Al-Qaryatayn","name_ar"=>"القريتين", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Mahin","name_ar"=>"مهين", "province_id"=>Province::firstOrCreate(['name_ar'=>"حمص"])->id],
            ["name"=>"Hama","name_ar"=>"حماة", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Al-Salamiyah","name_ar"=> "السلمية", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Masyaf","name_ar"=>"مصياف", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Mahardah","name_ar"=>"محردة", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Kafr Zita","name_ar"=>"كفرزيتا", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Souran","name_ar"=>"صوران", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Taybat al-Imam","name_ar"=>"طيبة الإمام", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Qalaat al-Madiq","name_ar"=>"قلعة المضيق", "province_id"=>Province::firstOrCreate(['name_ar'=>"حماة"])->id],
            ["name"=>"Latakia","name_ar"=>"اللاذقية", "province_id"=>Province::firstOrCreate(['name_ar'=>"اللاذقية"])->id],
            ["name"=>"Jableh","name_ar"=>"جبلة", "province_id"=>Province::firstOrCreate(['name_ar'=>"اللاذقية"])->id],
            ["name"=>"Al-Qardaha","name_ar"=>"القرداحة", "province_id"=>Province::firstOrCreate(['name_ar'=>"اللاذقية"])->id],
            ["name"=>"Al-Haffa","name_ar"=>"الحفة", "province_id"=>Province::firstOrCreate(['name_ar'=>"اللاذقية"])->id],
            ["name"=>"Tartus","name_ar"=>"طرطوس", "province_id"=>Province::firstOrCreate(['name_ar'=>"طرطوس"])->id],
            ["name"=>"Baniyas","name_ar"=>"بانياس", "province_id"=>Province::firstOrCreate(['name_ar'=>"طرطوس"])->id],
            ["name"=>"Safita","name_ar"=>"صافيتا", "province_id"=>Province::firstOrCreate(['name_ar'=>"طرطوس"])->id],
//            ["name"=>"Al-Dreikish","name_ar"=>"الدريكيش", "province_id"=>Province::firstOrCreate(['name_ar'=>"طرطوس"])->id],
            ["name"=>"Sheikh Badr","name_ar"=>"الشيخ بدر", "province_id"=>Province::firstOrCreate(['name_ar'=>"طرطوس"])->id],
            ["name"=>"Idlib","name_ar"=>"إدلب", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Maarrat al-Numan","name_ar"=>"معرة النعمان", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Ariha","name_ar"=>"أريحا", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Jisr al-Shughur","name_ar"=>"جسر الشغور", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Saraqib","name_ar"=>"سراقب", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Khan Shaykhun","name_ar"=>"خان شيخون", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Kafr Nabl","name_ar"=>"كفرنبل", "province_id"=>Province::firstOrCreate(['name_ar'=>"إدلب"])->id],
            ["name"=>"Deir ez-Zor","name_ar"=>"دير الزور", "province_id"=>Province::firstOrCreate(['name_ar'=>"دير الزور"])->id],
            ["name"=>"Al-Bukamal","name_ar"=>"البوكمال", "province_id"=>Province::firstOrCreate(['name_ar'=>"دير الزور"])->id],
            ["name"=>"Al-Mayadin","name_ar"=>"الميادين", "province_id"=>Province::firstOrCreate(['name_ar'=>"دير الزور"])->id],
            ["name"=>"Hajin","name_ar"=>"هجين", "province_id"=>Province::firstOrCreate(['name_ar'=>"دير الزور"])->id],
            ["name"=>"Raqqa","name_ar"=>"الرقة", "province_id"=>Province::firstOrCreate(['name_ar'=>"الرقة"])->id],
            ["name"=>"Al-Tabqah","name_ar"=>"الطبقة", "province_id"=>Province::firstOrCreate(['name_ar'=>"الرقة"])->id],
            ["name"=>"Tell Abyad","name_ar"=>"تل أبيض", "province_id"=>Province::firstOrCreate(['name_ar'=>"الرقة"])->id],
            ["name"=>"Suluk","name_ar"=>"سلوك", "province_id"=>Province::firstOrCreate(['name_ar'=>"الرقة"])->id],
            ["name"=>"Hasakah","name_ar"=>"الحسكة", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Qamishli","name_ar"=>"القامشلي", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Ras al-Ayn","name_ar"=>"رأس العين", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Al-Malikiyah","name_ar"=>"المالكية", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Al-Shaddadi","name_ar"=>"الشدادي", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Tell Tamer","name_ar"=>"تل تمر", "province_id"=>Province::firstOrCreate(['name_ar'=>"الحسكة"])->id],
            ["name"=>"Daraa","name_ar"=>"درعا", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Nawa","name_ar"=>"نوى", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Tafas","name_ar"=>"طفس", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Jasim","name_ar"=>"جاسم", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Al-Sanamayn","name_ar"=>"الصنمين", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Izra","name_ar"=>"إزرع", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Dael","name_ar"=>"داعل", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Bosra","name_ar"=>"بصرى الشام", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"Al-Hirak","name_ar"=>"الحراك", "province_id"=>Province::firstOrCreate(['name_ar'=>"درعا"])->id],
            ["name"=>"As-Suwayda","name_ar"=>"السويداء", "province_id"=>Province::firstOrCreate(['name_ar'=>"السويداء"])->id],
            ["name"=>"Shahba","name_ar"=>"شهبا", "province_id"=>Province::firstOrCreate(['name_ar'=>"السويداء"])->id],
            ["name"=>"Salkhad","name_ar"=>"صلخد", "province_id"=>Province::firstOrCreate(['name_ar'=>"السويداء"])->id],
            ["name"=>"Al-Qurayya","name_ar"=>"القريا", "province_id"=>Province::firstOrCreate(['name_ar'=>"السويداء"])->id],
            ["name"=>"Quneitra","name_ar"=>"القنيطرة", "province_id"=>Province::firstOrCreate(['name_ar'=>"القنيطرة"])->id],
            ["name"=>"Khan Arnabah","name_ar"=>"خان أرنبة", "province_id"=>Province::firstOrCreate(['name_ar'=>"القنيطرة"])->id],
            ["name"=>"Jaba","name_ar"=>"جباتا الخشب", "province_id"=>Province::firstOrCreate(['name_ar'=>"القنيطرة"])->id],
            ["name"=>"Hader","name_ar"=>"حضر", "province_id"=>Province::firstOrCreate(['name_ar'=>"القنيطرة"])->id],
        ];


        foreach ($cities as $city)
            City::updateOrCreate([
                'name' => $city['name'],
            ],[
                'name_ar' => $city['name_ar'],
                'province_id' => $city['province_id'],
                'user_id' => 1
            ]);


        $this->call([
            PersonSeeder::class,
        ]);

    }
}
