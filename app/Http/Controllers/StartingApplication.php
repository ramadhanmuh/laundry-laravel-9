<?php
 
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StartingApplication extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        if (request()->get('key') !== 'situs-laundry') {
            abort(404);
        }

        $applicationHasStarted = 1;

        $user = [
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ];

        if (User::take(1)->first() === null) {
            $applicationHasStarted = 0;
            User::create($user);
        }

        if (Application::take(1)->first() === null) {
            Application::create([
                'name' => 'Situs Laundry',
                'description' => 'Situs menyediakan katalog layanan cuci pakaian.',
                'copyright' => 'Laundry 2024',
                'smallImage' => 'logo-small.png',
                'mediumImage' => 'logo-medium.png',
                'largeImage' => 'logo-large.png',
                'favicon' => 'favicon.ico'
            ]);
        }

        return $applicationHasStarted ? 'Berhasil' : 'Email = "admin@admin.com"; Password = "password"';
    }
}