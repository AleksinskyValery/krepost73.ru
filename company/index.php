<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><section class="company">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12 company__descr">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/company_text.php",
                        array(),
                        array(
                            "MODE" => "text"
                        )
                    );?>
                </div>
                <div class="col-lg-5 col-12 company__video-wrapper">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/company_video.php",
                        array(),
                        array(
                            "MODE" => "text"
                        )
                    );?>
                </div>
            </div>
        </div>
    </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>