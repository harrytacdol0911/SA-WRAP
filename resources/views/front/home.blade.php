@extends('layouts.app')

@section('content')
<section class="hero">
    <img src="{{ asset('logo.jpg') }}" alt="Sa-Wrap Logo" class="hero-logo">
    <span class="hero-tag">🇵🇭 &nbsp;A Pinoy Breakfast On-the-go!</span>
    <h1>Not Just a Wrap,<br/>It's <em>SaWrap!</em></h1>
    <p class="hero-description" style="font-size: 20px;">Sa-Wrap offers quick, convenient, and affordable breakfast wraps made for <br> busy mornings, easy to carry, filling, and ready whenever you need <em>a meal on the go.</em>.</p>
    <div class="hero-btns">
        <a href="{{ route('menu') }}" class="btn-primary"><i class="fa-solid fa-bowl-rice"></i> Explore Menu</a>
        <a href="{{ route('about') }}" class="btn-outline"><i class="fa-solid fa-leaf"></i> Our Story</a>
    </div>
</section>

<section class="features" style="padding:80px 24px; background:var(--cream)">
    <div class="features-grid">
        <div class="feat-card reveal" style="text-align:center; padding:36px 24px; border-radius:var(--radius); box-shadow:0 4px 20px rgba(0,0,0,0.08)">
            <div class="feat-icon" style="font-size:2.4rem">🥞</div>
            <h3 style="font-family:'Playfair Display',serif; color:var(--gold)">Kangkong Pancake Wrap</h3>
            <p style="color:#c8e6c9">Our signature soft pancake wrap is infused with fresh kangkong leaves, creating a unique, flavorful, and wholesome twist to your breakfast on the go.</p>
        </div>
        <div class="feat-card reveal" style="text-align:center; padding:36px 24px; border-radius:var(--radius); box-shadow:0 4px 20px rgba(0,0,0,0.08)">
            <div class="feat-icon" style="font-size:2.4rem">🍚</div>
            <h3 style="font-family:'Playfair Display',serif; color:var(--gold)">Steamed Filipino Rice</h3>
            <p style="color:#c8e6c9">Fluffy, perfectly-cooked sinangag-style rice packed into every wrap.</p>
        </div>
        <div class="feat-card reveal" style="text-align:center; padding:36px 24px; border-radius:var(--radius); box-shadow:0 4px 20px rgba(0,0,0,0.08)">
            <div class="feat-icon" style="font-size:2.4rem">⚡</div>
            <h3 style="font-family:'Playfair Display',serif; color:var(--gold)">Quick & On-the-Go</h3>
            <p style="color:#c8e6c9">Classic Filipino breakfast flavours ready to enjoy anywhere, anytime.</p>
        </div>
    </div>
</section>

<section class="home-menu-preview" style="padding:80px 24px; background:var(--cream)">
    <div class="sec-header reveal" style="margin-bottom:40px; text-align:center">
        <span class="eyebrow" style="background:var(--gold); color:#0f4a2a; display:inline-block; padding:5px 18px; border-radius:100px;">🌯 Taste the Wrap</span>
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.9rem,4vw,2.8rem); color:#0f4a2a;">Our Bestselling Flavours</h2>
        <div class="divider" style="width:56px; height:4px; background:var(--gold); margin:12px auto 0;"></div>
    </div>
    <div class="preview-grid">
        @foreach($products as $product)
        <div class="card reveal">
            <div class="card-img">
                @if($product->image && Storage::disk('public')->exists($product->image))
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                @else
                    <div class="no-img" style="display:flex; align-items:center; justify-content:center; height:100%; background:#e8f5e9">
                        <i class="fas fa-utensils" style="font-size:3rem; color:#0f4a2a"></i>
                    </div>
                @endif
                @if($product->badge)<span class="badge">{{ $product->badge }}</span>@endif
            </div>
            <div class="card-body">
                <h3>{{ $product->name }}</h3>
                <p class="desc">{{ $product->description }}</p>
                <div class="card-footer" style="display:flex; justify-content:space-between; margin-top:18px; padding-top:16px; border-top:1px solid #2a5a3a">
                    <div class="price">₱{{ number_format($product->price, 2) }}<sub style="font-size:0.9rem; color:#c8e6c9"> / wrap</sub></div>
                    <a href="{{ route('contact') }}" class="order-btn">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="text-align:center; margin-top:24px">
        <a href="{{ route('menu') }}" class="btn-primary"><i class="fa-solid fa-utensils"></i> View Full Menu</a>
    </div>
</section>

<style>
    /* Hero paragraph text color fix */
    .hero-description {
        color: #ffffff !important;
        text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        font-weight: 500;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Mobile button spacing and no text wrap */
    @media (max-width: 768px) {
        .hero-btns {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .hero-btns .btn-primary,
        .hero-btns .btn-outline {
            width: auto;           /* Let buttons size to content */
            min-width: 200px;     /* Ensure enough width for one line */
            justify-content: center;
            text-align: center;
            white-space: nowrap;  /* Force text to stay on one line */
            font-size: 0.9rem;    /* Slightly smaller on mobile but still readable */

        }
        .hero {
            padding-bottom: 30px;
        }
    }
</style>
@endsection
