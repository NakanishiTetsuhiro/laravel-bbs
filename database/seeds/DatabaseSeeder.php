<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // INFO: ここに書いたSeederクラスが php artisan migrate --seed を実行したときにmigration後に実行されます
        // $this->call(UsersTableSeeder::class);
        $this->call(PostCommentSeeder::class);
    }
}
