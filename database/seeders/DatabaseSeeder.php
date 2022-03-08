<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create();
        \App\Models\Product::factory(15)->create();
        $attributes = ['Gender', 'Color', 'Size'];
        foreach($attributes as $attrib) {
            $attribute = new Attribute();
            $attribute->name = $attrib;
            $attribute->save();
        }
    }
}
