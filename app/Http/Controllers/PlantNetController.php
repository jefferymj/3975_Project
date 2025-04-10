<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlantNetService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use App\Models\Plant;

class PlantNetController extends Controller
{
    protected $plantNetService;

    public function __construct(PlantNetService $plantNetService)
    {
        $this->plantNetService = $plantNetService;
    }

    public function identify(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|max:5120',
        ]);
    
        $imagePath = $request->file('image')->store('plantnet', 'public');
    
        $response = $this->plantNetService->identifyPlant(
            storage_path("app/public/{$imagePath}")
        );
    
        $saved = null;
        $user = null;
    
        if (Auth::check() && !empty($response['results'][0]['species'])) {
            $speciesData = $response['results'][0]['species'];
    
            try {
                $saved = Plant::create([
                    'user_id' => Auth::id(),
                    'species' => $speciesData['scientificNameWithoutAuthor'] ?? null,
                    'genus' => $speciesData['genus']['scientificName'] ?? null,
                    'family' => $speciesData['family']['scientificName'] ?? null,
                    'common_names' => $speciesData['commonNames'] ?? [],
                    'image_path' => $imagePath,
                ]);
    
                $user = Auth::user(); // Optional: include user info in response
    
                Log::info('✅ Plant saved:', ['id' => $saved->id]);
    
            } catch (\Exception $e) {
                Log::error('❌ Error saving plant', ['error' => $e->getMessage()]);
            }
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Plant identified',
            'saved' => $saved,
            'user' => $user,
            'plantnet_data' => $response,
        ]);
}
}