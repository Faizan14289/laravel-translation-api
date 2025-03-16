<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

/**
 * @OA\Post(
 *     path="/api/translations",
 *     summary="Create a new translation",
 *     tags={"Translations"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"locale","key","content"},
 *             @OA\Property(property="locale", type="string", example="en"),
 *             @OA\Property(property="key", type="string", example="greeting"),
 *             @OA\Property(property="content", type="string", example="Hello"),
 *             @OA\Property(property="tags", type="array", @OA\Items(type="string"))
 *         )
 *     ),
 *     @OA\Response(response=201, description="Translation created"),
 *     @OA\Response(response=400, description="Validation error"),
 *     security={{"bearerAuth":{}}}
 * )
 */

class TranslationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'locale' => 'required|string|max:5',
            'key' => 'required|string',
            'content' => 'required|string',
            'tags' => 'array',
        ]);
        return Translation::create($request->all());
    }

    public function update(Request $request, Translation $translation)
    {
        $translation->update($request->all());
        return response()->json($translation);
    }

    public function index(Request $request)
    {
        return Cache::remember('translations', 60, function () use ($request) {
            return Translation::query()
                ->when($request->key, fn($q) => $q->where('key', 'like', "%{$request->key}%"))
                ->when($request->locale, fn($q) => $q->where('locale', $request->locale))
                ->when($request->tags, fn($q) => $q->whereJsonContains('tags', $request->tags))
                ->paginate(10);
        });
    }

    public function export()
    {
        return Cache::remember('translations_json', 60, fn() => Translation::all());
    }
}
