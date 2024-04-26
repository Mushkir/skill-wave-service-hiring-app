<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Find Service Providers | Skill-Wave</title>

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>


    <!-- * Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- * Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- * Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- * TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- Footer Alignment CSS -->
    <style>
        a:is(:link, :active, :visited).activeState {
            background: #6D2932;
            color: #C7B7A3;
            border-radius: 4px;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] bg-[#e8e2da] min-h-screen">
        <section class="mt-10 sm:mt-20 px-3 sm:px-5 md:px-20">
            <!-- Search bar -->
            <div class="max-w-7xl mx-auto">
                <form class="w-full" action="" id="searchServiceProvidersForm">
                    <div class="relative w-full text-primary-color-10">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none w-full">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div>
                            <input type="search" id="search-sp" name="search-sp" class="block w-full p-4 ps-10 text-sm rounded-md bg-cus-maron text-primary-color-10 placeholder-primary-color-10 focus:ring-white" placeholder="Ex: Mechanic, Plumber ..." required />
                        </div>
                        <!-- <button type="submit" class="absolute end-2.5 bottom-2.5 bg-primary-color-10 font-medium rounded text-sm px-5 py-2 text-cus-maron hover:bg-primary-color-9">
                            Search
                        </button> -->
                    </div>
                </form>
            </div>


            <div class="mb-10 flex items-center justify-between flex-wrap sm:gap-10" id="serviceProviderWrapper">
                <!-- Profile card component -->

            </div>

        </section>
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <footer class="bg-cus-maron mt-auto">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm sm:text-center text-primary-color-10">© 2024
                <a href="./index.html" class="hover:underline">Skill-Wave™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Flowbite CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery Script -->
    <script>
        $(document).ready(function() {

            showAllServiceProviders()

            function showAllServiceProviders() {
                $.ajax({

                    url: './ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "showAllServiceProviders"
                    },
                    success: function(response) {
                        $("#serviceProviderWrapper").html(response)
                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            $("#search-sp").keyup(function() {

                const searchInputEl = $(this).val()

                if (searchInputEl.trim() != "") {

                    $.ajax({

                        url: './ajax-file/ajax.php',
                        method: 'POST',
                        data: {
                            "request": "searchSp",
                            "searchSp": searchInputEl
                        },
                        success: function(response) {

                            console.log(response);
                            $("#serviceProviderWrapper").html(response)
                        },
                        error: function(xhr, status, error) {}
                    })
                } else {

                    showAllServiceProviders();
                }
            })


        })
    </script>
</body>

</html>