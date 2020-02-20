<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product Calculator</title>
</head>
<body>
<div class="container-fluid p-4">
    <?php require 'includes/header.php' ?>
    <section>
        <h4>Everything has a price</h4>
        <form method="post">
            <div class="form-row d-flex justify-content-center">
                <div class="form-group p-5">
                    <label for="customers"><strong>Choose a customer:</strong></label>
                    <select id="customers" name="customers" class="form-control custom-select">
                        <?php
                        foreach ($_SESSION['userArray'] as $user) { ?>

                            <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>


                        <?php } ?>
                    </select>
                </div>
                <div class="form-group p-5">
                    <label for="products"><strong>Choose a product:</strong></label>
                    <select id="products" name="products" class="form-control custom-select">
                        <?php
                        foreach ($_SESSION['productArray'] as $product) { ?>

                            <option value="<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></option>


                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input type="submit" value="Get that discount">
            </div>
        </form>

    </section>
    <!-- action="/action_page.php": this brings you to another page if you post -->

    <section class="p-2">
        <p>Hello <strong><?php echo $_SESSION['userArray'][$_POST["customers"]]->getName() ?></strong><br>
            You selected <strong><?php echo $_SESSION['productArray'][$_POST["products"]]->getName() ?></strong><br>
        The original price was <strong>€ <?php echo $_SESSION['productArray'][$_POST["products"]]->getPrice() ?></strong><br>
            But because you belong to <strong><?php echo "groups" ?></strong> in <strong><?php echo "company" ?></strong><br>
            you fixed discount is <strong><?php echo "fixeddiscount" ?></strong><br>
            and your variable discount is <strong><?php echo "variablediscount" ?></strong><br>
            So you only ended up paying <strong><?php echo "finalprice" ?></strong>!
        </p>
    </section>

    <div class="d-flex justify-content-center pt-5">
        <?php require 'includes/footer.php' ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>