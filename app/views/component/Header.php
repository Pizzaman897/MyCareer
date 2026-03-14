<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

header.mycareer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 32px;
    height: 96px;
    background: #fff;
    font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

.mycareer-header-logo {
    display: flex;
    align-items: center;
    gap: 14px;
}

.mycareer-header-logo img {
    height: 74px;
    width: auto;
}

.mycareer-header-nav {
    display: flex;
    align-items: center;
    gap: 32px;
}

.mycareer-header-nav a {
    text-decoration: none;
    color: #111;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.02em;
}

.mycareer-header-nav a:hover {
    color: #0056d6;
}

.mycareer-header-menu {
    display: block;
    cursor: pointer;
    font-size: 15px;
    padding: 0;
    border: none;
    background: transparent;
    color: #111;
    font-weight: 600;
    letter-spacing: 0.02em;
}

.mycareer-header-menu:hover {
    color: #0056d6;
}

@media (max-width: 780px) {
    .mycareer-header-nav a:not(.mycareer-header-menu) {
        display: none;
    }

    .mycareer-header-menu {
        display: block;
    }
}
</style>

<header class="mycareer-header">
    <a class="mycareer-header-logo" href="/">
        <img src="/asset/MyCareer-Logo.jpg" alt="MyCareer Logo">
    </a>

    <nav class="mycareer-header-nav" aria-label="Primary">
        <a href="/" aria-current="page">HOME</a>
        <a href="/about">ABOUT US</a>
        <a class="mycareer-header-menu" href="/menu">MENU ☰</a>
    </nav>
</header>