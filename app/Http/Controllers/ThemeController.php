<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function get_themes()
    {
        // Get subscribed themes
        $subed_themes = Auth::user()->themes;
        
        // Get other available themes (not subscribed)
        $other_themes = Theme::whereNotIn('id', $subed_themes->pluck('id'))->get();

        return view('subscriber.themes', [
            'subed_themes' => $subed_themes,
            'other_themes' => $other_themes,
            'themes' => Theme::all()
        ]);
    }
} 