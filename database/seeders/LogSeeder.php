<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $no = 45;
        Log::create([
            'title' => '404',
            'content' => 'a',
            'category_id' => 1
        ]);
        Log::factory()->count($no-1)->create();
        for($i = 1; $i <= $no; $i++) {
            $tag_ids = [$this->randTag()];
            while (rand(1, 3) == 3) {
                $tag_ids[] = $this->randTag();
            }
            Log::find($i)->tags()->attach($tag_ids);
        }
        //
    }

    private function randTag() : int {
        return rand(1, 10);
    }
}
