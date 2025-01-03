<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'titleOne' => 'Nepal Government',
            'titleTwo' => 'Ministry Of Health And Population',
            'titleThree' => 'Department of Health Service',
            // 'titleFour' => '',
            'description' => 'Nepal Government, Ministry Of Health And Population, Department of Health Service',
            'address' => 'Teku, Kathmandu -44600, Nepal',
            'primaryContact' => '+977-015361712',
            // 'secondaryContact' => '',
            'primaryEmail' => 'contact@dohs.com',
            // 'secondaryEmail' => 'Nepal Government',
            // 'socialTwitterLink' => 'Nepal Government',
            // 'socialFacebookLink' => 'Nepal Government',
            // 'socialYoutubeLink' => 'Nepal Government',
            'imap' => 'https://maps.app.goo.gl/kzRUusNYv2r6nRwM9',
            // 'metaKeywords' => 'Nepal Government',
            // 'metaDescription' => 'Nepal Government',
        ]);
    }
}
