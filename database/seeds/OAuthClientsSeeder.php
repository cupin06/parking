<?php

use Illuminate\Database\Seeder;

class OAuthClientsSeeder extends Seeder
{
    public function run()
    {
        DB::table('oauth_clients')->insert(array(
            'client_id' => "testclient",
            'client_secret' => NULL,
            'redirect_uri' => "http://test/",
        ));

        DB::table('oauth_users')->insert(array(
            'username' => "bshaffer",
            'password' => sha1("brent123"),
            'first_name' => "Brent",
            'last_name' => "Shaffer",
        ));
    }
}