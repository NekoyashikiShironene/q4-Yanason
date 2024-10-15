<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="script/page.js"></script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <main>
            <h1>Home</h1>
            <form action="products.php" class="search-form">
                <label for="">What are you looking for?</label> <br>
                <input type="text" class="search-bar" name="keyword">
                <button type="submit" class="search-btn">Search</button>
            </form>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia odit voluptatibus dolorem magnam eum quod molestiae assumenda numquam quisquam, sed exercitationem quae placeat recusandae incidunt ab! Praesentium quos nam fuga.
                Incidunt hic sequi at impedit velit nisi consequatur similique molestias et odit perferendis placeat, veniam aperiam. Architecto culpa provident ullam, illum incidunt, dolores, nihil possimus fuga ea natus saepe quae!
                Aperiam quas facilis asperiores! Laudantium, nisi aut molestias fuga inventore fugit laborum porro ab iure nobis similique necessitatibus aspernatur quia consectetur et voluptatum magni doloribus, enim itaque provident officiis! Reiciendis!
                Quisquam quis, veniam impedit non dolorem saepe dicta nobis nihil commodi ab eos nisi modi, quae illo aperiam excepturi ex. Fuga harum rerum sint perferendis iusto perspiciatis repellendus quisquam possimus!
                Iure, necessitatibus? Ab, placeat ea quo excepturi nostrum fugiat tenetur aliquam iste perspiciatis commodi molestias cumque repudiandae atque repellat error reiciendis officiis sit illum sapiente sint quaerat at. Dignissimos, facilis.
            </p>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>