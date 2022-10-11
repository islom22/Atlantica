<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use App\Models\Lang;

class TranslationController extends Controller
{
    public function index() {
      $langs = Lang::all();
      $translations = Translation::orderBy('id', 'desc')->paginate(10);

      return view('app.translations.index', [
        'translations' => $translations,
        'langs' => $langs
      ]);
    }

    public function create() {
      $languages = Lang::all();
      return view('app.translations.create',compact('languages'));
    }

    public function store(Request $request) {
      $request->validate([
        'key' => 'required|max:255',
        'val' => 'required|max:255',
      ]);

      $translation = new Translation;

      $translation->key = $request->key;
      $translation->val = $request->val;

    $translation->save();

      return redirect()->route('translations.index')->with(['message' => 'Successfully added!']);
    }

    public function edit($id) {
      $languages = Lang::all();
      $translation = Translation::find($id);
      return view('app.translations.edit', [
        'translation' => $translation,
        'languages' => $languages,
      ]);
    }

    public function update(Request $request, $id) {
      $request->validate([
        'key' => 'required|max:255',
        'val' => 'required|max:255',
      ]);

      $translation = Translation::find($id);

      $translation->key = $request->key;
      $translation->val = $request->val;

      $translation->save();

      return redirect()->route('translations.index')->with(['message' => 'Successfully added!']);
    }

    public function destroy($id) {
      Translation::find($id)->delete();
      return redirect()->route('translations.index')->with(['message' => 'Successfully deleted!']);
    }

    public function search(Request $request) {

        $langs = Lang::all();
        $a = Translation::all();
        $cc = mb_strtolower($request->search);
        foreach ($a as $item) {
            $c['ru'] = mb_strtolower($item->val['ru']);
            $item->val = $c;
        }
        $result = collect($a)->filter(function ($item) use ($cc) {
            return false !== stripos($item->val['ru'], $cc);
        });

        foreach ($langs as $lang) {
            $value = 'val->'.$lang->small;
            if ($lang->small != 'ru') $result = $result->merge(Translation::where($value, 'like', '%'.$request->search.'%')->get());
        }

        $search_word = $request->search;

        return view('app.translations.search', compact([
            'result',
            'search_word',
            'langs'
        ]));
    }

    public function show($id) {

    }
}
