<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlantNetService;

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
            'image' => 'required|image|max:5120' // Max size: 5MB
        ]);

        // Store the image in the "public/uploads" folder
        $path = $request->file('image')->move(public_path('uploads'), $request->file('image')->getClientOriginalName());

        // Call the PlantNet API with the image path
        $response = $this->plantNetService->identifyPlant($path);

        return response()->json([
            'plantnet_response' => $response,
            'image_url' => url('uploads/' . $request->file('image')->getClientOriginalName())
        ]);
    }
}
