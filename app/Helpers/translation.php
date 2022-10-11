<?php

use App\Models\Translation;

function translation($key) {
    $lang = app()->getLocale();
    $current_lang_item = isset(Translation::where('key', $key)->pluck('val')->toArray()[0][$lang]) ? Translation::where('key', $key)->pluck('val')->toArray()[0][$lang] : null;

    if(!$current_lang_item) {
        $current_lang_item = isset(Translation::where('key', $key)->pluck('val')->toArray()[0]['en']) ? Translation::where('key', $key)->pluck('val')->toArray()[0]['en'] : null;
    }

    return $current_lang_item;
}
