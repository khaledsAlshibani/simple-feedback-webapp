<?php
require_once 'functions.php';

if (isLogout()) {
    header("Location: index.php");
    exit;
}

$suggestion_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update Suggestion</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = true;
        include('templates/header.php');
        ?>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="margin-top: 100px; margin-bottom: 100px;">
                <div class="col-md-6">
                    <h2 class="mb-4 fw-bold" style="max-width: 80%;">Update Suggestion</h2>

                    <form method="post" action="functions.php">
                        <?php $suggestion = getSuggestion($suggestion_id, $mysqli); ?>
                        <input type="hidden" name="suggestion_id" value="<?php echo $suggestion_id; ?>">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-2" id="title" placeholder="Title" name="suggestion_title" value="<?php echo $suggestion['title']; ?>" required>
                                <label for="title">Title</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="description" name="suggestion_description" placeholder="Enter description" rows="5" style="min-height: 150px;" required><?php echo $suggestion['description']; ?></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-2">Update Suggestion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>