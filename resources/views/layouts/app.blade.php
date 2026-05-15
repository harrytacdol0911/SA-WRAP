<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sa-Wrap – A Pinoy Breakfast Wrap</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Nunito:wght@400;600;700;800;900&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --gd: #0f4a2a;
            --gd-light: #1a5f38;
            --gold: #f5c518;
            --gold-d: #d4a812;
            --cream: #fdf6e3;
            --td: #1a2e1f;
            --tm: #2d4a3a;
            --sh: rgba(0,0,0,0.1);
            --radius: 20px;
            --card-bg: #0f4a2a;
            --border-light: #c8e6c9;
            --input-bg: #ffffff;
        }
        body { font-family: 'Nunito', sans-serif; background: var(--cream); color: var(--td); overflow-x: hidden; }
        nav {
            position: fixed; top: 0; left: 0; width: 100%; z-index: 999;
            background: #093b1f;
            backdrop-filter: blur(14px);
            display: flex; align-items: center; justify-content: space-between;
            padding: 10px 40px; box-shadow: 0 2px 20px var(--sh);
            transition: padding 0.3s;
        }
        nav.scrolled { padding: 8px 40px; }
        .nav-logo { display: flex; align-items: center; gap: 11px; text-decoration: none; }
        .nav-logo img { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; border: 2px solid var(--gold); transition: transform 0.3s; }
        .nav-logo:hover img { transform: rotate(-5deg) scale(1.08); }
        .nav-logo span { font-family: 'Dancing Script', cursive; font-size: 1.55rem; color: var(--gold); }
        .nav-links {
            display: flex; gap: 6px; list-style: none; margin: 0; padding: 0;
            align-items: center;
        }
        .nav-links li { display: inline-block; }
        .nav-links a, .nav-links button {
            color: #c8e6c9; text-decoration: none; font-weight: 700; font-size: 0.82rem;
            letter-spacing: 0.8px; text-transform: uppercase; padding: 8px 14px;
            border-radius: 100px; transition: all 0.22s; background: none; border: none;
            cursor: pointer; font-family: inherit;
            display: inline-flex; align-items: center; gap: 6px;
            line-height: normal;
        }
        .nav-links form {
            display: inline-block;
            margin: 0;
            line-height: 0;
        }
        .nav-links li:last-child {
            display: flex;
            align-items: center;
        }
        .nav-links a:hover, .nav-links button:hover, .nav-links a.active {
            background: rgba(245, 197, 24, 0.15); color: var(--gold);
        }
        .hamburger {
            display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; z-index: 1000;
        }
        .hamburger span {
            display: block; width: 22px; height: 2px; background: var(--gold); border-radius: 2px;
            transition: all 0.3s ease;
        }
        main { min-height: 80vh; padding-top: 70px; }
        .hero {
            min-height: 90vh;
            background: linear-gradient(135deg, #1b5c38 0%, #0f4a2a 45%, #0a3a1e 100%);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; padding: 120px 24px 80px; position: relative;
        }
        .hero-logo { width: clamp(130px, 20vw, 190px); height: clamp(130px, 20vw, 190px); border-radius: 50%; object-fit: cover; border: 4px solid var(--gold); box-shadow: 0 0 0 10px rgba(245, 197, 24, 0.18), 0 20px 60px rgba(0,0,0,0.4); animation: floatLogo 4s ease-in-out infinite; }
        @keyframes floatLogo { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
        .hero-tag { margin-top: 24px; background: linear-gradient(90deg, var(--gold), var(--gold-d)); color: #0f4a2a; font-weight: 800; font-size: 0.76rem; letter-spacing: 2.5px; text-transform: uppercase; padding: 6px 20px; border-radius: 100px; display: inline-block; }
        .hero h1 { margin-top: 16px; font-family: 'Playfair Display', serif; font-size: clamp(2.2rem, 5.5vw, 4rem); font-weight: 900; color: #fff; line-height: 1.1; }
        .hero h1 em { color: var(--gold); font-style: italic; }
        .btn-primary { display: inline-flex; align-items: center; gap: 9px; background: var(--gold); color: #0f4a2a; font-weight: 800; font-size: 0.95rem; padding: 13px 32px; border-radius: 100px; text-decoration: none; border: none; cursor: pointer; box-shadow: 0 8px 28px rgba(245, 197, 24, 0.45); transition: transform 0.25s, box-shadow 0.25s; }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(245, 197, 24, 0.55); }
        .btn-outline { display: inline-flex; align-items: center; gap: 9px; background: transparent; color: #fff; font-weight: 800; font-size: 0.95rem; padding: 12px 30px; border-radius: 100px; border: 2px solid rgba(255,255,255,0.35); cursor: pointer; transition: all 0.25s; text-decoration: none; }
        .btn-outline:hover { border-color: var(--gold); color: var(--gold); }
        .features-grid, .menu-grid, .preview-grid, .values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 28px; max-width: 1060px; margin: 0 auto; }
        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: 0 6px 28px rgba(0,0,0,0.15);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #2a5a3a;
        }
        .card:hover { transform: translateY(-8px); box-shadow: 0 18px 48px rgba(0,0,0,0.2); }
        .card-img { position: relative; height: 220px; background: #e8f5e9; overflow: hidden; }
        .card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .card:hover .card-img img { transform: scale(1.07); }
        .badge { position: absolute; top: 12px; left: 12px; background: var(--gold); color: #0f4a2a; font-weight: 800; font-size: 0.68rem; letter-spacing: 1.5px; text-transform: uppercase; padding: 5px 14px; border-radius: 100px; }
        .card-body { padding: 22px 24px 26px; }
        .card-body h3 { font-family: 'Playfair Display', serif; font-size: 1.38rem; font-weight: 700; color: var(--gold); }
        .card-body .desc { color: #c8e6c9; margin-top: 7px; line-height: 1.6; }
        .price { font-size: 1.7rem; font-weight: 900; color: var(--gold); }
        .order-btn { background: var(--gold); color: #0f4a2a; border: none; cursor: pointer; font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.82rem; padding: 9px 18px; border-radius: 100px; transition: all 0.22s; display: inline-block; text-decoration: none; text-align: center; }
        .order-btn:hover { background: var(--gold-d); transform: scale(1.05); color: #0f4a2a; }
        footer { background: #0f4a2a; color: rgba(255,255,255,0.45); text-align: center; padding: 22px; font-size: 0.82rem; }
        .toast { position: fixed; bottom: 28px; left: 50%; transform: translateX(-50%) translateY(20px); background: #0f4a2a; color: var(--gold); font-family: 'Nunito', sans-serif; font-weight: 800; padding: 13px 28px; border-radius: 100px; box-shadow: 0 8px 28px rgba(0,0,0,0.25); z-index: 9999; opacity: 0; transition: opacity 0.3s, transform 0.3s; pointer-events: none; border: 1px solid var(--gold); }
        .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

        /* Responsive & Animated Hamburger */
        @media (max-width: 768px) {
            nav { padding: 10px 18px; }
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                max-width: 300px;
                height: 100vh;
                background: #0a3a1e;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 20px;
                transition: right 0.4s ease-in-out;
                box-shadow: -5px 0 20px rgba(0,0,0,0.3);
                border-left: 2px solid var(--gold);
                display: flex;
                z-index: 999;
            }
            .nav-links.open {
                right: 0;
            }
            .nav-links li {
                width: 80%;
                text-align: center;
                display: block !important;
            }
            .nav-links a, .nav-links button,
            .nav-links form,
            .nav-links form button {
                display: block !important;
                width: 100% !important;
                padding: 12px !important;
                font-size: 1rem !important;
                text-align: center !important;
                justify-content: center !important;
                box-sizing: border-box;
            }
            .nav-links form {
                margin: 0 !important;
                line-height: normal !important;
            }
            .hamburger { display: flex; }
            body.nav-open { overflow: hidden; }
            .hero-btns { flex-direction: column; align-items: center; }
            .menu-grid, .preview-grid { grid-template-columns: 1fr; max-width: 400px; margin-inline: auto; }
        }

        .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .page-hero { background: linear-gradient(135deg, #1b5c38, #0f4a2a); padding: 70px 24px 60px; text-align: center; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-weight: 700; color: #0f4a2a; margin-bottom: 7px; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            border: 1px solid #c8e6c9;
            border-radius: 10px;
            padding: 10px 14px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.95rem;
            background: #ffffff;
            color: #1a2e1f;
            outline: none;
        }
        .form-group input:focus, .form-group textarea:focus { border-color: var(--gold); }
        .alert-success { background: #2d7a4f; color: #fff; padding: 12px 20px; border-radius: 100px; margin-bottom: 24px; text-align: center; }
        .error-text { color: #e53935; font-size: 0.85rem; display: block; margin-top: 5px; font-weight: bold; }
        .checkbox-group { display: flex; align-items: center; gap: 8px; margin-bottom: 18px; }
        .checkbox-group input { width: auto; margin: 0; background: #fff; }
        .checkbox-group label { margin-bottom: 0; text-transform: none; cursor: pointer; font-weight: 600; color: #0f4a2a; }
        .auth-card {
            background: #0f4a2a;
            border-radius: var(--radius);
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            max-width: 440px;
            margin: 40px auto;
            padding: 40px;
            border: 1px solid #2a5a3a;
        }
        .auth-card h2 { font-family: 'Playfair Display', serif; color: var(--gold); text-align: center; margin-bottom: 24px; font-size: 1.8rem; }
        .auth-card h2 i { margin-right: 8px; color: var(--gold); }
        .btn-edit, .btn-delete { transition: 0.2s; cursor: pointer; }
        .btn-edit:hover { background: var(--gm) !important; color: #fff !important; }
        .btn-delete:hover { background: #e53935 !important; color: #fff !important; }
        .admin-card { background: #0f4a2a; border-radius: var(--radius); padding: 32px; text-align: center; border: 1px solid #2a5a3a; transition: 0.3s; text-decoration: none; display: block; }
        .admin-card:hover { transform: translateY(-4px); border-color: var(--gold); }
        .admin-card i { font-size: 3rem; color: var(--gold); margin-bottom: 16px; display: block; }
        .admin-card h3 { color: var(--gold); margin-bottom: 8px; }
        .admin-card p { color: #c8e6c9; }
        .social-card {
            background: #0f4a2a;
            border: 1px solid #2a5a3a;
            transition: all 0.3s ease;
        }
        .social-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
        }
        .feat-card {
            background: #0f4a2a;
            border: 1px solid #2a5a3a;
            transition: 0.3s;
        }
        .feat-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
        }
        .location-footer {
            margin-top: 10px;
            font-size: 0.85rem;
            color: var(--gold);
        }
    </style>
</head>
<body>

<nav>
    <a class="nav-logo" href="{{ route('home') }}">
        <img src="{{ asset('logo.jpg') }}" alt="Sa-Wrap">
        <span>Sa-Wrap</span>
    </a>
    <ul class="nav-links" id="navLinks">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('menu') }}">Menu</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        @auth
            @if(Auth::user()->is_admin)
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-cog"></i> Admin</a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        @endauth
    </ul>
    <div class="hamburger" id="hamburger">
        <span></span><span></span><span></span>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2025 <strong>Sa-Wrap</strong> · Not Just a Wrap, It's SaWrap! · Crafted with 💚 in the Philippines</p>
    <div class="location-footer">
        <i class="fas fa-map-marker-alt"></i> Km.30 Brgy, R-2 Dasmariñas, Cavite, Philippines
    </div>
</footer>

<div id="toast" class="toast"></div>

<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    const body = document.body;

    if (hamburger) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            body.classList.toggle('nav-open');
            const spans = hamburger.querySelectorAll('span');
            if (navLinks.classList.contains('open')) {
                spans[0].style.transform = 'translateY(7px) rotate(45deg)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
            } else {
                spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
            }
        });
    }

    // Close menu when clicking on a link (optional)
    document.querySelectorAll('.nav-links a, .nav-links button').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                navLinks.classList.remove('open');
                body.classList.remove('nav-open');
                const spans = hamburger.querySelectorAll('span');
                spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
            }
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (nav) nav.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
</body>
</html>
