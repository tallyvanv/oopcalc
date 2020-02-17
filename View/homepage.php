<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Calculator</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <h4>Hello <?php // echo $customer->getName()?>,</h4>
        <p>Put your content here.</p>
    </section>

    <form action="/action_page.php" method="post">
        <label for="customers">Choose a customer:</label>
        <select id="customers" name="customers">
<?php
foreach($userArray as $user){ ?>

            <option value="<?php echo $user->getId();?>"><?php echo $user->getName();?></option>


<?php } ?>
        </select>
        <input type="submit" value="Submit">
    </form>
    <form action="/action_page.php" method="post">
            <label for="products">Choose a duck:</label>
            <select id="products" name="products">
            <?php
            foreach($productArray as $product){ ?>

                <option value="<?php echo $product->getId();?>"><?php echo $product->getName();?></option>


            <?php } ?>
            </select>
        <input type="submit" value="Submit">
    </form>

        </select>
        <input type="submit" value="Submit">
    </form>

    <p>Choose a car, and click the "Submit" button to send input to the server.</p>







    <?php require 'includes/footer.php'?>
</body>
</html>