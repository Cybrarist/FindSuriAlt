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

        if (app()->isLocal())
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
                'name_second_lang' => $arabic,
                'user_id' => 1
            ]);



        $cities=[
            ["name"=>"Damascus","name_second_lang"=>"دمشق", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"دمشق"])->id],
            ["name"=>"Douma","name_second_lang"=>"دوما", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Harasta","name_second_lang"=>"حرستا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Darayya","name_second_lang"=>"داريا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Al-Moadamiyah","name_second_lang"=>"المعضمية", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Al-Zabadani","name_second_lang"=>"الزبداني", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Al-Tal","name_second_lang"=>"التل", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Qudsaya","name_second_lang"=>"قدسيا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Jaramana","name_second_lang"=>"جرمانا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Yabroud","name_second_lang"=>"يبرود", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Al-Nabek","name_second_lang"=>"النبك", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Al-Qutayfah","name_second_lang"=>"القطيفة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Ein Tarma","name_second_lang"=>"عين ترما", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Kafr Batna","name_second_lang"=>"كفر بطنا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Saqba","name_second_lang"=>"سقبا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Arbin","name_second_lang"=>"عربين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Deir Atiyah","name_second_lang"=>"دير عطية", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Saidnaya","name_second_lang"=>"صيدنايا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Maaloula","name_second_lang"=>"معلولا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"ريف دمشق"])->id],
            ["name"=>"Aleppo","name_second_lang"=>"حلب", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Manbij","name_second_lang"=>"منبج", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Al-Bab","name_second_lang"=>"الباب", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Azaz","name_second_lang"=>"إعزاز", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Afrin","name_second_lang"=>"عفرين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Al-Safira","name_second_lang"=>"السفيرة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Deir Hafer","name_second_lang"=>"دير حافر", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Tall Rifaat","name_second_lang"=>"تل رفعت", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Jarabulus","name_second_lang"=>"جرابلس", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حلب"])->id],
            ["name"=>"Homs","name_second_lang"=>"حمص", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Palmyra","name_second_lang"=>"تدمر", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Al-Rastan","name_second_lang"=>"الرستن", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Talbiseh","name_second_lang"=>"تلبيسة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Al-Qusayr","name_second_lang"=>"القصير", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Al-Mukharram","name_second_lang"=>"المخرم", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Al-Houla","name_second_lang"=>"الحولة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Talkalakh","name_second_lang"=>"تلكلخ", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Al-Qaryatayn","name_second_lang"=>"القريتين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Mahin","name_second_lang"=>"مهين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حمص"])->id],
            ["name"=>"Hama","name_second_lang"=>"حماة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Al-Salamiyah","name_second_lang"=> "السلمية", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Masyaf","name_second_lang"=>"مصياف", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Mahardah","name_second_lang"=>"محردة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Kafr Zita","name_second_lang"=>"كفرزيتا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Souran","name_second_lang"=>"صوران", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Taybat al-Imam","name_second_lang"=>"طيبة الإمام", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Qalaat al-Madiq","name_second_lang"=>"قلعة المضيق", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"حماة"])->id],
            ["name"=>"Latakia","name_second_lang"=>"اللاذقية", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"اللاذقية"])->id],
            ["name"=>"Jableh","name_second_lang"=>"جبلة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"اللاذقية"])->id],
            ["name"=>"Al-Qardaha","name_second_lang"=>"القرداحة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"اللاذقية"])->id],
            ["name"=>"Al-Haffa","name_second_lang"=>"الحفة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"اللاذقية"])->id],
            ["name"=>"Tartus","name_second_lang"=>"طرطوس", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"طرطوس"])->id],
            ["name"=>"Baniyas","name_second_lang"=>"بانياس", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"طرطوس"])->id],
            ["name"=>"Safita","name_second_lang"=>"صافيتا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"طرطوس"])->id],
//            ["name"=>"Al-Dreikish","name_second_lang"=>"الدريكيش", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"طرطوس"])->id],
            ["name"=>"Sheikh Badr","name_second_lang"=>"الشيخ بدر", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"طرطوس"])->id],
            ["name"=>"Idlib","name_second_lang"=>"إدلب", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Maarrat al-Numan","name_second_lang"=>"معرة النعمان", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Ariha","name_second_lang"=>"أريحا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Jisr al-Shughur","name_second_lang"=>"جسر الشغور", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Saraqib","name_second_lang"=>"سراقب", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Khan Shaykhun","name_second_lang"=>"خان شيخون", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Kafr Nabl","name_second_lang"=>"كفرنبل", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"إدلب"])->id],
            ["name"=>"Deir ez-Zor","name_second_lang"=>"دير الزور", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"دير الزور"])->id],
            ["name"=>"Al-Bukamal","name_second_lang"=>"البوكمال", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"دير الزور"])->id],
            ["name"=>"Al-Mayadin","name_second_lang"=>"الميادين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"دير الزور"])->id],
            ["name"=>"Hajin","name_second_lang"=>"هجين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"دير الزور"])->id],
            ["name"=>"Raqqa","name_second_lang"=>"الرقة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الرقة"])->id],
            ["name"=>"Al-Tabqah","name_second_lang"=>"الطبقة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الرقة"])->id],
            ["name"=>"Tell Abyad","name_second_lang"=>"تل أبيض", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الرقة"])->id],
            ["name"=>"Suluk","name_second_lang"=>"سلوك", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الرقة"])->id],
            ["name"=>"Hasakah","name_second_lang"=>"الحسكة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Qamishli","name_second_lang"=>"القامشلي", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Ras al-Ayn","name_second_lang"=>"رأس العين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Al-Malikiyah","name_second_lang"=>"المالكية", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Al-Shaddadi","name_second_lang"=>"الشدادي", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Tell Tamer","name_second_lang"=>"تل تمر", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"الحسكة"])->id],
            ["name"=>"Daraa","name_second_lang"=>"درعا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Nawa","name_second_lang"=>"نوى", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Tafas","name_second_lang"=>"طفس", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Jasim","name_second_lang"=>"جاسم", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Al-Sanamayn","name_second_lang"=>"الصنمين", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Izra","name_second_lang"=>"إزرع", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Dael","name_second_lang"=>"داعل", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Bosra","name_second_lang"=>"بصرى الشام", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"Al-Hirak","name_second_lang"=>"الحراك", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"درعا"])->id],
            ["name"=>"As-Suwayda","name_second_lang"=>"السويداء", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"السويداء"])->id],
            ["name"=>"Shahba","name_second_lang"=>"شهبا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"السويداء"])->id],
            ["name"=>"Salkhad","name_second_lang"=>"صلخد", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"السويداء"])->id],
            ["name"=>"Al-Qurayya","name_second_lang"=>"القريا", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"السويداء"])->id],
            ["name"=>"Quneitra","name_second_lang"=>"القنيطرة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"القنيطرة"])->id],
            ["name"=>"Khan Arnabah","name_second_lang"=>"خان أرنبة", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"القنيطرة"])->id],
            ["name"=>"Jaba","name_second_lang"=>"جباتا الخشب", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"القنيطرة"])->id],
            ["name"=>"Hader","name_second_lang"=>"حضر", "province_id"=>Province::firstOrCreate(['name_second_lang'=>"القنيطرة"])->id],
        ];


        foreach ($cities as $city)
            City::updateOrCreate([
                'name' => $city['name'],
            ],[
                'name_second_lang' => $city['name_second_lang'],
                'province_id' => $city['province_id'],
                'user_id' => 1
            ]);


        if (app()->isLocal())
            $this->call([
                PersonSeeder::class,
            ]);

    }
}
