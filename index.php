<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/PDO.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer portfolio</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <nav class="nav">
        <div class="container">
            <div class="nav-row">
                <a href="/" class="logo"><strong>Stuff</strong> code</a>

                <button class="dark-mode-btn">
                    <img src="/img/icons/sun.svg" alt="Light mode" class="dark-mode-btn__icon">
                    <img src="/img/icons/moon.svg" alt="Dark mode" class="dark-mode-btn__icon">
                </button>

                <ul class="nav-list">
                    <li class="nav-list__item"><a href="/" class="nav-list__link nav-list__link--active">Проекты</a></li>
                    <li class="nav-list__item"><a href="/skills.php" class="nav-list__link">Скилы</a></li>
                    <li class="nav-list__item"><a href="/contacts.php" class="nav-list__link">Контакты</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="header__wrapper">
            <h1 class="header__title">
                <strong>Привет, меня зовут <em>Евгений</em></strong><br>
                backend developer
            </h1>
            <div class="header__text">
                <p>с фокусом на эффективности и технической точности.</p>
            </div>
            <a href="/php/cv_download.php?filename=cv.pdf" class="btn">Скачать CV</a>
        </div>
    </header>

    <main class="section">
        <div class="container">
            <h2 class="title-1">Проекты</h2>
            <ul class="projects">

                <?php
                $sql = "SELECT * FROM projects";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                while ($pr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $pr['id'];
                    $img = $pr['img'];
                    $title = $pr['title'];

                    echo "
                                <li>
                                    <li class='project'>
                                        <a href='/project-page.php?project=".$id."'>
                                            <img src='".$img."' alt='' class='project__img'>
                                            <h3 class='project__title'>$title</h3>
                                        </a>
                                    </li>
                            ";
                }
                ?>
            </ul>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__wrapper">
                <ul class="social">
                    <li class="social__item"><a href="#!"><img src="/img/icons/vk.svg" alt="Link"></a></li>
                    <li class="social__item"><a href="#!"><img src="/img/icons/instagram.svg" alt="Link"></a></li>
                    <li class="social__item"><a href="#!"><img src="/img/icons/gitHub.svg" alt="Link"></a></li>
                    <li class="social__item"><a href="#!"><img src="/img/icons/telegram.svg" alt="Link"></a></li>
                </ul>
                <div class="copyright">
                    <p>© 2024 stuffcode.ru</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>
<?php


?>
