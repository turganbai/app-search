<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    public function search(Request $request)
    {
        return response()->json(HotelResource::collection(Hotel::query()->get()), Response::HTTP_OK);
    }
}
