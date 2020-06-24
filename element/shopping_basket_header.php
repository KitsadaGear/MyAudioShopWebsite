<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="home.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fa fa-shopping-basket"></i> Shopping Basket
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="btn-group">
          <button type="button" class="btn btn-secondary">Back to shop</button>
          <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="mic.php">Microphone</a>
            <a class="dropdown-item" href="speaker.php">Speaker</a>
            <a class="dropdown-item" href="#">Power Mix</a>
          </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="shopping_basket.php" class="nav-item nav-link active">
                    <h5 class="px-5 basket">
                        <i class="fa fa-shopping-basket"></i> Basket
                        <span id="basket_count" class="text-warning bg-light"> <?php echo ($basket->total_items() > 0)?$basket->total_items().' Items':'Empty'; ?></span>
                        <?php

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>