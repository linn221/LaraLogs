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
        $no = 20;
        Log::create([
            'title' => 'example',
            'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum, aliquam. Nostrum ratione enim iste veniam, corporis sit excepturi tenetur, nesciunt perferendis earum quod placeat dolorem porro reprehenderit quam? Eius, facilis?",
            'category_id' => 1
        ]);
        Log::factory()->count($no-1)->create();
        for($i = 1; $i <= $no; $i++) {
            $tag_ids = [$this->randTag()];
            while (rand(1, 3) == 3) {
                $tag_ids[] = $this->randTag();
            }
            Log::find($i)->tags()->attach(array_unique($tag_ids));
        }
        //
    }

    private function randTag() : int {
        return rand(1, 10);
    }
}
