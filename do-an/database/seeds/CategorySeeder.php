<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @author 
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('categories')->insert([
                'uuid'       => (string)Str::uuid(),
                'status'     => 'on',
                'position'   => 0,
                'user_id'    => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ]);

            DB::table('categories_translations')->insert(
                [
                    [
                        'uuid'        => (string)Str::uuid(),
                        'name'        => '------------ ROOT ------------',
                        'locale'      => 'vi',
                        'category_id' => 1
                    ],
                    [
                        'uuid'        => (string)Str::uuid(),
                        'name'        => '------------ ROOT ------------',
                        'locale'      => 'en',
                        'category_id' => 1
                    ]
                ]
            );
        });
    }
}
