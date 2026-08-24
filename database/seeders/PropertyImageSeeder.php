<?php

namespace Database\Seeders;

use Database\Seeders\Support\DummyImageDownloader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyImageSeeder extends Seeder
{
    // How many extra gallery images per property, on top of the 1 featured image
    protected int $galleryPerProperty = 2;

    public function run(): void
    {
        $propertyIds = DB::table('properties')->pluck('id');

        foreach ($propertyIds as $propertyId) {
            // 1 featured (thumbnail) image
            DB::table('property_images')->insert([
                'property_id' => $propertyId,
                'image' => DummyImageDownloader::propertyImage('featured'),
                'is_thumbnail' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // gallery images
            for ($i = 0; $i < $this->galleryPerProperty; $i++) {
                DB::table('property_images')->insert([
                    'property_id' => $propertyId,
                    'image' => DummyImageDownloader::propertyImage('gallery'),
                    'is_thumbnail' => false,
                    'sort_order' => $i + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
