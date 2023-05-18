<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CDN-->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
  <script src="https://unpkg.com/validator@latest/validator.min.js"></script>
  <!--FILE JS-->
  <script src="../engine/client/validation.js"></script>
  <title>Register - Road Trip</title>
</head>

<body class="bg-slate-200">
  <div class="flex justify-center items-center w-100">
    <!-- COMPONENT CODE -->
    <div class="container my-4 mx-auto px-4 lg:px-20">
      <form action="../engine/server/register.php" method="post">
        <div class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl bg-white">
          <div class="flex">
            <h1 class="font-bold uppercase text-5xl">Register new <br /> passenger</h1>
          </div>
          <div class="my-4">
            <label class="font-bold text-gray-700" for="fc"> Fiscal Code:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="XXXYYY00X00Y000X" name="fc" id="fc" required />
            </label>
          </div>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <label class="font-bold text-gray-700" for="name"> First Name:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="Mario" name="name" id="name" required />
            </label>
            <label class="font-bold text-gray-700" for="surname"> Last Name:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="Rossi" name="surname" id="surname" required />
            </label>
            <label class="font-bold text-gray-700" for="date"> Born Date:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="10/03/2000" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"required>
            </label>
            <label class="font-bold text-gray-700" for="nationality"> Nationality:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="italia" name="nationality" id="nationality" required />
            </label>
            <label class="font-bold text-gray-700" for="route_type"> Route Type:
              <select class="w-full bg-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" style="color:gray" name="route_type" id="route_type" required>
                <option value="" disabled selected>route</option>
                <option value="route">route</option>
                <option value="avenue">avenue</option>
                <option value="place">place</option>
              </select>
            </label>
            <label class="font-bold text-gray-700" for="route"> Route:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="garibaldi" name="route" id="route" required />
            </label>
            <label class="font-bold text-gray-700" for="city"> City:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="milano" name="city" name="city" id="city" required />
            </label>
            <label class="font-bold text-gray-700" for="number"> House Number:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="10" name="number" id="number" required />
            </label>
            <label class="font-bold text-gray-700" for="email"> E-mail:
              <input class="w-full bg-gray-100 border border-1 border-gray-100 text-gray-900 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="email" placeholder="email@example.it" id="email" name="email" required />
            </label>
            <label class="font-bold text-gray-700" for="password"> password:
              <input class="w-full bg-gray-100 text-gray-900 border border-1 border-gray-100 mt-1 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="password" placeholder="********" id="password" name="password" required />
            </label>
            </div>
          <div class="grid grid-cols-2 mt-4 my-2 w-3/4 gap-4">
            <input class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" value="Add passenger" id="register">
            <a class="text-gray-500" href="login.html">hai già un account? <span class="underline underline-offset-1">Loggati</span></a>
          </div>
        </div>
      </form>

      <div class="w-full lg:-mt-80 lg:mb-0 lg:w-2/6 px-8 py-2 ml-auto bg-blue-900 rounded-2xl">
        <div class="flex flex-col text-white">
          <h1 class="font-bold uppercase text-4xl my-4">PRENOTA IL TUO VOLO</h1>
          <p class="text-gray-400">Vola con noi verso la tua cità preferita!<br />inizia a creare il tuo accouunt
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