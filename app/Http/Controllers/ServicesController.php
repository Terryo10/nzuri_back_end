<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function services()
    {
        $services = Services::all();

        return response()->json([
            'success' => true,
            'services' => $services,
        ]);
    }

    public function singleService($id)
    {
        $service = Services::find($id);


        return response()->json([
            'success' => true,
            'service' => $service,
        ]);
    }
}
