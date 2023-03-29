<?php 
session_start();
require('actions/questions/afficheQuestionsAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inclusions/head.php'; ?>
<body>
    <?php include 'inclusions/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form method="GET">
            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php
            while($question = $getAllQuestions->fetch()){
                ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="article.php?id=<?php echo $question['id'];?>">
                                <?php echo $question['titre'];?>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php echo $question['description'];?>
                        </div>
                        <div class="card-footer">
                            Publié par <?php echo $question['pseudo_auteur'];?> le <?php echo $question['date_publication'];?>
                        </div>
                       
                    </div>
                    <br>
                <?php
            }
        ?>
    </div>   

</body>
</html>