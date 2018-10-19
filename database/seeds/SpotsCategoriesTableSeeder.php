<?php

use Illuminate\Database\Seeder;

/**
 * Class SpotsCategoriesTableSeeder
 */
class SpotsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('spots_categories')->insert([
            [
                'id' => 1,
                'name' => '観光',
                'font_awesome_html' => '<i class="fas fa-archway"></i>',
            ],
            [
                'id' => 2,
                'name' => '食',
                'font_awesome_html' => '<i class="fas fa-utensils"></i>',
            ],
            [
                'id' => 3,
                'name' => '宿泊',
                'font_awesome_html' => '<i class="fas fa-bed"></i>',
            ],
            [
                'id' => 4,
                'name' => '徒歩',
                'font_awesome_html' => '<i class="fas fa-walking"></i>',
            ],
            [
                'id' => 5,
                'name' => '電車',
                'font_awesome_html' => '<i class="fas fa-train"></i>',
            ],
            [
                'id' => 6,
                'name' => 'バス',
                'font_awesome_html' => '<i class="fas fa-bus"></i>',
            ],
            [
                'id' => 7,
                'name' => '飛行機',
                'font_awesome_html' => '<i class="fas fa-plane"></i>',
            ],
            [
                'id' => 8,
                'name' => '車',
                'font_awesome_html' => '<i class="fas fa-car-side"></i>',
            ],
            [
                'id' => 9,
                'name' => 'その他',
                'font_awesome_html' => '<i class="fas fa-plus-circle"></i>',
            ],
            [
                'id' => 10,
                'name' => '自由入力',
                'font_awesome_html' => '<i class="far fa-star"></i>',
            ],
        ]);
    }
}
