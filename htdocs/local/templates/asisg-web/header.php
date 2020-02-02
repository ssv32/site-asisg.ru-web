<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8"/>
        <title><?=Helpers::$titleTextPage[Helpers::getLang()];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        
        <?
        $APPLICATION->SetAdditionalCSS("//fonts.googleapis.com/css?family=Hind:300,400,500,600,700", true);
        $APPLICATION->SetAdditionalCSS("/vendor/simple-line-icons/css/simple-line-icons.css", true);
        $APPLICATION->SetAdditionalCSS("/vendor/bootstrap/css/bootstrap.min.css", true);
        $APPLICATION->SetAdditionalCSS("/css/animate.css", true);
        $APPLICATION->SetAdditionalCSS("/css/layout.min.css", true);
        $APPLICATION->SetAdditionalCSS("/local/templates/asisg-web/css/main.css", true);
        ?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
        
        <?$APPLICATION->ShowHead();?>
        
    </head>

    <body id="body" data-spy="scroll" data-target=".header">

        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="<?=Helpers::getLangUrlByUrl('/')?>">
                                <img class="logo-img logo-img-main" src="/img/logo.png" alt="Asentus Logo">
                                <img class="logo-img logo-img-active" src="/img/logo-dark.png" alt="Asentus Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <?
                    $APPLICATION->IncludeComponent(
                        'asisg:menu',
                        '',
                        array(
                            'LANG' => Helpers::getLang()
                        )
                    );
                    ?>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
