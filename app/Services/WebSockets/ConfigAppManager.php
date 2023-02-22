<?php

namespace App\Services\WebSockets;

use App\Models\Client;
use BeyondCode\LaravelWebSockets\Apps\ConfigAppManager as BaseManager;
use Illuminate\Support\Str;

class ConfigAppManager extends BaseManager
{
    public function __construct()
    {
        parent::__construct();

        $this->apps = Client::all()->map(function ($client) {
            return [
                'id' => $client->key,
                'name' => $client->name,
                'host' => Str::after($client->host, '//'),
                'key' => $client->key,
                'secret' => $client->secret,
                'capacity' => null,
                'enable_client_messages' => false,
                'enable_statistics' => false,
                'allowed_origins' => [],
            ];
        });
    }
}
