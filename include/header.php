<header>
    <?php
    if($_SERVER['PHP_SELF']!=="/autocompletion/index.php")
    {
    ?>
    <div id="menu">
        <a href="index.php"><button type="submit" name="accueil" value="Accueil">Accueil</button></a>
    </div>
        <div id="div_search">
            <form autocomplete="off" method="GET" action="recherche.php">
                <input type="text" name="search" id="search" list="liste" placeholder="Votre recherche" required>
                <datalist id="liste">
                </datalist>
                <input type="submit" id="submit">
            </form>
        </div>
    <?php
    }
    ?>
</header>

