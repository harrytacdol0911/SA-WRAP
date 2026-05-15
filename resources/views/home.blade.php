@extends('layouts.app')

@section('content')
<style>
    /* Mobile responsiveness for dashboard */
    @media (max-width: 640px) {
        .dashboard-hero {
            padding: 40px 16px !important;
        }
        .dashboard-hero h1 {
            font-size: 28px !important;
        }
        .dashboard-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
            padding: 30px 16px !important;
        }
        .dashboard-card {
            padding: 24px !important;
        }
        .dashboard-card i {
            font-size: 2rem !important;
        }
        .dashboard-card h3 {
            font-size: 1.3rem !important;
        }
    }
</style>

<div class="dashboard-hero" style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Welcome back, <em>{{ Auth::user()->name }}</em>!</h1>
    <p style="color:#c8e6c9; margin-top:10px;">You are logged in to your Sa‑Wrap account.</p>
</div>

<div class="dashboard-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:28px; max-width:1000px; margin:0 auto; padding:40px 24px;">

    @auth
        @if(Auth::user()->is_admin)
            <!-- Admin: Products Management -->
            <a href="{{ route('admin.products.index') }}" class="dashboard-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none; display:block;">
                <i class="fas fa-pizza-slice" style="font-size:3rem; color:var(--gold); margin-bottom:16px; display:block;"></i>
                <h3 style="color:var(--gold); margin-bottom:8px;">Products</h3>
                <p style="color:#c8e6c9;">Manage your menu items</p>
            </a>

            <!-- Admin: Social Links Management -->
            <a href="{{ route('admin.social.index') }}" class="dashboard-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none; display:block;">
                <i class="fas fa-share-alt" style="font-size:3rem; color:var(--gold); margin-bottom:16px; display:block;"></i>
                <h3 style="color:var(--gold); margin-bottom:8px;">Social Links</h3>
                <p style="color:#c8e6c9;">Manage contact links</p>
            </a>
        @endif

        <!-- Common for all users: View Menu -->
        <a href="{{ route('menu') }}" class="dashboard-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none; display:block;">
            <i class="fas fa-utensils" style="font-size:3rem; color:var(--gold); margin-bottom:16px; display:block;"></i>
            <h3 style="color:var(--gold); margin-bottom:8px;">Browse Menu</h3>
            <p style="color:#c8e6c9;">Explore our delicious wraps</p>
        </a>

        <!-- Contact / Order -->
        <a href="{{ route('contact') }}" class="dashboard-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none; display:block;">
            <i class="fas fa-envelope" style="font-size:3rem; color:var(--gold); margin-bottom:16px; display:block;"></i>
            <h3 style="color:var(--gold); margin-bottom:8px;">Contact Us</h3>
            <p style="color:#c8e6c9;">Send a message or order</p>
        </a>
    @endauth
</div>

<!-- Optional: Recent activity or stats can be added later -->
@endsection
