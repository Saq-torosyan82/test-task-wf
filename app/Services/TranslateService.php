<?php

namespace App\Services;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateService
{
    public function handle(Request $request): array
    {
        try {
            $text = GoogleTranslate::trans($request->text, $request->language, 'en');

            return ['success' => true, 'error' => '', 'translation' => $text];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage(), 'translation' => ''];
        }
    }
}
