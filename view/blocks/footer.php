<footer class="footer">
    <div class="footer__menu">
        <div class="container">
            <ul class="footer__menu-list">
                <li class="footer__menu-item"><a class="footer__menu-link" href="/">Bosh sahifa</a></li>
                <li class="footer__menu-item"><a class="footer__menu-link" href="?controller=reklama">Reklama</a></li>
                <li class="footer__menu-item"><a class="footer__menu-link" href="?controller=murojat_uchun">Murojaat uchun</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="footer__bottom">
            <div class="footer__copyright">
                <a href="/"><span class="footer__logo">Kutubxona.uz</span></a>
                <p class="footer__copyright-text">Odamning ulug’vorligi uning bo’yi bilan o’lchanmaganidek, xalqning ulug’ligi ham, uning soni bilan o’lchanmaydi, yagona o’lchovi-uning aqliy kamoloti va axloqiy barkamolligidir.
                </p>
                <p class="footer__copyright-text">214-guruh talabasi Gulmurodova Dinora tomonidan tayorlangan diplom ishi.</p>
                
            </div>
            <div class="footer__right">
                <ul  class="footer__social">
                    <?php if(!empty($getSocials)): ?>

                        <?php foreach($getSocials as $getSocial): ?>

                            <li  class="footer__social-item">
                                <a style="font-size: 16px; border-radius: 50%;background: #ccc; width: 30px; height: 30px; line-height: 30px; text-align: center;" href="<?=$getSocial['link']?>" class="<?=$getSocial['class']?>"></a>
                            </li>

                        <?php endforeach; ?>

                    <?php endif; ?>
                </ul>
                <div class="footer__madeby"><a href="http://oks.uz" target="_blank" rel="noreferrer noopener"><img
                            src="<?=ASSETS?>/img/inhtml/okslogo.svg" alt=""></a></div>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="<?=ASSETS?>/js/common.js"></script>
<script src="<?=ASSETS?>/js/main.js"></script>
</body>

</html>