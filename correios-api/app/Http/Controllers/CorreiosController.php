<?php

namespace App\Http\Controllers;

use App\Providers\CorreiosServiceProvider;
use Illuminate\Http\Request;

class CorreiosController extends Controller
{
    public function getCep(Request $request) {
        $correiosServices = new CorreiosServiceProvider();
        $cep = $request->input('cep');
        $token = $correiosServices->getToken();

        return response()->json(json_encode($token), 201);
    }
}
