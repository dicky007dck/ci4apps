<nav class="navbar navbar-expand navbar-blue navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand text-light" href="/pages">PDAM Tirta Perwitasari</a>
        </button>
        <ul class="nav nav-tab justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="/pages">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/suratmasuk">Surat Masuk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/suratkeluar">Surat Keluar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/pages/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/pages/contact">Contact Us</a>
            </li>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if (logged_in()) : ?>
                        <a class="btn btn-danger mr-2 " href="/logout">Logout</a>
                    <?php else : ?>
                        <a class="btn btn-success mr-2 " href="/login">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </ul>
    </div>
</nav>