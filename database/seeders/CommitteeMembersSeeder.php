<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * বাংলাদেশ নদী পরিবেশ রক্ষা অধিকার সোসাইটি — ৩১ সদস্য বিশিষ্ট কেন্দ্রীয় কমিটি (উপদেষ্টা সহ)।
 * Members are stored as Post type 7; without a photo they show a male/female avatar by gender.
 *
 * Run: php artisan db:seed --class=CommitteeMembersSeeder
 */
class CommitteeMembersSeeder extends Seeder
{
    public function run(): void
    {
        // [member ID badge, name, designation, phone, gender]
        $rows = [
            [null, 'বিচারপতি শিকদার মকবুল হক', 'উপদেষ্টা', null, 'male'],
            ['০১', 'মোঃ রবিউল ইসলাম রবি', 'চেয়ারম্যান', '০১৯১১৭৪০০৬৬', 'male'],
            ['০২', 'বীর মুক্তিযোদ্ধা নজরুল ইসলাম', 'ভাইস চেয়ারম্যান', null, 'male'],
            ['০৩', 'আলভী কালিমুল্লাহ সঞ্জিদ', 'ভাইস চেয়ারম্যান', null, 'male'],
            ['০৪', 'জহিরুল হক', 'ভাইস চেয়ারম্যান', null, 'male'],
            ['০৫', 'আবুল কালাম আজাদ', 'ভাইস চেয়ারম্যান', null, 'male'],
            ['০৬', 'বিলকিস সুলতানা', 'মহাসচিব', '০১৭৫৯০৯০০১৭', 'female'],
            ['০৭', 'নূরনবী ইসলাম', 'যুগ্ম মহাসচিব', null, 'male'],
            ['০৮', 'লুৎফা সুলতানা', 'যুগ্ম মহাসচিব', null, 'female'],
            ['০৯', 'মাহফুজা রেজা', 'সাংগঠনিক সচিব', '০১৬২৪৬৬৬৪৬৫', 'female'],
            ['১০', 'শেখ লুৎফর রহমান লাতু', 'সহ-সাংগঠনিক সচিব', null, 'male'],
            ['১১', 'মোঃ শাহিনুল ইসলাম', 'প্রচার প্রকাশনা ও দপ্তর সচিব', '০১৭২১৩৩৮৯২৫', 'male'],
            ['১২', 'মোঃ সাগর আল-আমিন', 'অর্থ সচিব', '০১৩০০৩৭৫১৩০', 'male'],
            ['১৩', 'মোঃ মোস্তাফিজুর রহমান খান', 'নদী ও পরিবেশ সচিব', null, 'male'],
            ['১৪', 'অ্যাডভোকেট ফোরকান হাবিব', 'আইন সচিব', null, 'male'],
            ['১৫', 'ইঞ্জিনিয়ার শামীম আহমেদ', 'শিল্প ও কলকারখানা সচিব', null, 'male'],
            ['১৬', 'মোঃ শাফির উদ্দিন', 'মানব কল্যাণ সচিব', null, 'male'],
            ['১৭', 'দেওয়ান মাহাবুব', 'ধর্ম ও দূষণ রোধ ব্যবস্থাপনা সচিব', null, 'male'],
            ['১৮', 'আব্দুর রহমান', 'জলবায়ু সচিব', null, 'male'],
            ['১৯', 'সালমা আক্তার শম্পা', 'আন্তর্জাতিক সচিব', '+১(৯২৯)২৫৮৯২১৬', 'female'],
            ['২০', 'ডাক্তার বিপ্লব', 'স্বাস্থ্য সচিব', null, 'male'],
            ['২১', 'খাতিজা খাতুন', 'সাংস্কৃতিক সচিব', null, 'female'],
            ['২২', 'বিলকিস রেজা', 'সমাজসেবা ও ত্রাণ সচিব', null, 'female'],
            ['২৩', 'পারভীন সুলতানা', 'সদস্য', null, 'female'],
            ['২৪', 'রেশমা আক্তার সোনিয়া', 'সদস্য', null, 'female'],
            ['২৫', 'পারভীন সুলতানা ছবি', 'সদস্য', null, 'female'],
            ['২৬', 'মাইমুনা আক্তার বুশরা', 'সদস্য', null, 'female'],
            ['২৭', 'পারভিন আক্তার হেনা', 'সদস্য', null, 'female'],
            ['২৮', 'রওশন আরা', 'সদস্য', null, 'female'],
            ['২৯', 'নজরুল ইসলাম ভূঁইয়া', 'সদস্য', null, 'male'],
            ['৩০', 'রহিমা খাতুন', 'সদস্য', null, 'female'],
            ['৩১', 'হাফিজ উদ্দিন ভূঁইয়া', 'সদস্য', null, 'male'],
        ];

        $now = Carbon::now();
        foreach ($rows as $i => [$memberId, $name, $designation, $phone, $gender]) {
            // Update existing members so the seeder is safe to re-run
            $member = Post::where('type', 7)->where('name', $name)->where('short_description', $designation)->first();
            if (!$member) {
                $member = new Post();
                $member->type       = 7;
                $member->status     = 'active';
                $member->fetured    = false;
                $member->addedby_id = 1;
                $member->created_at = $now->copy()->addSeconds($i);
            }

            $member->name              = $name;
            $member->short_description = $designation; // Designation
            $member->seo_title         = $memberId;    // Member ID Badge
            $member->seo_keyword       = $phone;       // Phone
            $member->template          = $gender;      // Gender (default avatar)
            $member->drag              = $i + 1;
            $member->save();
        }
    }
}
