<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    public function index()
    {
        $socials = SocialLink::all();
        return view('admin.social.index', compact('socials'));
    }

    public function edit(SocialLink $social)
    {
        return view('admin.social.edit', compact('social'));
    }

    public function update(Request $request, SocialLink $social)
    {
        $validated = $request->validate([
            'url' => 'required|string|max:255', // Changed from 'url' validation to allow mailto:
        ]);

        // If this is an email platform, ensure it starts with mailto:
        if ($social->platform === 'email' && !str_starts_with($validated['url'], 'mailto:')) {
            $validated['url'] = 'mailto:' . $validated['url'];
        }

        $social->update($validated);

        return redirect()->route('admin.social.index')->with('success', 'Social link updated successfully.');
    }
}
