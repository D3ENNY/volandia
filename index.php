<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <!--FILE JS-->
    <script src="engine/client/script.js" defer></script>
    <script src="engine/client/validationHome.js"></script>
    <!--STYLE-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/responsive.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900&display=swap" rel="stylesheet" />
    <title>Road Trip</title>
</head>

<body class=" min-h-screen">
    <?php require_once("assets/components/user/header.php");?>
    <div class="textino">
        <h1 class="fontino">Aggiungi più avventura <br/> alla tua vita</h1>
    </div>
    <div class="w-[90%] flex ml-auto relative">
            
        <section class="py-16 px-16 hero w-full flex justify-between">
            <div class="indicators">
                <!-- Indicators area -->
                <h2 class="text-3xl tracking-wide font-extrabold text-white">01</h2>
                <div class="flex flex-col mt-8 items-center">
                    <div class="h-2 w-2 border border-white rounded-full mb-4"></div>
                    <div class="h-2 w-2 border border-white bg-white rounded-full mb-4"></div>
                    <div class="h-2 w-2 border border-white rounded-full mb-4"></div>
                    <div class="h-2 w-2 border border-white rounded-full mb-4"></div>
                </div>
                <div class="flex flex-col items-center text-white mt-8">
                    <i data-feather="chevron-up" class="mb-3 h-7 w-7"></i>
                    <i data-feather="chevron-down" class=" h-7 w-7"></i>
                </div>
            </div>
        </section>
        <!-- floating call to action -->
        <div class="absolute py-6 px-8 items-center w-3/4 shadow-xl bg-white floating-sub-hero">

            <form action="engine/server/getfly.php" method="get" id="formIndex">
                <div class="grid grid-cols-7 gap-8">
                    <div class="col-span-2">
                        <label for="departure" class="flex flex-col mr-2">
                            Partenze:
                            <input type="text" name="departure" placeholder="Aeroporto di partenza" class="rounded-full border border-gray-400 px-2 py-1 w-full" required>
                        </label>
                    </div>
                    <div class="col-span-2">
                        <label for="landing" class="flex flex-col mr-2">
                            Arrivi:
                            <input type="text" name="destination" placeholder="Aeroporto d'arrivo" class="rounded-full border border-gray-400 px-2 py-1 w-full" required>
                        </label>
                    </div>
                    <div>
                        <label for="landing" class="flex flex-col mr-2">
                            Andata:
                            <input type="text" name="departureDate" placeholder="partenza" class="rounded-full border border-gray-400 px-2 py-1 w-full" onfocus="(this.type='date')" onblur="(this.type='text')" id="departureDate" required>
                        </label>
                    </div>
                    <div>
                        <label for="landing" class="flex flex-col mr-2">
                            Ritorno:
                            <input type="text" name="returnDate" placeholder="ritorno" class="rounded-full border border-gray-400 px-2 py-1 w-full" onfocus="(this.type='date')" id="returnDate" onblur="(this.type='text')">
                        </label>
                    </div>
                    <div class="self-end overflow-hidden">
                        <input type="submit" value="Cerca" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-full ml-auto w-full">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once('assets/components/user/footer.php');?>
</body>

</html>