<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SocialLink;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(3)->get();
        return view('front.home', compact('products'));
    }

    public function menu(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('ingredients', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%");
            });
        }

        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc': $query->orderBy('price', 'asc'); break;
            case 'price_desc': $query->orderBy('price', 'desc'); break;
            case 'name_asc': $query->orderBy('name', 'asc'); break;
            case 'name_desc': $query->orderBy('name', 'desc'); break;
            default: $query->latest();
        }

        $products = $query->get();
        return view('front.menu', compact('products'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        $socials = SocialLink::all();
        return view('contact', compact('socials'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Get email from social_links
        $emailLink = SocialLink::where('platform', 'email')->first();

        if (!$emailLink || empty($emailLink->url)) {
            return back()->with('error', 'Contact email not configured. Please contact administrator.');
        }

        // Extract email from mailto: prefix if present
        $recipientEmail = preg_replace('/^mailto:/i', '', $emailLink->url);

        // Validate it's a real email
        if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error', 'Invalid email format in settings. Please contact administrator.');
        }

        try {
            Mail::to($recipientEmail)->send(new ContactFormMail($validated));
            return back()->with('success', 'Thank you! We will get back to you soon.');
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    }
}
