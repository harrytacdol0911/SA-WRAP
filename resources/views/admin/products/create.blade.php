@extends('layouts.app')

@section('content')
<div style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Add New <em>Product</em></h1>
</div>

<div style="padding:40px 24px; max-width:800px; margin:auto">
    <div style="background:#0f4a2a; border-radius:var(--radius); padding:30px; border:1px solid #2a5a3a">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label style="color:var(--gold)">Product Name *</label>
                <input type="text" name="name" placeholder="e.g. Tocino Silog Wrap" class="form-control" required>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Description *</label>
                <textarea name="description" rows="4" placeholder="Describe the wrap..." class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Price (₱) *</label>
                <input type="number" name="price" step="0.01" placeholder="0.00" class="form-control" required>
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Badge (e.g., Best Seller, New, Fan Favourite)</label>
                <input type="text" name="badge" placeholder="Best Seller" class="form-control">
            </div>
            <div class="form-group">
                <label style="color:var(--gold)">Product Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small style="color:#c8e6c9; font-size:0.75rem">Recommended: 800x600px, JPEG/PNG</small>
            </div>
            <div style="display:flex; gap:12px; margin-top:24px">
                <button type="submit" class="btn-primary">Save Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn-outline" style="background:transparent; border:1px solid #2a5a3a; padding:12px 24px; border-radius:100px; text-decoration:none; color:#c8e6c9">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
