<?php

namespace App\Services;

use App\Http\Requests\TranslateRequest;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateService
{
    /**
     * @param TranslateRequest $request
     * @return array
     */
    public function handle(TranslateRequest $request): array
    {
        try {
            $text = GoogleTranslate::trans($request->text, $request->language, 'en');

            return ['success' => true, 'error' => '', 'translation' => $text];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage(), 'translation' => ''];
        }
    }
}
