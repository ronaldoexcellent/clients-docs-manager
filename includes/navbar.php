<?php include "../base.php"; ?>

<nav class="navbar navbar-expand-md p-0 m-0 navbar-dark bg-dark shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fs-5" href="<?php baseUrl("index.php"); ?>">
            <img
                src="{{ app.logo }}"
                alt="App Logo"
                width="40"
                height="40"
                class=""
            />
            {{ app.name }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navba" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item btn-group">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> Account </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Account Settings
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php baseUrl("auth/logout.php"); ?>">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>