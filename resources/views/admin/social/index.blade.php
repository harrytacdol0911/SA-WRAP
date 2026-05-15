@extends('layouts.app')

@section('content')
<style>
    /* Mobile responsive styles */
    @media (max-width: 640px) {
        .social-index-container {
            padding: 30px 16px !important;
        }
        .social-list-card {
            padding: 20px !important;
        }
        .social-item {
            margin-bottom: 28px !important;
            padding-bottom: 20px !important;
        }
        .social-item form {
            flex-direction: column !important;
            gap: 12px !important;
        }
        .social-item input {
            width: 100% !important;
            min-width: auto !important;
            font-size: 16px !important;
            padding: 14px 12px !important;
        }
        .social-item button {
            width: 100% !important;
            justify-content: center !important;
        }
        .alert-success {
            font-size: 13px !important;
            padding: 10px 16px !important;
        }
        .page-header {
            padding: 40px 16px !important;
        }
        .page-header h1 {
            font-size: 28px !important;
        }
        .page-header p {
            font-size: 13px !important;
        }
    }
</style>

<div class="page-header" style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Manage <em>Social Links</em></h1>
    <p style="color:#c8e6c9; margin-top:10px;">For Email, enter just the address (e.g., myemail@gmail.com) - it will be saved as mailto:myemail@gmail.com</p>
</div>

<div class="social-index-container" style="padding:40px 24px; max-width:800px; margin:auto">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="social-list-card" style="background:#0f4a2a; border-radius:var(--radius); padding:30px; border:1px solid #2a5a3a">
        @foreach($socials as $social)
        <div class="social-item" style="margin-bottom:30px; padding-bottom:20px; border-bottom:1px solid #2a5a3a">
            <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px">
                <div style="width:40px; height:40px; border-radius:10px; background:var(--gold); display:flex; align-items:center; justify-content:center; color:#0f4a2a">
                    <i class="{{ $social->getIconClass($social->platform) }}"></i>
                </div>
                <h3 style="color:var(--gold); text-transform:capitalize; margin:0;">{{ $social->platform }}</h3>
            </div>
            <form action="{{ route('admin.social.update', $social) }}" method="POST" style="display:flex; gap:12px; flex-wrap:wrap">
                @csrf @method('PUT')
                @if($social->platform === 'email')
                    <input type="email" name="url" value="{{ str_replace('mailto:', '', $social->url) }}" placeholder="your@email.com" class="form-control" style="flex:1; min-width:200px; background:#fff; color:#1a2e1f; border:1px solid #c8e6c9; border-radius: 50px; padding:20px 10px;" required>
                @else
                    <input type="url" name="url" value="{{ $social->url }}" placeholder="https://..." class="form-control" style="flex:1; min-width:200px; background:#fff; color:#1a2e1f; border:1px solid #c8e6c9; border-radius: 50px; padding:20px 10px" required>
                @endif
                <button type="submit" class="btn-primary" style="box-shadow: none; padding:10px 24px">Update</button>
            </form>
            @if($social->platform === 'email')
                <small style="color:#c8e6c9; display:block; margin-top:8px;">Current email: {{ str_replace('mailto:', '', $social->url) }}</small>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
