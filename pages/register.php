<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/validator@latest/validator.min.js"></script>
    <!--FILE JS-->
    <script src="../engine/client/validation.js"></script>
    <title>Login - Road Trip</title>
</head>
<body>
    <div class="flex justify-center items-center w-full h-screen bg-slate-200">
        <!-- COMPONENT CODE -->
        <div class="container mx-auto my-4 px-4 lg:px-20 md:px-10">
            <form action="../engine/server/register.php" method="post">
                <div class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl bg-white">
                    <div class="flex">
                        <h1 class="font-bold uppercase text-5xl">Register</h1>
                    </div>
                    <div class="grid grid-cols-1 gap-5 mt-5">
                    <label class="font-bold text-gray-700 my-4" for="mail"> username:
                            <input class="w-full bg-gray-100 border border-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" placeholder="MarioRossi84" type="text" name="username" id="" required>
                        </label>
                        <label class="font-bold text-gray-700 my-4" for="mail"> email:
                            <input class="w-full bg-gray-100 border border-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" placeholder="email@example.com"type="email" name="email" id="email" required>
                        </label>
                        <label class="font-bold text-gray-700 my-2" for="password">password:
                            <input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" placeholder="********" type="password" name="password" id="password" required>
                        </label>
                    </div>
                    <div class="grid grid-cols-2 w-full my-2 gap-3 sm:grid-cols-1 md:grid-cols-2 lg:w-1/2">
                        <input class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" value="Login" id="login">
                        <a class="text-gray-500" href="login.php">hai giù un account? <span class="underline underline-offset-1">Loggati</span></a>
                    </div>
                </div>  
            </form>

            <div class="w-full lg:-mt-96 lg:w-2/6 px-8 py-9 ml-auto bg-blue-900 rounded-2xl">
                <div class="flex flex-col text-white">
                    <h1 class="font-bold uppercase text-4xl">PRENOTA IL TUO VOLO</h1>
                    <p class="text-gray-400">Vola con noi verso la tua cità preferita!<br />inizia a creare il tuo
                        accouunt
                    </p>

                    <div class="flex my-4 w-2/3 lg:w-1/2">
                        <div class="flex flex-col">
                            <h2 class="text-2xl">Volandia</h2>
                            <p class="text-gray-400">5555 Tailwind RD, Pleasant Grove, UT 73533</p>
                        </div>
                    </div>

                    <div class="flex my-4 w-2/3 lg:w-1/2">
                        <div class="flex flex-col">
                            <h2 class="text-2xl">Call Us</h2>
                            <p class="text-gray-400">Tel: xxx-xxx-xxx</p>
                            <p class="text-gray-400">Fax: xxx-xxx-xxx</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>