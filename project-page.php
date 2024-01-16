<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/PDO.php");
?>
<!DOCTYPE html>
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

<main class="section">
    <div class="container">
        <div class="project-details">

            <?php
                if (isset($_GET['project'])) {
                    $sql = "SELECT * FROM projects WHERE id = :project";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(":project", $_GET['project']);
                    $stmt->execute();

                    $pr = $stmt->fetch(PDO::FETCH_ASSOC);
                    $img = $pr['img'];
                    $title = $pr['title'];
                    $skils = $pr['skils'];
                    $git = $pr['git'];

                    echo "
                        <h1 class='title-1'>$title</h1>
        
                        <img src='".$img."' alt='' class='project-details__cover'>
            
                        <div class='project-details__desc'>
                            <p>$skils</p>
                        </div>
            
                        <a href='".$git."' class='btn-outline'>
                            <img src='/img/icons/gitHub-black.svg' alt=''>
                            GitHub repo
                        </a>
                    ";
                } else {
                    echo "No id parameter received.";
                }
            ?>



        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <ul class="social">
                <li class="social__item"><a href="#!"><img src="/img/icons/vk.svg" alt="Link"></a></li>
                <li class="social__item"><a href="#!"><img src="/img/icons/instagram.svg" alt="Link"></a></li>
                <li class="social__item"><a href="#!"><img src="/img/icons/twitter.svg" alt="Link"></a></li>
                <li class="social__item"><a href="#!"><img src="/img/icons/gitHub.svg" alt="Link"></a></li>
                <li class="social__item"><a href="#!"><img src="/img/icons/linkedIn.svg" alt="Link"></a></li>
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