<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'php',
            'java',
            'react',
            'vue',
            'linux',
            'ubuntu',
            'laravel',
            'dot-net',
            'bootstrap',
            'tailwind'
        ];
        $tags_array = [];
        foreach($tags as $tag) {
            $tags_array[] = [
                'name' => $tag
            ];
        }
        Tag::create($tags_array);
    }
}