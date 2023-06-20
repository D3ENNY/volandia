<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <form action="../engine/server//getPage.php" method="GET">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <button type="button" id="adminPanel" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="home"></i>
                        Home
                    </button>
                </li>
                <li>
                    <button type="submit" name="addFly" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="plus-circle"></i>
                        Aggiungi Volo
                    </button>
                </li>
                <li>
                    <button type="submit" name="editFly" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="edit"></i>
                        Modifica volo
                    </button>
                </li>
                <li>
                    <button type="submit" name="addUser" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="user-plus"></i>
                        Aggiungi utente
                    </button>
                </li>
                <li>
                    <button type="submit" name="editUser" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="user-x"></i>
                        Modifica utente
                    </button>
                </li>
                <li>
                    <button type="button" id="home" name="home" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="h-7 w-7 mr-2 text-gray-900 dark:text-white" data-feather="log-out"></i>
                        index page
                    </button>
                </li>
            </ul>
        </div>
    </form>
</aside>
<div class="p-4 sm:ml-64 overflow-scroll">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
