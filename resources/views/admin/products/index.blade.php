@extends('layouts.app')

@section('content')
<div style="background:linear-gradient(135deg,#1b5c38,#0f4a2a); padding:60px 24px; text-align:center">
    <h1 style="font-family:'Playfair Display',serif; color:var(--gold);">Manage <em>Products</em></h1>
    <a href="{{ route('admin.products.create') }}" class="btn-primary" style="margin-top:16px; display:inline-flex">
        <i class="fas fa-plus"></i> Add New Product
    </a>
</div>

<div style="padding:40px 24px; max-width:1200px; margin:auto">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:28px">
        @forelse($products as $product)
        <div class="card" style="background:#0f4a2a; border-radius:var(--radius); overflow:hidden; border:1px solid #2a5a3a; box-shadow:0 4px 20px rgba(0,0,0,0.08)">
            <div class="card-img" style="height:200px; background:#e8f5e9; display:flex; align-items:center; justify-content:center">
                @if($product->image && Storage::disk('public')->exists($product->image))
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width:100%; height:100%; object-fit:cover">
                @else
                    <i class="fas fa-utensils" style="font-size:4rem; color:#0f4a2a"></i>
                @endif
                @if($product->badge)
                    <span class="badge">{{ $product->badge }}</span>
                @endif
            </div>
            <div style="padding:20px">
                <h3 style="color:var(--gold); font-size:1.3rem">{{ $product->name }}</h3>
                <p style="color:#c8e6c9; margin:8px 0; font-size:0.9rem; line-height:1.5">{{ Str::limit($product->description, 80) }}</p>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-top:16px">
                    <span class="price" style="font-size:1.5rem; color:var(--gold)">₱{{ number_format($product->price, 2) }}</span>
                    <div style="display:flex; gap:8px">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn-edit" style="background:#2a5a3a; color:var(--gold); padding:8px 16px; border-radius:100px; text-decoration:none; font-weight:bold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" style="background:#2a5a3a; color:#ff6b6b; border:none; padding:8px 16px; border-radius:100px; cursor:pointer; font-weight:bold">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:60px; background:#0f4a2a; border-radius:var(--radius); border:1px solid #2a5a3a">
            <i class="fas fa-box-open" style="font-size:4rem; color:var(--gold)"></i>
            <p style="margin-top:16px; color:#c8e6c9">No products yet. Click "Add New Product" to get started.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
