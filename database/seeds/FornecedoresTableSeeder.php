<?php

use Illuminate\Database\Seeder;

class FornecedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Fornecedor::class, 10)->create()->each(function ($fornecedor) {
            $fornecedor->save();
        });
    }
}
