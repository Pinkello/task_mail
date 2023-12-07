<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="main col-10 col-10 col-offset-1">
            <br />
            <div class="title">
                <!-- <?php echo lang('Text.homepage_welcome') ?> -->
                <p> Witamy w aplikacji Mailer </p>
                <p>
                <h4 style="margin-bottom:40px;">Aplikacja rekrutacyjna do wysyłania maili</h4>
                </p>

            </div>
            <hr>
            <br />

            <div class="subtitle">
                <h4>Tech stack zastosowany w aplikacji</h4>

            </div>
            <br />

            <div class="row">
                <div class="link1 col">
                    <div class="image fromLeft">

                        <a class="nav-link" href="https://www.codeigniter.com/user_guide/intro/index.html">
                            <div class="image-container">
                                <img src="<?= base_url() ?>/assets/img/ci4.png" height="300" width="300" class="hidden">
                                <div class="text-overlay">
                                    <h3>CodeIgniter4</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="link2 col">
                    <div class="image fromRight">
                        <a class="nav-link" href="https://www.mysql.com/">
                            <div class="image-container">
                                <img src="<?= base_url() ?>/assets/img/mysql.png" height="300" width="300" class="hidden">
                                <div class="text-overlay">
                                    <h3>MySQL</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="link1 col">
                    <div class="image fromLeft">
                        <a class="nav-link" href="https://sass-lang.com/">
                            <div class="image-container">
                                <img src="<?= base_url() ?>/assets/img/sass.png" height="300" width="300" class="hidden">
                                <div class="text-overlay">
                                    <!-- <h3><?php echo lang('Text.homepage_about_cyfrovet') ?></h3> -->
                                    <h3>SASS</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="link2 col">
                    <div class="image fromRight">
                        <a class="nav-link" href="https://github.com/PHPMailer/PHPMailer">
                            <div class="image-container">
                                <img src="<?= base_url() ?>/assets/img/phpmailer.png" height="300" width="300" class="hidden">
                                <div class="text-overlay">
                                    <h3>PHP Mailer</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <br />


            <br>
            <br>

            <br>

        </div>
    </div>
</div>


<script>
    // Dodajemy obsługę zdarzeń dla obiektów image
    const images = document.querySelectorAll('.image');

    images.forEach((image) => {
        // Dodajemy nasłuchiwanie na zdarzenie najechania myszką
        image.addEventListener('mouseenter', () => {
            // Znajdujemy element .text-overlay dla danego obiektu image
            const textOverlay = image.querySelector('.text-overlay');
            // Dodajemy klasę hover, aby podświetlić .text-overlay
            textOverlay.classList.add('hover');
        });

        // Dodajemy nasłuchiwanie na zdarzenie opuszczenia myszki
        image.addEventListener('mouseleave', () => {
            // Znajdujemy element .text-overlay dla danego obiektu image
            const textOverlay = image.querySelector('.text-overlay');
            // Usuwamy klasę hover, aby wyłączyć podświetlanie .text-overlay
            textOverlay.classList.remove('hover');
        });
    });

    $(".title").show();
    $(".subtitle").show();
    $(".image").show();

    window.onload = function() {
        // Opóźnij wyświetlanie obrazów
        setTimeout(function() {
            const images = document.querySelectorAll('.images');
            images.forEach(function(image) {
                image.style.display = 'block';
            });

        });
    };
</script>