<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php $this->title ='Administration'; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="../css/clean-blog.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

    </head>

    <body>

        <?= $this->session->show('add_article'); ?>
        <?= $this->session->show('edit_article'); ?>
        <?= $this->session->show('delete_article'); ?>
        <?= $this->session->show('unflag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('delete_user'); ?>

        <!------------------ Navigation ------------------->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="../public/index.php">Mon blog</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php">Retour à l'accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/index.php?route=addArticle">Nouvel article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <!--------------- Page Header ------------------>
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

        <!------------------ Arcticle Section ------------------>
        <h2 class="section-heading text-uppercase section-title">Articles</h2>
        <section class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($articles as $article)
                    {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($article->getId());?></td>
                            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
                            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
                            <td><?= htmlspecialchars($article->getAuthor());?></td>
                            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
                            <td>
                                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <br>

        <!------------------ Comments section ------------------>
        <h2 class="section-heading text-uppercase section-title">Commentaires signalés</h2>
        <section class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Pseudo</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($comments as $comment)
                    {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($comment->getId());?></td>
                            <td><?= htmlspecialchars($comment->getPseudo());?></td>
                            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
                            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
                            <td>
                                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <br>
        
        <!------------------ Users section ------------------>
        <h2 class="section-heading text-uppercase section-title">Utilisateurs</h2>
        <section class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Pseudo</th>
                        <th>Date</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user)
                    {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($user->getId());?></td>
                            <td><?= htmlspecialchars($user->getPseudo());?></td>
                            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
                            <td><?= htmlspecialchars($user->getRole());?></td>
                            <td>
                                <?php
                                if($user->getRole() != 'admin') {
                                ?>
                                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                                <?php }
                                else {
                                    ?>
                                Suppression impossible
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!------------------ Footer ------------------>
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