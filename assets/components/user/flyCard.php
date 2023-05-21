<form action="" method="get" id="flyCard">
    <div class="block p-6 bg-white rounded-2xl shadow hover:bg-gray-100 grid grid-cols-5 gap-5" id="flyCardDiv">
        <div class="flex items-center flex-col justify-center">
            <p class="text-xs text-center mx-auto">Compagnia Aerea:</p>
            <p><?php echo $fly['Compagnia'];?></p>
        </div>
        <div class="flex items-center flex-col justify-center">
            <p class="text-xs text-center mx-auto">Orario Partenza:</p>
            <?php echo date("H:i", strtotime($fly['DataPartenza']));?>
        </div>
        <div class="flex items-center imgPlane mix-blend-multiply">
            <object data="../assets/img/airplane.svg" width="100%" height="40" viewBox="0 0 100 90" preserveAspectRatio="none"></object>
        </div>
        <div class="border-r-2 border-gray-600 flex items-center flex-col justify-center">
            <p class="text-xs text-center mx-auto mr-7">Orario Arrivo</p>
            <p><?php echo date("H:i", strtotime($fly['DataArrivo']));?></p>
        </div>
        <div class="grid grid-row-2 flexjustify-content-center">
            <div class="justify-content-center border-b p-0 border-gray-600 flex items-center">$PREZZO</div>
            <div class="w-16 lg:w-28">
                <input class="bg-green-600 rounded-lg p-2 mt-2 text-white w-full truncate flex justify-center"
                    type="submit" value="vedi offerta">
            </div>
        </div>
    </div>
</form>