<?php
    $header_files = [
        'title' => 'Главная страница',
        'styles' => ['style.css','index.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>
    <main>
        <section class="section-header">
            <h1 class="section-header__h1">Новые поступления весны</h1>
            <p class="section-header__paragraph">Мы подготовили для вас лучшие новинки сезона</p>
            <div class="section-header__button">посмотреть новинки</div>
        </section>
        <section class="section-pic">

            <div class="section-pic__block">
                <div class="section-pic__one-one flex-column">
                    <p>
                        джинсовые <br>
                        куртки
                    </p>
                    <p class="arrival">New Arrival</p>
                </div>
                <div class="section-pic__one-two"></div>
            </div>

            <div class="section-pic__block">
                <div class="section-pic__two-one flex-column">
                    <div class="symbol">
                        <div class="symbol__line"></div>
                        <div class="symbol__block">
                            <div class="symbol__block-line"></div>
                            <div class="symbol__block-dot"></div>
                        </div>
                        <div class="symbol__line"></div>
                    </div>
                    <p>
                        каждый сезон мы подготавливаем для Вас исключительно лучшую модную одежду.Следите за нашими новинками.
                    </p>
                </div>
                <div class="section-pic__two-two flex-column">
                    <p>джинсы</p> 
                    <div>от 3<span>200</span> руб.</div>
                </div>
                <div class="section-pic__two-three flex-column">
                    <div>&larr;</div>
                    <div>Аксессуары </div>
                </div>
            </div>

            <div class="section-pic__block">
                <div class="section-pic__three-one"></div>
                <div class="section-pic__three-two flex-column">
                    <div class="symbol">
                        <div class="symbol__line"></div>
                        <div class="symbol__block">
                            <div class="symbol__block-line"></div>
                            <div class="symbol__block-dot"></div>
                        </div>
                        <div class="symbol__line"></div>
                    </div>
                    <p>
                        Самые низкие цены <br>
                        в Москве.<br>
                        Нашли дешевле? Вернем<br> 
                        разницу.
                    </p>
                </div>
                <div class="section-pic__three-three flex-column">
                    <div>спортивная одежда</div>
                    <p>от 59<span>0</span> руб.</p>
                </div>
            </div>

            <div class="section-pic__block">
                <div class="section-pic__four-one flex-column">
                    <div>&larr;</div>
                    <div>Элегантная обувь</div>
                    <p>ботинки,кросовки</p>
                </div>
                <div class="section-pic__four-two flex-column">
                    <p>
                        детская <br>
                        куртки
                    </p>
                    <p class="arrival">New Arrival</p>
                </div>
            </div>
        </section>
        <section class="section-sign">
            <h2 class="h2">Будь всегда в курсе выгодный предложений</h2>
            <div class="section-sign__text">подписывайся и следи за новинками и выгодными предложениями</div>
            <form method="post" class="form">
                <input type="text" name="email" placeholder="e-mail">
                <input type="submit" value="записаться" class="submit">
            </form>
        </section>
    </main>
    
<?php
    $footer_config = [
        'js' => ['index.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>

