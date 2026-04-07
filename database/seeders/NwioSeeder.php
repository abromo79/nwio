<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NwioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'NWIO Super Admin',
                'email' => 'admin@nwio.or.tz',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NWIO Editor',
                'email' => 'editor@nwio.or.tz',
                'password' => Hash::make('password'),
                'role' => 'editor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('about')->insert([
            ['type' => 'vision', 'content' => 'To create healthy marine ecosystems and resilient coastal communities in Tanzania, where people and nature thrive together through sustainable use and protection of ocean resources.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'mission', 'content' => 'To empower coastal communities, youth, and local stakeholders to conserve marine ecosystems and promote sustainable livelihoods through education, research, community participation, and innovative blue economy solutions.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'goal', 'content' => 'Protect and restore coral reefs, mangroves, and seagrass habitats for biodiversity conservation.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'goal', 'content' => 'Strengthen capacity of coastal communities, fishers, women, and youth in sustainable marine resource management.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'goal', 'content' => 'Promote sustainable fisheries, aquaculture, seaweed farming, and eco-tourism.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'goal', 'content' => 'Increase awareness on marine conservation, climate change, and ocean sustainability through outreach and training.', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'core_value', 'content' => 'Sustainability', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'core_value', 'content' => 'Community Empowerment', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'core_value', 'content' => 'Integrity and Transparency', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'core_value', 'content' => 'Innovation and Learning', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'core_value', 'content' => 'Collaboration', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $programs = [
            ['name' => 'Marine Conservation Program', 'slug' => 'marine-conservation-program', 'description' => 'Protects coral reefs, mangroves, seagrass ecosystems, and marine biodiversity.', 'objectives' => 'Conserve critical habitats and promote restoration through community stewardship.', 'image' => '/images/hero-ocean.svg'],
            ['name' => 'Sustainable Fisheries Program', 'slug' => 'sustainable-fisheries-program', 'description' => 'Promotes responsible fishing practices and improved fisheries governance.', 'objectives' => 'Improve fish stock sustainability and fisher livelihoods.', 'image' => '/images/hero-ocean.svg'],
            ['name' => 'Seaweed & Aquaculture Development Program', 'slug' => 'seaweed-aquaculture-development-program', 'description' => 'Supports coastal communities through climate-smart aquaculture enterprises.', 'objectives' => 'Increase income and resilience via seaweed farming and mariculture.', 'image' => '/images/hero-ocean.svg'],
            ['name' => 'Ocean Education & Youth Leadership Program', 'slug' => 'ocean-education-youth-leadership-program', 'description' => 'Builds awareness and leadership among youth on marine conservation.', 'objectives' => 'Develop the next generation of coastal and ocean champions.', 'image' => '/images/hero-ocean.svg'],
            ['name' => 'Climate Change & Coastal Resilience Program', 'slug' => 'climate-change-coastal-resilience-program', 'description' => 'Supports adaptation to coastal erosion, sea-level rise, and resource decline.', 'objectives' => 'Strengthen local resilience and ecosystem-based adaptation.', 'image' => '/images/hero-ocean.svg'],
            ['name' => 'Research & Innovation Program', 'slug' => 'research-innovation-program', 'description' => 'Advances science, data, and digital tools for ocean management.', 'objectives' => 'Generate actionable evidence for policy and conservation actions.', 'image' => '/images/hero-ocean.svg'],
        ];
        DB::table('programs')->insert(array_map(fn ($p) => $p + ['created_at' => now(), 'updated_at' => now()], $programs));

        $programRows = DB::table('programs')->pluck('id', 'slug');
        DB::table('program_activities')->insert([
            ['program_id' => $programRows['marine-conservation-program'], 'activity' => 'Mangrove restoration and coral reef monitoring.', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['sustainable-fisheries-program'], 'activity' => 'Fisher training on sustainable fishing methods and CPUE documentation.', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['seaweed-aquaculture-development-program'], 'activity' => 'Seaweed farming techniques and post-harvest processing support.', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['ocean-education-youth-leadership-program'], 'activity' => 'School ocean clubs and youth leadership camps.', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['climate-change-coastal-resilience-program'], 'activity' => 'Climate awareness training and coastal ecosystem restoration.', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['research-innovation-program'], 'activity' => 'Marine biodiversity research and GIS monitoring.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('projects')->insert([
            ['program_id' => $programRows['marine-conservation-program'], 'title' => 'Pemba Mangrove Recovery Initiative', 'description' => 'Community-led restoration in degraded mangrove zones.', 'location' => 'Pemba, Zanzibar', 'start_date' => '2025-01-15', 'end_date' => null, 'status' => 'ongoing', 'image' => '/images/hero-ocean.svg', 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => $programRows['sustainable-fisheries-program'], 'title' => 'Smart Fishing Data Pilot', 'description' => 'Digital catch reporting and fisher training in landing sites.', 'location' => 'Tanga', 'start_date' => '2024-03-01', 'end_date' => '2025-11-30', 'status' => 'completed', 'image' => '/images/hero-ocean.svg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('research')->insert([
            ['title' => 'Coral Health Baseline 2025', 'description' => 'Initial reef status baseline report for targeted restoration sites.', 'file' => 'coral-health-baseline-2025.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Seaweed Value Chain Assessment', 'description' => 'Assessment of production bottlenecks and market opportunities.', 'file' => 'seaweed-value-chain-assessment.pdf', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('news')->insert([
            ['title' => 'NWIO launches coastal restoration campaign', 'content' => 'The campaign mobilizes youth and fishers to restore mangrove and seagrass habitats.', 'image' => '/images/hero-ocean.svg', 'date' => '2026-02-01', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Youth Ocean Club network expands', 'content' => 'New school partnerships now support ocean clubs in three coastal districts.', 'image' => '/images/hero-ocean.svg', 'date' => '2026-03-10', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('events')->insert([
            ['title' => 'Blue Economy Community Forum', 'description' => 'Public forum on sustainable livelihoods and marine conservation.', 'location' => 'Dar es Salaam', 'event_date' => '2026-06-20', 'image' => '/images/hero-ocean.svg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'World Oceans Day Workshop', 'description' => 'Training on climate resilience and marine habitat protection.', 'location' => 'Mtwara', 'event_date' => '2026-06-08', 'image' => '/images/hero-ocean.svg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('team_members')->insert([
            ['name' => 'Issa Rashid Thabit', 'position' => 'Executive Director', 'department' => 'Executive', 'description' => 'Provides overall leadership and strategic direction.', 'photo' => '/images/logo.svg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kasim M Rajab', 'position' => 'Head of Programs', 'department' => 'Programs', 'description' => 'Leads implementation and growth of conservation programs.', 'photo' => '/images/logo.svg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mudhafar Ali Hamad', 'position' => 'Head of Finance & Administration', 'department' => 'Finance & Admin', 'description' => 'Oversees budgeting, reporting, and administration.', 'photo' => '/images/logo.svg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('gallery')->insert([
            ['file' => '/images/hero-ocean.svg', 'type' => 'photo', 'caption' => 'Mangrove restoration with local volunteers.', 'created_at' => now(), 'updated_at' => now()],
            ['file' => '/images/hero-ocean.svg', 'type' => 'photo', 'caption' => 'Youth training workshop on marine conservation.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('contact_messages')->insert([
            ['name' => 'Amina Salim', 'email' => 'amina@example.com', 'message' => 'I would like to volunteer for mangrove restoration.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('get_involved_requests')->insert([
            ['name' => 'Coastal Women Group', 'email' => 'cwgroup@example.com', 'type' => 'partner', 'message' => 'Interested in seaweed value chain partnership.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
