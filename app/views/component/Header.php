<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

header.mycareer-header {
    position: sticky;
    top: 0;
    z-index: 999;
    display: flex;
    justify-content: center;
    padding: 24px 16px;
    background: #ffffff;
    font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

.mycareer-header-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1136px;
    height: 82px;
    margin-top: 0;
    padding: 0 24px;
    border-radius: 999px;
    background: #111;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.18);
}

.mycareer-header-links {
    display: flex;
    align-items: center;
    gap: 100px;
}

.mycareer-header-links:first-child {
    margin-right: 100px;
}

.mycareer-header-links:last-child {
    margin-left: 100px;
}

.mycareer-header-links a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
}

.mycareer-header-links a:hover {
    color: #70c9ff;
}

.mycareer-header-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 120px;
    height: 120px;
    margin-top: 1px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #000;
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
    flex-shrink: 0;
}

.mycareer-header-brand img {
    width: 80px;
    height: auto;
    display: block;
}

@media (max-width: 1200px) {
    .mycareer-header-bar {
        width: calc(100% - 48px);
        max-width: 1136px;
    }
}

@media (max-width: 900px) {
    .mycareer-header-bar {
        flex-wrap: wrap;
        justify-content: center;
        height: auto;
        padding: 18px 20px;
    }

    .mycareer-header-links {
        width: 100%;
        justify-content: center;
        gap: 24px;
    }

    .mycareer-header-brand {
        width: 96px;
        height: 96px;
        margin-top: 0;
    }
}

@media (max-width: 620px) {
    .mycareer-header-links {
        gap: 18px;
        flex-wrap: wrap;
    }

    .mycareer-header-brand {
        width: 86px;
        height: 86px;
    }
}
</style>

<header class="mycareer-header">
    <div class="mycareer-header-bar">
        <div class="mycareer-header-links">
            <a href="/home">Home</a>
            <a href="/about">About us</a>
        </div>

        <a class="mycareer-header-brand" href="/">
            <img src="/asset/Logo-removebg-preview%201.png" alt="MyCareer Logo">
        </a>

        <div class="mycareer-header-links">
            <a href="/mail">Mail</a>
            <a href="/favorite">Favorite</a>
        </div>
    </div>
</header>