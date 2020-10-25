    </body>
    <footer>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script>
            <?php
            if (isset($jsFile) && !empty($jsFile))
                include(__DIR__ . '/../../Controller/js/' . $jsFile . '.js');
            ?>
        </script>
    </footer>

    <?php
    if (!isset($includeMenu) || $includeMenu != 0)
        include(__DIR__ . '/../inc/menu.php');
    ?>

    </html>