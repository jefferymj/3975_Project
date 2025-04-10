<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlantNetService;
use Illuminate\Support\Facades\Storage;

class PlantNetController extends Controller
{
    protected $plantNetService;

    public function __construct(PlantNetService $plantNetService)
    {
        $this->plantNetService = $plantNetService;
    }

    public function identify(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
        ]);
    
        $imagePath = $request->file('image')->store('plantnet', 'public');
    
        $response = $this->plantNetService->identifyPlant(
            storage_path("app/public/{$imagePath}")
        );
    
        return response()->json($response);
    }
}