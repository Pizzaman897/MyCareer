<footer class="mycareer-footer">
    <div class="mycareer-footer__columns">
        <div class="mycareer-footer__col">
            <h4>Company</h4>
            <a href="/about-us">About Us</a>
            <a href="/mail">Mail</a>
            <a href="/favorite">Favorite</a>
        </div>

        <div class="mycareer-footer__col">
            <h4>Customer Support</h4>
            <a href="/help">Help Center</a>
            <a href="/faq">FAQ</a>
            <a href="/contact">Contact Us</a>
        </div>

        <div class="mycareer-footer__col">
            <h4>Legal</h4>
            <a href="/privacy">Privacy Policy</a>
            <a href="/terms">Terms of Service</a>
            <a href="/cookies">Cookies Policy</a>
        </div>

        <div class="mycareer-footer__col mycareer-footer__social">
            <h4>Follow Us</h4>
            <div class="mycareer-footer__social-grid">
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/330px-Instagram_logo_2022.svg.png" alt="Instagram">
                </a>
                <a href="https://www.x.com" target="_blank" rel="noopener noreferrer" aria-label="X">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/X_logo_2023_%28white%29.png/960px-X_logo_2023_%28white%29.png?_=20230728230735" alt="X">
                </a>
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="Facebook">
                </a>
                <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/1280px-YouTube_full-color_icon_%282017%29.svg.png?_=20240107144800" alt="YouTube">
                </a>
            </div>
        </div>
    </div>

    <div class="mycareer-footer__credits">
        © 2026 MyCareer. All rights reserved.
    </div>
</footer>

<style>
.mycareer-footer {
    width: 100%;
    height: 380px;
    padding: 80px 64px;
        background: #0a0a0a;
}

.mycareer-footer__columns {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: space-between;
    max-width: 1160px;
    margin: 0 auto 24px;
}

.mycareer-footer__col {
    min-width: 160px;
    flex: 1;
}

.mycareer-footer__col h4 {
    margin: 0 0 16px;
    font-size: 16px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}

.mycareer-footer__col a {
    display: block;
    margin-bottom: 10px;
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    font-size: 16px;
}

.mycareer-footer__col a:hover {
    color: #fff;
}

.mycareer-footer__social-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(40px, 1fr));
    gap: 6px;
    align-items: center;
}

.mycareer-footer__social-grid img {
    width: 32px;
    height: 32px;
    display: block;
    object-fit: contain;
}

.mycareer-footer__credits {
    text-align: center;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.62);
    padding-top: 67px;
}

@media (max-width: 780px) {
    .mycareer-footer {
        padding: 40px 24px;
    }

    .mycareer-footer__columns {
        flex-direction: column;
        gap: 24px;
        align-items: flex-start;
    }

    .mycareer-footer__social-grid {
        grid-template-columns: repeat(4, minmax(40px, 1fr));
        gap: 12px;
    }
}
</style>