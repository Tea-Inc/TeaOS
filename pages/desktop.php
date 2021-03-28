<?php
$reqsoftware = $bdd->prepare("SELECT * FROM users_softwares WHERE user_id = ?");
$reqsoftware->execute(array($_SESSION['id']));
$software_count = $reqsoftware->rowCount();
$software = $reqsoftware->fetchAll();

$reqsoftware = $bdd->prepare("SELECT * FROM users WHERE id = ?");
$reqsoftware->execute(array($_SESSION['id']));
$userinfo = $reqsoftware->fetch();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="etc/css/main.css">
</head>

<body>
    <div class="loading">
        <img src="etc/img/logo_coloured_v2.png" alt="" id="slidecaption">
    </div>
    <div class="head">
        <div class="toolbar">
            <div class="right">
                <p id="Utility" class="taskb info"><i class="fas fa-info"></i></p>
                <p id="Ethernet" class="taskb internet"><i class="fas fa-network-wired"></i></p>
                <p id="Battery" class="taskb battery"><i class="fas fa-battery-full"></i></p>
                <p id="Date and Time" class="taskb hour"></p>
                <p id="Logout" class="taskb logout"><i class="fas fa-power-off"></i></p>
            </div>
        </div>
    </div>

    <div class="desktop">
        <div class="icons-desktop">
            <?php
            for ($i = 0; $i < $software_count; $i++) {
                $appli = json_decode(file_get_contents('bin/' . $software[$i]['code'] . '.json'));
            ?>
                <div class="icon-desktop" id="<?php echo $software[$i]['id']; ?>" style="height:90px;width:70px;
                        top:<?php echo $software[$i]['toppos']; ?>;left:<?php echo $software[$i]['leftpos']; ?>;
                        ">
                    <img src="<?php print $appli->{'icon'}; ?>">
                    <div class="restrictep">
                        <span><?php print $appli->{'name'}; ?></span>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    for ($i = 0; $i < $software_count; $i++) {
        $appli = json_decode(file_get_contents('bin/' . $software[$i]['code'] . '.json'));
    ?>
        <div class="page" style="display: none">
            <div class="window">
                <div class="header">
                    <div class="buttons">
                        <img src="etc/img/button_minimize.png" class="minimize" alt="">
                        <img src="etc/img/button_maximize.png" class="maximize" alt="">
                        <img src="etc/img/button_close.png" class="close" alt="">
                    </div>
                    <div class="app">
                        <img src="<?php print $appli->{'icon'}; ?>" alt="">
                        <p class="app_title"><?php print $appli->{'name'}; ?></p>
                    </div>
                    <div class="bar"></div>
                </div>
                <div class="body">
                    <iframe id="<?php print $appli->{'code'}; ?>" src="<?php print $appli->{'url'}; ?>"></iframe>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="tiny_box" style="display: none; z-index: 9999999999999999">
        <div class="header">
            <div class="buttons">
                <img src="etc/img/button_close.png" class="close" alt="">
            </div>
            <div class="app">
                <p class="app_title"></p>
            </div>
            <div class="bar"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="etc/js/toolbar.js"></script>
    <script src="etc/js/page.js"></script>
    <script src="etc/js/desktop.js"></script>
    <script>
        window.addEventListener('load', function() {
            var div = document.getElementsByClassName('loading')[0];
            div.style = "animation: fade .5s linear;"
            setTimeout(() => {
                div.style.display = "none"
            }, 500);
        })
    </script>
</body>

</html>