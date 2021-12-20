<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<section class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-12 contacts__info">
                <p><span class="bold">Центральный Офис, Магазин:</span></p>
                <p>432059, г. Ульяновск, Пр-Т Созидателей 36 А</p>
                <p><span class="bold">Тел.:</span> 8 (8422) 26-53-01, 26-53-02, 275-112</p>
                <p><span class="bold">Пн-Пт:</span> 08:00-17:00</p>  
                <p><span class="bold">Сб-Вс:</span> Выходной</p> 
                <p><span class="bold">ИНН</span> 732895910510</p> 
                <p><span class="bold">ОГРН</span> 312732823700020</p> 
                <p><span class="bold">Email:</span> krepost-gk@mail.ru, krepost-gk@bk.ru</p> 
            </div>
            <div class="col-xl-8 col-lg-7 col-12">
                <iframe class="contacts__map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A8eadecbde8b79afe5fddbd127d62c838f23d371bd0131d9eee4fd2b6c7c0cad3&amp;source=constructor" width="730" height="404"></iframe>
            </div>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>