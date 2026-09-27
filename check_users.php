<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = App\Models\User::all();
foreach($users as $u) {
    echo "ID: {$u->id} | Name: {$u->name} | Email: {$u->email} | Mobile: {$u->mobile} | Admin: {$u->admin}\n";
}
