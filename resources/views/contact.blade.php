{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="page-hero">
    <span class="eyebrow" style="background:var(--gold); color:#0f4a2a; display:inline-block; padding:5px 18px; border-radius:100px;">📬 Connect with Us</span>
    <h1 style="font-family:'Playfair Display',serif; color:#fff;">Find Us <em style="color:var(--gold)">Online & In Person</em></h1>
</div>

<div class="contact-body" style="padding:60px 24px; max-width:1200px; margin:auto">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert-success" style="background:#c62828;">{{ session('error') }}</div>
    @endif

    <!-- Social Links Grid -->
    <div class="social-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:20px; margin-bottom:48px">
        @foreach($socials as $social)
            @php
                $icon = match($social->platform) {
                    'facebook' => 'fab fa-facebook-f',
                    'instagram' => 'fab fa-instagram',
                    'tiktok' => 'fab fa-tiktok',
                    'email' => 'fas fa-envelope',
                    default => 'fas fa-link',
                };
                $color = match($social->platform) {
                    'facebook' => '#1877f2',
                    'instagram' => '#e4405f',
                    'tiktok' => '#010101',
                    default => 'var(--gold)',
                };
            @endphp
            <a href="{{ $social->url }}" target="_blank" class="social-card" style="display:flex; align-items:center; gap:16px; background:#0f4a2a; border-radius:16px; padding:16px 24px; text-decoration:none; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:all 0.3s ease; border:1px solid #2a5a3a;">
                <div class="s-icon" style="width:52px; height:52px; border-radius:14px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:#fff; background:{{ $color }}; flex-shrink:0;">
                    <i class="{{ $icon }}"></i>
                </div>
                <div style="flex:1">
                    <div style="font-size:0.7rem; color:var(--gold); text-transform:uppercase; letter-spacing:1px;">{{ ucfirst($social->platform) }}</div>
                    <div style="font-weight:800; color:#c8e6c9; font-size:0.95rem; word-break:break-all;">{{ str_replace(['https://', 'mailto:'], '', $social->url) }}</div>
                </div>
                <i class="fas fa-arrow-right" style="color:var(--gold); opacity:0.6; transition:0.3s;"></i>
            </a>
        @endforeach
    </div>

    <!-- Google Map -->
    <div class="map-container" style="margin-bottom: 48px; border-radius: var(--radius); overflow: hidden; border: 1px solid #2a5a3a; box-shadow: 0 8px 20px rgba(0,0,0,0.1);">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30898.477559381874!2d120.9402211904389!3d14.329571297416362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d8585d3a5dd9%3A0x4e2c8a6f8e5a4a1f!2sDasmari%C3%B1as%2C%20Cavite!5e0!3m2!1sen!2sph!4v1715678901234!5m2!1sen!2sph"
            width="100%"
            height="350"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div style="background: #0f4a2a; padding: 12px; text-align: center; border-top: 1px solid #2a5a3a;">
            <p style="color: var(--gold); font-weight: bold;"><i class="fas fa-map-marker-alt"></i> Km.30 Brgy, R-2 Dasmariñas, Cavite, Philippines</p>
        </div>
    </div>

    <!-- Contact Form -->
    <div style="background:#0f4a2a; border-radius:var(--radius); padding:40px; box-shadow:0 6px 28px rgba(0,0,0,0.08); border:1px solid #2a5a3a">
        <h3 style="font-family:'Playfair Display',serif; font-size:1.4rem; color:var(--gold); margin-bottom:24px">Send us a message</h3>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label style="color:var(--gold)">Your Name *</label>
                <input type="text" name="name" placeholder="e.g. Juan Dela Cruz" required>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Email Address *</label>
                <input type="email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Phone Number</label>
                <input type="tel" name="phone" placeholder="0912 345 6789" required>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Your Message *</label>
                <textarea name="message" rows="5" placeholder="How can we help you?"></textarea>
            </div>
            <button type="submit" class="btn-primary" style="width:100%; justify-content:center;"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
        </form>
    </div>
</div>

<style>
    body { background: #2a5a3a; }
    .social-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
        border-color: var(--gold);
    }
    .social-card:hover i.fa-arrow-right {
        opacity: 1;
        transform: translateX(4px);
    }
    @media (max-width: 550px) {
        .social-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection
