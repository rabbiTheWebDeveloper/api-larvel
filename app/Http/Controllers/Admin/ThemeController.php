<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Media;
use App\Models\Theme;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeController extends AdminBaseController
{
    use sendApiResponse;
    public function index()
    {
        return view('panel.themes.index');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'type' => ['required'],
            'name' => ['required'],
            'image' => ['required'],
        ]);

        $file = $request->file('image')->getClientOriginalName();
        $path = '/upload/themes';
        $image = $request->file('image')->storeAs($path, $file, 'local');

        $theme = Theme::query()->create([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
        ]);

        $preview_image = Media::query()->create([
            'name' => $path.'/'.$file,
            'parent_id' => $theme->id,
            'type' => 'template',
        ]);

        return $this->sendApiResponse($theme, 'Template Added successfully');
    }

    public function getThemes(): JsonResponse
    {
        $themes = Theme::all();
        $themes->load('media');
        return $this->sendApiResponse($themes);
    }
}
