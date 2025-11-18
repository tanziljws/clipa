<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriLike;
use App\Models\Galeri;

class GaleriLikeController extends Controller
{
    public function toggle(Request $request, $id)
    {
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        $galeri = Galeri::findOrFail($id);
        
        // Check if already liked by this IP
        $existingLike = GaleriLike::where('id_galeri', $id)
            ->where('ip_address', $ipAddress)
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
        } else {
            // Like
            GaleriLike::create([
                'id_galeri' => $id,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
            ]);
            $liked = true;
        }

        $likeCount = $galeri->likes()->count();

        return response()->json([
            'liked' => $liked,
            'likeCount' => $likeCount
        ]);
    }

    public function check(Request $request, $id)
    {
        $ipAddress = $request->ip();
        
        $liked = GaleriLike::where('id_galeri', $id)
            ->where('ip_address', $ipAddress)
            ->exists();

        $galeri = Galeri::findOrFail($id);
        $likeCount = $galeri->likes()->count();

        return response()->json([
            'liked' => $liked,
            'likeCount' => $likeCount
        ]);
    }
}

