<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Amenity;
use App\Models\GalleryImage;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@siddhipriyagracia.com')],
            [
                'name' => 'Siddhipriya Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeThis@12345')),
            ]
        );

        $settings = [
            'site_name' => 'Siddhipriya Gracia',
            'brand_line' => 'A refined 2 & 3 BHK address on Bopal-Ghuma Road, Ahmedabad.',
            'primary_phone' => '+91 00000 00000',
            'primary_email' => 'sales@siddhipriyagracia.com',
            'office_address' => '23, Greencity, Vrajshyam Co-Society, Bopal-Ghuma Road, Ahmedabad, Gujarat 380058',
            'google_rating' => '4.6/5 based on 38 public reviews',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text', 'group' => 'general']);
        }

        $amenities = [
            ['Club House', 'club-house', '⌂', 'A community space designed for residents to gather, unwind and host everyday moments.'],
            ['Gymnasium', 'gymnasium', '↗', 'Fitness-ready lifestyle amenity for daily wellness routines.'],
            ['Swimming Pool', 'swimming-pool', '≈', 'A lifestyle pool experience for family recreation and relaxation.'],
            ['24x7 Security', '24x7-security', '◎', 'Security cabin and round-the-clock site security for resident confidence.'],
            ['CCTV Surveillance', 'cctv-surveillance', '◉', 'Camera surveillance support across key common areas.'],
            ['24x7 Water Supply', 'water-supply', '♢', 'Essential water supply support for comfortable everyday living.'],
            ['Lifts', 'lifts', '⇧', 'Vertical access planned for convenient movement across towers.'],
            ['Intercom', 'intercom', '☎', 'Intercom-enabled communication for added convenience.'],
        ];

        foreach ($amenities as $index => [$name, $slug, $icon, $description]) {
            Amenity::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'icon' => $icon,
                'description' => $description,
                'sort_order' => $index + 1,
            ]);
        }

        $project = Project::updateOrCreate(
            ['slug' => 'siddhipriya-gracia'],
            [
                'title' => 'Siddhipriya Gracia',
                'subtitle' => 'Premium 2 & 3 BHK Apartments in Ghuma, Ahmedabad',
                'developer_name' => 'Siddhipriya Group',
                'address' => '23, Greencity, Vrajshyam Co-Society, Bopal-Ghuma Road',
                'city' => 'Ahmedabad',
                'state' => 'Gujarat',
                'pincode' => '380058',
                'map_plus_code' => '2CFW+2R Ahmedabad, Gujarat',
                'rera_id' => 'PR/GJ/AHMEDABAD/DASKROI/Ahmedabad Municipal Corporation/MAA13809/080724/311228',
                'rera_agent_id' => 'AG/W/AHMEDABAD/AHMEDABADCITY/AUDA/AA00541/020523R1',
                'configuration' => '2 BHK & 3 BHK Apartments',
                'possession_date' => 'December 2028',
                'launch_date' => 'March 2023',
                'project_area' => '2.36 Acres',
                'project_size' => '9 buildings · 510 units',
                'units' => 510,
                'towers' => 9,
                'floors' => 14,
                'size_range' => '1,354 - 1,890 sq.ft.',
                'price_range' => 'From ₹59.71 Lacs onwards',
                'avg_price' => 'Approx. ₹4.13K - ₹4.43K/sq.ft.',
                'short_description' => 'Siddhipriya Gracia is a RERA-registered residential project at Bopal-Ghuma Road, Ahmedabad, planned around practical 2 and 3 BHK homes, lifestyle amenities and everyday connectivity.',
                'long_description' => 'Set near Greencity on Bopal-Ghuma Road, Siddhipriya Gracia brings together apartment planning, resident-focused amenities and a growing western Ahmedabad address. The website content is structured for buyer clarity: configuration, size, price range, RERA reference, amenities, inquiry and site-visit flow are kept upfront instead of hidden behind vague marketing copy.',
                'hero_image' => 'assets/img/gracia-hero-building.svg',
                'status' => 'Under Construction',
                'is_featured' => true,
                'seo_title' => 'Siddhipriya Gracia Ghuma Ahmedabad | 2 & 3 BHK Apartments',
                'seo_description' => 'Siddhipriya Gracia at Bopal-Ghuma Road, Ahmedabad offers 2 and 3 BHK apartments, RERA details, modern amenities, price range and site visit inquiry.',
            ]
        );

        $project->amenities()->sync(Amenity::pluck('id')->all());

        $gallery = [
            ['3D Tower View', 'assets/img/gracia-hero-building.svg', 'Original 3D vector tower visual for Siddhipriya Gracia'],
            ['Lifestyle Clubhouse Mood', 'assets/img/gracia-clubhouse.svg', 'Original clubhouse lifestyle vector artwork'],
            ['2 & 3 BHK Planning Preview', 'assets/img/gracia-floorplan.svg', 'Original floor planning concept visual'],
            ['Location Connectivity', 'assets/img/gracia-location-map.svg', 'Original location connectivity vector map'],
        ];

        foreach ($gallery as $index => [$title, $path, $alt]) {
            GalleryImage::updateOrCreate(
                ['project_id' => $project->id, 'title' => $title],
                ['image_path' => $path, 'alt_text' => $alt, 'sort_order' => $index + 1]
            );
        }
    }
}
