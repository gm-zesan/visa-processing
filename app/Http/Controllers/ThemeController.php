<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:theme-list|theme-create|theme-edit|theme-delete|theme-active', ['only' => ['index']]);
        $this->middleware('permission:theme-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:theme-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:theme-delete', ['only' => ['delete']]);
        $this->middleware('permission:theme-active', ['only' => ['activate']]);
    }

    public function index()
    {
        $themes = Theme::orderByDesc('status')->orderBy('id')->get();
        $activeTheme = Theme::where('status', 1)->first() ?? $themes->first();
        return view('admin.themes.index', [
            'themes' => $themes,
            'activeTheme' => $activeTheme,
        ]);
    }

    public function create()
    {
        return view('admin.themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:themes,name',
            'primary_color' => ['required', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'secondary_color' => ['required', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'hover_color' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'light_color' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'nav_bg' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'footer_bg' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
        ], [
            'name.required' => 'The theme name is required.',
            'primary_color.required' => 'A primary brand color is required.',
        ]);

        $data = $request->except(['_token']);

        // Default missing color values
        $data['hover_color'] = $data['hover_color'] ?? $data['primary_color'];
        $data['light_color'] = $data['light_color'] ?? '#FBF6EA';
        $data['nav_bg'] = $data['nav_bg'] ?? '#FFFFFF';
        $data['footer_bg'] = $data['footer_bg'] ?? $data['secondary_color'];

        if ($request->has('set_active') && $request->set_active == '1') {
            Theme::where('status', 1)->update(['status' => 0]);
            $data['status'] = 1;
        } else {
            $data['status'] = Theme::where('status', 1)->exists() ? 0 : 1;
        }

        Theme::create($data);
        clearActiveThemeCache();

        return redirect()->route('theme')->with('success', 'New Theme Color Palette created successfully.');
    }

    public function edit($id)
    {
        $theme = Theme::findOrFail($id);
        return view('admin.themes.edit', [
            'theme' => $theme,
        ]);
    }

    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:themes,name,' . $id,
            'primary_color' => ['required', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'secondary_color' => ['required', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'hover_color' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'light_color' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'nav_bg' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
            'footer_bg' => ['nullable', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'],
        ]);

        $data = $request->except(['_token']);
        $data['hover_color'] = $data['hover_color'] ?? $data['primary_color'];
        $data['light_color'] = $data['light_color'] ?? '#FBF6EA';
        $data['nav_bg'] = $data['nav_bg'] ?? '#FFFFFF';
        $data['footer_bg'] = $data['footer_bg'] ?? $data['secondary_color'];

        if ($request->has('set_active') && $request->set_active == '1') {
            Theme::where('status', 1)->where('id', '!=', $id)->update(['status' => 0]);
            $data['status'] = 1;
        }

        $theme->update($data);
        clearActiveThemeCache();

        return redirect()->route('theme')->with('success', 'Theme Color Palette updated successfully.');
    }

    public function delete($id)
    {
        $theme = Theme::findOrFail($id);
        if ($theme->status == 1) {
            return redirect()->route('theme')->with('error', 'Cannot delete the active theme palette. Activate another theme first.');
        }

        $theme->delete();
        clearActiveThemeCache();

        return redirect()->route('theme')->with('success', 'Theme deleted successfully.');
    }

    public function activate($id)
    {
        Theme::where('status', 1)->update(['status' => 0]);
        $activateTheme = Theme::findOrFail($id);
        $activateTheme->status = 1;
        $activateTheme->save();

        clearActiveThemeCache();

        return redirect()->route('theme')->with('success', "Theme \"{$activateTheme->name}\" activated globally across the website!");
    }
}
