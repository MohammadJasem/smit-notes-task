<?php

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(App\Note::class, 50)->create()->each(function ($note) {
	        $note->comments()->saveMany(factory(App\Comment::class, rand(1, 5))->make());
	    });
    }
}
