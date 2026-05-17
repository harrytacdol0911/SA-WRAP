@extends('layouts.app')

@section('content')
<div class="page-hero" style="background: linear-gradient(135deg, #0f4a2a, #0a3a1e); margin: 0; border-radius: 0;">
    <span class="eyebrow" style="background:var(--gold); color:#0f4a2a; display:inline-block; padding:5px 18px; border-radius:100px; font-weight:bold; margin-bottom:15px;">Not Just a Wrap, It's SaWrap!</span>
    <h1 style="font-family:'Playfair Display',serif; color:#fff;">Born from a Love of <em style="color:var(--gold)">Filipino Breakfast</em></h1>
</div>

<section style="background: #0f4a2a; padding: 70px 24px; width: 100%; margin: 0; border-radius: 0;">
    <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center;">
        <div style="overflow: hidden; aspect-ratio: 4/3; box-shadow: 0 16px 48px rgba(0,0,0,0.3); border: 1px solid #2a5a3a; border-radius: 16px;">
            <img src="{{ asset('logo.jpg') }}" alt="Sa-Wrap Story" style="width:100%; height:100%; object-fit:cover">
        </div>
        <div class="belowreveal">
            <span class="sec-eyebrow" style="background:linear-gradient(90deg,var(--gold),var(--gold-d)); color:#0f4a2a; display:inline-block; padding:5px 16px; border-radius:100px; font-weight:bold;">How It Started</span>
            <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.7rem,3vw,2.4rem); color: var(--gold);">A <em style="color: #fff;">Filipino </em> Breakfast On-the-go!</h2>
            <p style="color: #c8e6c9; margin-top:14px; line-height:1.8">SaWrap is a student-operated food business established in 2026. <em>The business offers a unique and convenient breakfast-on-the-go product that combines traditional Filipino flavors in a modern wrap format.</em> Using a soft pancake as the base, each wrap is filled with egg fried rice, cheese sauce, and a choice of Filipino dishes, creating a satisfying and portable meal ideal for busy individuals.</p>
            <!-- <p style="margin-top:12px; color: #c8e6c9;">Seeing this common problem inspired the creation of Sa-Wrap, a convenient breakfast-on-the-go meal that is affordable, filling, and enjoyable. By combining creative flavors with quality ingredients, Sa-Wrap was built to provide a quick breakfast option without sacrificing taste or nutrition.</p> -->
            <!-- <p style="margin-top:12px; color: #c8e6c9;">From a simple idea inside a school campus, Sa-Wrap continues to grow with the vision of expanding its menu and bringing convenient breakfast options to more communities in the future.</p> -->


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
