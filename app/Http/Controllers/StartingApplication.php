<?php
 
namespace App\Http\Controllers;

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
        if (request()->get('key') !== 'aplikasi') {
            abort(404);
        }

        if (User::take(1)->first() === null) {
            $user = [
                'id' => Str::uuid(),
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            ];

            User::create($user);
        }
    }
}