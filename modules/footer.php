<footer>
            <div class="footer-left">
                <div>
                    <h6>Колекции</h6>
                    <div>
                        <a href="#">Женщинам (1725)</a>
                        <a href="#">Мужчинам (635)</a>
                        <a href="#">Детям (2514)</a>
                        <a href="#">Новинки (76)</a>
                    </div>
                </div>
            </div>
            <div class="footer-center">
                <div>
                    <h6>Магазин</h6>
                    <div>
                        <a href="#">О нас</a>
                        <a href="#">Доставка</a>
                        <a href="#">Работай с нами</a>
                        <a href="#">Контакты</a>
                    </div>
                </div>
            </div>
            <div class="footer-right">
                <div>
                    <h6>Мы в социальных сетях</h6>
                    <div>
                        <span>Сайт разработан в inordic</span>
                        <span>2018 &copy; Все права защищены</span>
                        <div>
                            <a href="#" class="twitter"></a>
                            <a href="#" class="facebook"></a>
                            <a href="#" class="instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php foreach($footer_config['js'] as $footerPath): ?>
        <script src="/js/<?=$footerPath?>"></script>
    <?php endforeach;?>
</body>
</html>