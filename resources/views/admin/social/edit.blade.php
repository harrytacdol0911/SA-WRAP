@extends('layouts.app')

@section('content')
<style>
    /* Mobile responsive styles */
    @media (max-width: 640px) {
        .edit-container {
            padding: 30px 16px !important;
        }
        .edit-card {
            padding: 20px !important;
        }
        .button-group {
            flex-direction: column !important;
            gap: 12px !important;
        }
        .button-group .btn-primary,
        .button-group .btn-outline {
            width: 100% !important;
            text-align: center !important;
            justify-content: center !important;
        }
        .form-group input {
            font-size: 16px !important; /* Prevents zoom on focus in iOS */
            padding: 14px 12px !important;
        }
        .form-group small {
            font-size: 11px !important;
        }
    }
</style>

<div style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Edit <em>{{ ucfirst($social->platform) }}</em> Link</h1>
</div>

<div class="edit-container" style="padding:40px 24px; max-width:600px; margin:auto">
    <div class="edit-card" style="background:#0f4a2a; border-radius:var(--radius); padding:30px; border:1px solid #2a5a3a">
        <form action="{{ route('admin.social.update', $social) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label style="color:var(--gold)">URL</label>
                @if($social->platform === 'email')
                    <input type="email" name="url" value="{{ str_replace('mailto:', '', $social->url) }}" placeholder="youremail@example.com" class="form-control" style="border-radius: 50px; padding:20px 10px; width:100%;" required>
                    <small style="color:#c8e6c9; display:block; margin-top:6px;">Enter just the email address (e.g., myemail@gmail.com)</small>
                @else
                    <input type="url" name="url" value="{{ $social->url }}" placeholder="https://..." class="form-control" style="border-radius: 50px; padding:20px 10px; width:100%;" required>
                @endif
            </div>
            <div class="button-group" style="display:flex; gap:12px; margin-top:24px">
                <button type="submit" class="btn-primary" style="box-shadow: none;">Update Link</button>
                <a href="{{ route('admin.social.index') }}" class="btn-outline" style="background:transparent; border:1px solid #2a5a3a; padding:12px 24px; border-radius:100px; text-decoration:none; color:#c8e6c9; text-align:center;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
