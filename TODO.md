- [ ] Inspect routing + existing controllers/views to confirm endpoints for recommendations and favorites
- [x] Implement DB-backed login in app/controllers/Sign_inController.php; set $_SESSION['user_id'] = user_private.id

- [ ] Implement DB-backed registration in app/controllers/RegisterController.php (or keep current if out of scope)
- [x] Persist profile + selected interests in app/controllers/InterestController.php into user_info + user_interests

- [x] Add recommendation query integration to app/controllers/HomeController.php and render dynamic cards in app/views/home/home.php


- [x] Implement favorites add/remove endpoints (new controller + update Router.php)
- [x] Render favorites dynamically in app/views/Company/favorite.php
- [x] Wire frontend: update public/js/home.js and public/js/favorite.js to call favorites endpoints


- [x] Test full flow: register/login -> interests -> home recommendations -> add/remove favorites -> favorites page


