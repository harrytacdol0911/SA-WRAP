@extends('layouts.app')

@section('content')
<div style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Admin <em>Dashboard</em></h1>
    <p style="color:#c8e6c9">Welcome back, {{ Auth::user()->name }}!</p>
</div>

<div style="padding:40px 24px; max-width:1200px; margin:auto">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:28px; margin-bottom:48px">
        <a href="{{ route('admin.products.index') }}" class="admin-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none">
            <i class="fas fa-pizza-slice" style="font-size:3rem; color:var(--gold)"></i>
            <h3 style="color:var(--gold); margin-top:16px">Products</h3>
            <p style="color:#c8e6c9">Manage your menu items</p>
        </a>
        <a href="{{ route('admin.social.index') }}" class="admin-card" style="background:#0f4a2a; border-radius:var(--radius); padding:32px; text-align:center; border:1px solid #2a5a3a; transition:0.3s; text-decoration:none">
            <i class="fas fa-share-alt" style="font-size:3rem; color:var(--gold)"></i>
            <h3 style="color:var(--gold); margin-top:16px">Social Links</h3>
            <p style="color:#c8e6c9">Manage contact links</p>
        </a>
    </div>
</div>
@endsection
