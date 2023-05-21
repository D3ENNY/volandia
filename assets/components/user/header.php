<?php
    session_start();
    if(isset($_SESSION['userData']))
        $userData = json_decode($_SESSION['userData']);
?>
<header class="bg-slate-100 border border-b-4 border-slate-400">
    <div class="w-4/5 mx-auto py-6 flex justify-between items-center ">
        <div>
            <h1 class="text-2xl text-gray-800 font-bold" style="min-width: max-content; margin-left: -25px;">
                <a id="home">Road Trip</a>
            </h1>
        </div>
        <!-- menu -->
        <div>
            <ul class="flex" style="margin-right: -35px;" id="menuItems">
                <?php
                    if((isset($userData) && !strpos($userData[0] -> email, '@roadtrip.it')) || !isset($userData))
                        echo '
                        <li class="mx-4 py-1">
                            <span class="font-bold text-gray-700">
                                <a id="home">Home</a>
                            </span>
                        </li>';
                    else if(isset($userData) && strpos($userData[0] -> email, '@roadtrip.it'))
                        echo '
                        <li class="mx-4 py-1">
                            <span class="font-bold text-gray-700">
                                <a id="adminPanel">Admin Panel</a>
                            </span>
                        </li>';
                ?>
                <li class="mx-4 py-1">
                    <span class="font-medium text-gray-500">Categories</span>
                </li>
                <li class="mx-4 py-1">
                    <span class="font-medium text-gray-500">Contact</span>
                </li>
                <li class="mx-4">
                    <img class="w-8 rounded-full -pb-6" src="" alt="icon" id="user">
                </li>
            </ul>

            <div class="border border-blue-900 w-52 p-4 z-50 fixed bg-slate-200 ml-32 mt-3 rounded-lg hidden" id="account">
                <?php

                if (!isset($_SESSION['username']))
                    echo '
                    <div class="grid grid-row-2">
                        <button class="border border-slate-500 hover:bg-slate-300 rounded-full inline-flex justify-center mb-2" id="register">
                            Registrati
                            <span>
                                <i data-feather="user-plus"></i>
                            </span>
                        </button>
                        <button class="border border-slate-500 hover:bg-slate-300 rounded-full inline-flex justify-center" id="login">
                            Login
                            <span>
                                <i data-feather="log-in"></i>
                            </span>
                        </button>
                    </div>
                    ';
                else echo '<p class="p-1 mb-2 text-sm"> benvenuto ' . $_SESSION['username'] . '</p>'.     '
                           <hr class="h-px mb-1 bg-gray-200 border-0 dark:bg-gray-700" />
                           <form action="engine\server\logout.php" method="get">
                                <button class="border border-slate-500 hover:bg-slate-300 rounded-full inline-flex justify-center" id="logout">
                                    Logout
                                    <span>
                                        <i data-feather="log-out"></i>
                                    </span>
                                </button>
                            </form>';
                ?>
            </div>
        </div>
    </div>
</header>