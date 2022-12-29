<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TranslateService;

class Translator extends Controller
{
    public function translate(Request $request, TranslateService $service)
    {
        return $service->handle($request);
    }
}
