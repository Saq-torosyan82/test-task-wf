<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslateRequest;
use App\Services\TranslateService;

class Translator extends Controller
{
    /**
     * @param TranslateRequest $request
     * @param TranslateService $service
     * @return array
     */
    public function translate(TranslateRequest $request, TranslateService $service): array
    {
       return $service->handle($request);
    }
}
