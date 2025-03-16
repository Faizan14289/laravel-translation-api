<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TranslationUIController extends Controller
{
    public function index()
    {
        return Inertia::render('Translations', [
            'translations' => Translation::paginate(10)->items(), // Extracts only the array of translations
            'pagination' => [
                'current_page' => Translation::paginate(10)->currentPage(),
                'last_page' => Translation::paginate(10)->lastPage(),
                'per_page' => Translation::paginate(10)->perPage(),
                'total' => Translation::paginate(10)->total(),
            ]
        ]);
    }
}
