{{-- resources/views/front/menu.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="page-hero">
    <span class="eyebrow" style="background:var(--gold); color:#0f4a2a; display:inline-block; padding:5px 18px; border-radius:100px;">🌯 Our Menu</span>
    <h1 style="font-family:'Playfair Display',serif; color:#fff;">Pinoy Flavours, <em style="color:var(--gold)">Wrapped</em> with Love</h1>

    <!-- Elegant Filter Bar - INSIDE the hero -->
    <div class="filter-card" style="max-width: 800px; margin: 32px auto 0 auto; background: rgba(15, 74, 42, 0.85); backdrop-filter: blur(8px); border-radius: 60px; padding: 8px 12px; border: 1px solid rgba(245,197,24,0.4); box-shadow: 0 8px 20px rgba(0,0,0,0.2);">
        <div class="filter-inner" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 12px;">
            <!-- Search Box with Icon -->
            <div class="search-wrapper" style="flex: 2; min-width: 200px; position: relative;">
                <i class="fas fa-search" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #0f4a2a; font-size: 1rem; pointer-events: none;"></i>
                <input type="text" id="searchInput" placeholder="Search by name or ingredients..." style="width: 100%; padding: 12px 20px 12px 48px; border-radius: 40px; border: none; background: #fff; color: #1a2e1f; font-size: 0.95rem; outline: none; transition: all 0.2s;">
            </div>

            <!-- Sort Dropdown with Icon -->
            <div class="sort-wrapper" style="flex: 1; min-width: 170px; position: relative;">
                <i class="fas fa-sort-amount-down-alt" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #0f4a2a; font-size: 0.9rem; pointer-events: none; z-index: 1;"></i>
                <select id="sortSelect" style="width: 100%; padding: 12px 20px 12px 44px; border-radius: 40px; border: none; background: var(--gold); color: #0f4a2a; font-weight: 700; font-size: 0.85rem; cursor: pointer; appearance: none; outline: none;">
                    <option value="latest">✨ Latest</option>
                    <option value="price_asc">💰 Price: Low → High</option>
                    <option value="price_desc">💰 Price: High → Low</option>
                    <option value="name_asc">🔤 Name: A → Z</option>
                    <option value="name_desc">🔤 Name: Z → A</option>
                </select>
                <div style="position: absolute; right: 18px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #0f4a2a;">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-page-body" style="padding:60px 24px; max-width:1200px; margin:auto">
    <div class="menu-grid" id="menuGrid">
        @foreach($products as $product)
        <div class="card reveal" data-name="{{ strtolower($product->name) }}" data-desc="{{ strtolower($product->description) }}" data-price="{{ $product->price }}" data-sort-name="{{ $product->name }}" data-sort-date="{{ $product->created_at }}">
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
                <div class="card-footer" style="display:flex; justify-content:space-between; align-items:center; margin-top:18px; padding-top:16px; border-top:1px solid #2a5a3a">
                    <div class="price">₱{{ number_format($product->price, 2) }}<sub style="font-size:0.8rem; color:#c8e6c9"> / wrap</sub></div>
                    <a href="{{ route('contact') }}" class="order-btn">Order Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    @media (max-width: 640px) {
        .filter-card {
            margin: 20px 16px 0 16px !important;
            padding: 12px !important;
            border-radius: 32px !important;
        }
        .filter-inner {
            flex-direction: column;
            width: 100%;
        }
        .search-wrapper, .sort-wrapper {
            width: 100%;
        }
        .search-wrapper input, .sort-wrapper select {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 0.85rem;
        }
        .menu-grid {
            gap: 20px;
        }
        .order-btn i {
            display: none;
        }
        .order-btn {
            padding: 8px 16px;
            font-size: 0.75rem;
        }
    }

    .search-wrapper input:focus {
        box-shadow: 0 0 0 2px var(--gold);
    }
    .order-btn:hover i {
        transform: translateX(4px);
        transition: transform 0.2s;
    }
    .order-btn i {
        transition: transform 0.2s;
    }
    .sort-wrapper select:hover {
        background: #e5b812;
    }
</style>

<script>
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sortSelect');
    const menuGrid = document.getElementById('menuGrid');
    let productsArray = Array.from(document.querySelectorAll('#menuGrid .card'));

    function filterAndSort() {
        let searchTerm = searchInput.value.toLowerCase();
        let filtered = productsArray.filter(card => {
            let name = card.getAttribute('data-name') || '';
            let desc = card.getAttribute('data-desc') || '';
            return name.includes(searchTerm) || desc.includes(searchTerm);
        });

        let sortValue = sortSelect.value;
        filtered.sort((a, b) => {
            let aPrice = parseFloat(a.getAttribute('data-price'));
            let bPrice = parseFloat(b.getAttribute('data-price'));
            let aName = a.getAttribute('data-sort-name') || '';
            let bName = b.getAttribute('data-sort-name') || '';
            let aDate = a.getAttribute('data-sort-date') || '';
            let bDate = b.getAttribute('data-sort-date') || '';

            switch(sortValue) {
                case 'price_asc': return aPrice - bPrice;
                case 'price_desc': return bPrice - aPrice;
                case 'name_asc': return aName.localeCompare(bName);
                case 'name_desc': return bName.localeCompare(aName);
                default: return new Date(bDate) - new Date(aDate);
            }
        });

        menuGrid.innerHTML = '';
        filtered.forEach(card => menuGrid.appendChild(card));
    }

    searchInput.addEventListener('input', filterAndSort);
    sortSelect.addEventListener('change', filterAndSort);
</script>
@endsection
