</main>

<footer class="footer">
    <div class="container">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"sitemap",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "subcatalog-sitemap",
		"COMPONENT_TEMPLATE" => ".default",
		"DELAY" => "N",
		"MAX_LEVEL" => "4",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "sitemap",
		"USE_EXT" => "Y"
	)
);?>
    </div>
    <div class="footer-info">
        <div class="container container_p0">
            <div class="footer-info__main">
                <a href="/" class="footer-info__logo-link">
                    <img class="footer-info__logo" src="<?= SITE_TEMPLATE_PATH ?>/img/main/logo.svg" alt="Группа компаний Крепость">
                </a>
                <ul class="footer-info__social-list">
                    <li class="footer-info__social-item">
                        <a href="https://instagram.com/krepost.73" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-inst.svg" alt="Инстаграм" class="footer-info__social-img">
                        </a>
                    </li>
                    <li class="footer-info__social-item">
                        <a href="https://vk.com/krepost73" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-vk.svg" alt="Вконтакте" class="footer-info__social-img">
                        </a>
                    </li>
                    <li class="footer-info__social-item">
                        <a href="https://ok.ru/group/54937615007827?st._aid=ExternalGroupWidget_OpenGroup" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-ok.svg" alt="Одноклассники" class="footer-info__social-img">
                        </a>
                    </li>
                </ul>
                <ul class="footer-info__contacts-list">
                    <li class="footer-info__contacts-item">
                        <a href="tel:+78422265301" class="footer-info__contacts-link">+7 (8422) 26-53-01</a>
                    </li>
                    <li class="footer-info__contacts-item">
                        <a href="mailto:krepost-gk@mail.ru" class="footer-info__contacts-link">krepost-gk@mail.ru</a>
                    </li>
                </ul>
            </div>
            <div class="footer-info__copyright-wrapper">
                <p class="footer-info__copyright">© 2013 - 2021 Интернет магазин охранного оборудования "ГК "Крепость", Ульяновск</p>
                <a href="https://agatech.ru/" class="footer-info__copyright-link" target="_blank">
                    <img class="footer-info__copyright-img" src="<?= SITE_TEMPLATE_PATH ?>/img/main/footer-agatech.png" alt="AGATECH">
                </a>
            </div>
        </div>
    </div>
 </footer>

</body>
</html>