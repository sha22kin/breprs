<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * বাংলাদেশ নদী পরিবেশ রক্ষা অধিকার সোসাইটি — ৩১ সদস্য বিশিষ্ট কেন্দ্রীয় কমিটি (উপদেষ্টা সহ)।
 * Members are stored as Post type 7; photo uploads fall back to medies/member-avatar.svg.
 *
 * Run: php artisan db:seed --class=CommitteeMembersSeeder
 */
class CommitteeMembersSeeder extends Seeder
{
    public function run(): void
    {
        // [name, designation, phone]
        $rows = [
            ['বিচারপতি শিকদার মকবুল হক', 'উপদেষ্টা', null],
            ['মোঃ রবিউল ইসলাম রবি', 'চেয়ারম্যান', '০১৯১১৭৪০০৬৬'],
            ['বীর মুক্তিযোদ্ধা নজরুল ইসলাম', 'ভাইস চেয়ারম্যান', null],
            ['আলভী কালিমুল্লাহ সঞ্জিদ', 'ভাইস চেয়ারম্যান', null],
            ['জহিরুল হক', 'ভাইস চেয়ারম্যান', null],
            ['আবুল কালাম আজাদ', 'ভাইস চেয়ারম্যান', null],
            ['বিলকিস সুলতানা', 'মহাসচিব', '০১৭৫৯০৯০০১৭'],
            ['নূরনবী ইসলাম', 'যুগ্ম মহাসচিব', null],
            ['লুৎফা সুলতানা', 'যুগ্ম মহাসচিব', null],
            ['মাহফুজা রেজা', 'সাংগঠনিক সচিব', '০১৬২৪৬৬৬৪৬৫'],
            ['শেখ লুৎফর রহমান লাতু', 'সহ-সাংগঠনিক সচিব', null],
            ['মোঃ শাহিনুল ইসলাম', 'প্রচার প্রকাশনা ও দপ্তর সচিব', '০১৭২১৩৩৮৯২৫'],
            ['মোঃ সাগর আল-আমিন', 'অর্থ সচিব', '০১৩০০৩৭৫১৩০'],
            ['মোঃ মোস্তাফিজুর রহমান খান', 'নদী ও পরিবেশ সচিব', null],
            ['অ্যাডভোকেট ফোরকান হাবিব', 'আইন সচিব', null],
            ['ইঞ্জিনিয়ার শামীম আহমেদ', 'শিল্প ও কলকারখানা সচিব', null],
            ['মোঃ শাফির উদ্দিন', 'মানব কল্যাণ সচিব', null],
            ['দেওয়ান মাহাবুব', 'ধর্ম ও দূষণ রোধ ব্যবস্থাপনা সচিব', null],
            ['আব্দুর রহমান', 'জলবায়ু সচিব', null],
            ['সালমা আক্তার শম্পা', 'আন্তর্জাতিক সচিব', '+১(৯২৯)২৫৮৯২১৬'],
            ['ডাক্তার বিপ্লব', 'স্বাস্থ্য সচিব', null],
            ['খাতিজা খাতুন', 'সাংস্কৃতিক সচিব', null],
            ['বিলকিস রেজা', 'সমাজসেবা ও ত্রাণ সচিব', null],
            ['পারভীন সুলতানা', 'সদস্য', null],
            ['রেশমা আক্তার সোনিয়া', 'সদস্য', null],
            ['পারভীন সুলতানা ছবি', 'সদস্য', null],
            ['মাইমুনা আক্তার বুশরা', 'সদস্য', null],
            ['পারভিন আক্তার হেনা', 'সদস্য', null],
            ['রওশন আরা', 'সদস্য', null],
            ['নজরুল ইসলাম ভূঁইয়া', 'সদস্য', null],
            ['রহিমা খাতুন', 'সদস্য', null],
            ['হাফিজ উদ্দিন ভূঁইয়া', 'সদস্য', null],
        ];

        $now = Carbon::now();
        foreach ($rows as $i => [$name, $designation, $phone]) {
            // Skip members already present so the seeder is safe to re-run
            if (Post::where('type', 7)->where('name', $name)->where('short_description', $designation)->exists()) {
                continue;
            }

            $member = new Post();
            $member->type              = 7;
            $member->name              = $name;
            $member->short_description = $designation; // Designation
            $member->seo_keyword       = $phone;       // Phone
            $member->drag              = $i + 1;
            $member->status            = 'active';
            $member->fetured           = false;
            $member->addedby_id        = 1;
            $member->created_at        = $now->copy()->addSeconds($i);
            $member->save();
        }
    }
}
