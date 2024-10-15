<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="../script/page.js"></script>
        <script>
            async function getDataFromAPI() {
                let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json');
                let rawData = await response.text();
                let objectData = JSON.parse(rawData);

                let result;
                for (let i = 0; i < objectData.features.length; i++) {
                    let num_bed = objectData.features[i].properties.num_bed;
                    let content = objectData.features[i].properties.name;

                    if (num_bed > 91)
                        result = document.getElementById('hoslist-large');
                    else if (num_bed > 30)
                        result = document.getElementById('hoslist-medium');
                    else   
                        result = document.getElementById('hoslist-small');

                    let li = document.createElement('li')
                    li.innerHTML = `${content} (${num_bed} เตียง)`

                    result.appendChild(li)
                }
            }
            getDataFromAPI()
        </script>
    </head>

    <body>
        <?php include "../components/navbar.php"; ?>
        <?php include "../components/menu.php" ?>
        <main>
            <h1>โรงพยาบาลเอกชน ในกทม. (ใหญ่)</h1>
            <ol id="hoslist-large">
            </ol>

            <h1>โรงพยาบาลเอกชน ในกทม. (กลาง)</h1>
            <ol id="hoslist-medium">
            </ol>

            <h1>โรงพยาบาลเอกชน ในกทม. (เล็ก)</h1>
            <ol id="hoslist-small">
            </ol>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>