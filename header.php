<?php

/**
 * The header for our theme
 */
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="email=no,telephone=no,address=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta name="description" content="" />
        <meta name="keywords" content="">
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
        
		<?php wp_head(); ?> 
	</head>

<body>
    <?php wp_body_open(); ?>
  <!-- HEADER  -->
  <header class="header" id="header">
        <div class="header__wrapper">
            <a href="<?php echo home_url(); ?>" class="header__logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="韓国教育財団" width="260" height="34" class="img-fluid" loading="lazy">
            </a>

            <div class="nav__ham d-md-none" id="js-navIcon"></div>

            <div class="header__rgt" id="js-nav">
                <div class="header__rgt-wrapper">
                    <a href="<?php echo home_url(); ?>/privacy/" class="header__privacy-lnk d-md-none">プライバシーポリシー</a>

                    <div class="header__top">
                        <a href="<?php echo home_url(); ?>/news" class="header__lnk -sm">お知らせ</a>
                        <a href="<?php echo home_url(); ?>/contact/" class="header__lnk -lg">お問い合わせ</a>
                    </div>
                    <ul class="nav">
                        <li class="nav__item d-md-none">
                            <a href="#" class="nav__lnk ">トップページ</a>
                        </li>

                        <li class="nav__item dropdown">
                            <a href="<?php echo home_url(); ?>/about/" class="nav__lnk ">財団について</a>
                            <ul class="submenu">
                                <li><a href="<?php echo home_url(); ?>/about/overview">概要・アクセス</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/member/">理事長・役員紹介</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/history/">財団の歩み</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/memorandum/">定款</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/statement/">財団現況</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/relevance/">妥当性について</a></li>
                                <li><a href="#">財団についてトップ</a></li>
                            </ul>
                        </li>
                        <li class="nav__item dropdown">
                            <a href="<?php echo home_url(); ?>/scholarship/" class="nav__lnk">奨学金</a>
                            <ul class="submenu">
                                <li><a href="<?php echo home_url(); ?>/scholarship/general-scholarship/">一般奨学金</a></li>
                                <li><a href="<?php echo home_url(); ?>/scholarship/byeokbong-scholarship/">碧夆奨学金</a></li>
                                <li><a href="<?php echo home_url(); ?>/scholarship/public-scholarship/">碧学金</a></li>
                                <li><a href="#">奨学金トップ</a></li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__lnk" target="_blank" rel="noopener noreferrer">TOPIK</a>
                        </li>
                        <li class="nav__item dropdown">
                            <a href="<?php echo home_url(); ?>/education/" class="nav__lnk">教育・研究</a>
                            <ul class="submenu">
                                <li><a href="<?php echo home_url(); ?>/education/pedagogue/">在日韓国人教育研究大会</a></li>
                                <li><a href="<?php echo home_url(); ?>/education/speech-contest/">韓国語スピーチ大会</a></li>
                                <li><a href="<?php echo home_url(); ?>/education/topik-forum/">TOPIKフォーラム</a></li>
                                <li><a href="<?php echo home_url(); ?>/education/k-pop/">K-POP DANCE大会</a></li>
                                <li><a href="<?php echo home_url(); ?>/education/study-abroad/">韓国留学フェア</a></li>
                                <li><a href="#">教育・研究トップ</a></li>
                            </ul>
                        </li>
                        <li class="nav__item dropdown">
                            <a href="<?php echo home_url(); ?>/education/network/" class="nav__lnk">寄附</a>
                            <ul class="submenu">
                                <li><a href="#">寄付をする</a></li>
                                <li><a href="#">寄付のメリット</a></li>
                                <li><a href="#">エピソード</a></li>
                                <li><a href="#">ご協力を頂いた方々</a></li>
                                <li><a href="#">寄附トップ</a></li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__lnk">活動報告</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--breadcrumb-->

    <?php custom_breadcrumb(); ?>