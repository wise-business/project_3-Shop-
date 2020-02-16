<?php
    $header_files = [
        'title' => 'Карзина покупок',
        'styles' => ['style.css','basket.css'] 
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    
?>
    <h1 class="h1">Ваша карзина</h1>
    <p class="paragraph">Товары резервируються на короткое время</p>
    <main>
        <section class="goods">
            <div class="goods__title">
                <div class="goods__title-left">
                    <div class="goods__title-text">Фото</div>
                    <div class="goods__title-text goods__title-text_margin-left">Наименование</div>
                </div>
                <div class="goods__title-right">
                    <div class="goods__title-text">Размер</div>
                    <div class="goods__title-text goods__title-text_margin_36">Количество</div>
                    <div class="goods__title-text goods__title-text_margin_53">Стоимость</div>
                    <div class="goods__title-text goods__title-text_margin_10">удалить</div>
                </div>
            </div>
            <div class="goods__block">
                <div class="goods__block-left">
                    <div class="goods__block-photo"></div>
                    <div class="goods__block-title">
                        <div class="good__title-description">Куртка синяя</div>
                        <div class="good__title-article">арт. 123412</div>
                    </div>
                </div>
                <div class="goods__block-right">
                    <div class="goods__size">39</div>
                    <div class="goods__quantity">
                        <div class="goods__quantity-num">1</div>
                        <div class="goods__quantity-sign">
                            <div class="goods__quantity-sign-value">+</div>
                            <div class="goods__quantity-sign-value">−</div>
                        </div>
                    </div>
                    <div class="goods__price">3800 руб.</div>
                    <div class="goods__delete">✕</div>
                </div>
            </div>
        </section>
    </main>
<?php
    $footer_config = [
        'js' => ['basket.js']
    ];
    include_once($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>