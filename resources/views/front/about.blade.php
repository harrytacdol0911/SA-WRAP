@extends('layouts.app')

@section('content')
<div class="page-hero" style="background: linear-gradient(135deg, #0f4a2a, #0a3a1e); margin: 0; border-radius: 0;">
    <span class="eyebrow" style="background:var(--gold); color:#0f4a2a; display:inline-block; padding:5px 18px; border-radius:100px;">Our Story</span>
    <h1 style="font-family:'Playfair Display',serif; color:#fff;">Born from a Love of <em style="color:var(--gold)">Filipino Breakfast</em></h1>
</div>

<section style="background: #0f4a2a; padding: 70px 24px; width: 100%; margin: 0; border-radius: 0;">
    <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center;">
        <div style="overflow: hidden; aspect-ratio: 4/3; box-shadow: 0 16px 48px rgba(0,0,0,0.3); border: 1px solid #2a5a3a; border-radius: 16px;">
            <img src="{{ asset('logo.jpg') }}" alt="Sa-Wrap Story" style="width:100%; height:100%; object-fit:cover">
        </div>
        <div class="belowreveal">
            <span class="sec-eyebrow" style="background:linear-gradient(90deg,var(--gold),var(--gold-d)); color:#0f4a2a; display:inline-block; padding:5px 16px; border-radius:100px;">How It Started</span>
            <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.7rem,3vw,2.4rem); color: var(--gold);">A <em style="color: #fff;">Masarap</em> Idea Wrapped in Tradition</h2>
            <p style="color: #c8e6c9; margin-top:14px; line-height:1.8">Sa-Wrap was born from a simple question: <em>"What if our favourite Filipino breakfast could travel with us?"</em> We took the beloved silog experience — the sizzling tocino, the crispy bangus, the fragrant longganisa — and wrapped it all up in a fresh, herb-infused green tortilla.</p>
            <p style="margin-top:12px; color: #c8e6c9;">From our humble beginning as a home-based kitchen, we've grown into a community favourite — serving warm, hearty wraps to students, workers, and families who want a taste of home, even on the busiest mornings.</p>
        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        section > div {
            grid-template-columns: 1fr !important;
            gap: 32px !important;
        }
        .belowreveal {
            order: 2;
        }
    }
</style>
@endsection
