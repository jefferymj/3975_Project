<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PlantNetService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('PLANTNET_API_URL');
        $this->apiKey = env('PLANTNET_API_KEY');
    }

    public function identifyPlant($imagePath)
    {
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->attach(
            'images', file_get_contents($imagePath), basename($imagePath)
        )->post("{$this->apiUrl}?api-key={$this->apiKey}");
    
        return $response->json();
    }
}