<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php $this->title = 'Accueil'; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="../css/clean-blog.min.css" rel="stylesheet">
    </head>

    <body>

        <?= $this->session->show('add_article'); ?>
        <?= $this->session->show('edit_article'); ?>
        <?= $this->session->show('delete_article'); ?>
        <?= $this->session->show('add_comment'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('register'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
        <?= $this->session->show('delete_account'); ?>

        <!---------------- Navigation --------------------->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="../public/index.php">Mon blog</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <?php 
                if ($this->session->get('pseudo')) { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=logout">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=profile">Profil</a>
                    </li>
                    <?php if($this->session->get('role') === 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=administration">Administration</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=addArticle">Nouvel article</a>
                    </li>
                <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=register">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=login">Connexion</a>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
            </div>
        </nav>

        <!------------------ Page Header ------------------>
        <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
                </div>
            </div>
            </div>
        </header>

        <!----------------- Main Content ------------------->
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            foreach ($articles as $article)
            {
                ?>
                <div class="post-preview">
                    <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">
                        <h2 class="post-title"><?= htmlspecialchars($article->getTitle());?></h2>
                        <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                    </a>
                    <p class="post-meta">Publié par
                        <?= htmlspecialchars($article->getAuthor());?>
                        le : <?= htmlspecialchars($article->getCreatedAt());?></p>
                </div>
                <hr>
                <?php
            }
            ?>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
            </div>
        </div>

        <hr>

        <!---------------- Footer ------------------>
        <footer>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
                </div>
            </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="../js/clean-blog.min.js"></script>

    </body>
</html>
