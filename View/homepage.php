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
        <h4>Hello <?php echo $user->getName()?>,</h4>
        <p>Put your content here.</p>
    </section>

    <form action="/action_page.php">
        <label for="customers">Choose a customer:</label>
<?php for($i=0;count($userDropdown->load())>=$i;$i++): ?>
        <select id="customers" name="cars">
            <option value="<?php $userDropdown->load()[$i]; ?>"><?php echo ($userDropdown->load()[$i]);?></option>

<?php endfor; ?>


            <option value="saab">Saab 95</option>
            <option value="mercedes">Mercedes SLK</option>
            <option value="audi">Audi TT</option>
        </select>
        <input type="submit" value="Submit">
    </form>

    <p>Choose a car, and click the "Submit" button to send input to the server.</p>







    <?php require 'includes/footer.php'?>
</body>
</html>