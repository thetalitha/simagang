<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAGANG</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Work+Sans:wght@400;500;600&family=Sen:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="#" class="logo">SIMAGANG</a>
        <ul class="nav-links">
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#explore">EXPLORE</a></li>
            <li><a href="#overview">OVERVIEW</a></li>
        </ul>
        <a href="{{ route('login') }}"><button class="contact-btn">LOGIN</button></a>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
            <a href="{{ route('register') }}"><button class="get-started-btn">GET STARTED</button></a>
        </div>
        <div class="hero-image">
            <div class="photo-placeholder">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1000&q=80" alt="Team collaboration">
                <div class="annotation annotation-1">Explore modern imaging</div>
                <div class="annotation annotation-2">Cras sit amet magna</div>
                <div class="annotation annotation-3">Ut ex massa placerat</div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1000&q=80" alt="About SIMAGANG">
        </div>
        <div class="about-content">
            <h2>About SIMAGANG</h2>
            <div class="about-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            </div>
        </div>
    </section>

    <!-- Discover Section -->
    <section id="explore" class="discover">
        <h2>Discover Insights, Unlock Your Potential</h2>
        <p class="discover-subtitle">Sumber Materi untuk mendukung perjalanan magang.</p>
        
        <div class="cards-slider">
            <button class="slider-nav prev" onclick="slideCards(-1)">
                <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
            </button>
            <div class="cards-container" id="cardsContainer">
                <div class="card"><h3>LOREM IPSUM</h3><p>Breakfast Lorem ipsum...</p></div>
                <div class="card"><h3>LOREM IPSUM</h3><p>Breakfast Lorem ipsum...</p></div>
                <div class="card"><h3>LOREM IPSUM</h3><p>Breakfast Lorem ipsum...</p></div>
                <div class="card"><h3>LOREM IPSUM</h3><p>Descriptea Lorem ipsum...</p></div>
                <div class="card"><h3>LOREM IPSUM</h3><p>Breakfast Lorem ipsum...</p></div>
                <div class="card"><h3>LOREM IPSUM</h3><p>Additional content Lorem ipsum...</p></div>
            </div>
            <button class="slider-nav next" onclick="slideCards(1)">
                <svg viewBox="0 0 24 24"><path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/></svg>
            </button>
        </div>
    </section>

    <!-- Overview Section -->
    <section id="overview" class="overview">
        <h2>Overview</h2>
        <h3 class="overview-subtitle">Peserta Magang</h3>
        <p style="font-size:14px; margin-bottom:40px; opacity:0.7;">PT. Perta Arun Gas</p>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div style="background:#FEC868; color:white; padding:8px 12px; border-radius:8px; font-size:12px; margin-bottom:10px;">Technical</div>
                <div class="stat-number">183 Peserta</div>
                <div class="stat-label">Approved - On Progress</div>
            </div>
            <div class="stat-card">
                <div style="background:#FDA769; color:white; padding:8px 12px; border-radius:8px; font-size:12px; margin-bottom:10px;">Financing</div>
                <div class="stat-number">183 Peserta</div>
                <div class="stat-label">Approved - On Progress</div>
            </div>
            <div class="stat-card">
                <div style="background:#ABC270; color:white; padding:8px 12px; border-radius:8px; font-size:12px; margin-bottom:10px;">Maintenance</div>
                <div class="stat-number">183 Peserta</div>
                <div class="stat-label">Approved - On Progress</div>
            </div>
            <div class="stat-card">
                <div style="background:#8B5CF6; color:white; padding:8px 12px; border-radius:8px; font-size:12px; margin-bottom:10px;">Lorem Ipsum</div>
                <div class="stat-number">183 Peserta</div>
                <div class="stat-label">Approved - On Progress</div>
            </div>
        </div>

        <div class="chart-container">
            <div class="chart-placeholder"><div class="chart-center">291</div></div>
            <div class="chart-legend">
                <div class="legend-item"><div class="legend-color purple"></div><span>• PMH</span></div>
                <div class="legend-item"><div class="legend-color red"></div><span>• GENERAL</span></div>
                <div class="legend-item"><div class="legend-color green"></div><span>• LANGMAN</span></div>
                <div class="legend-item"><div class="legend-color yellow"></div><span>• SMK</span></div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
