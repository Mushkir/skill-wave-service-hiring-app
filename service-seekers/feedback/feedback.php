<?php @session_start();
if (isset($_GET["serviceId"])) {

    $serviceId = $_GET["serviceId"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?php echo $serviceSeekerName; ?>'s Dashboard | Skill-Wave</title>

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- JustValidateDev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- DataTable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="" id="container">
    <h3 class="text-center text-xl font-bold text-[#6D2932] block pt-5">
        Almost done 🤗 &<span class="py-1 px-3 ">Feel free to share your experience</span>

    </h3>
    <small class=" text-[#8a535a] text-center block mt-3">It will help us to enhance our service in the future to our valuable Service Seekers.</small>
    <div class="bg-[#e3dbd1] w-full max-w-[600px] mx-auto rounded-lg p-6 mt-4">
        <form method="post" id="passenger-feedback-form">
            <h3 class="text-[#6D2932] font-semibold text-center text-md-start">
                Send us some feedback!
            </h3>

            <!-- Subject -->
            <div class="mb-3 w-full">
                <label for="subject" class="block mb-1 text-[#6D2932]">Subject<span class=" text-red-500">*</span></label>
                <div>
                    <input type="text" name="subject" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" id="subject" placeholder="Ex: Nice, Ordinary, Best" required="required" />
                </div>
            </div>

            <!-- Feedback -->
            <div class="mb-3 w-full">
                <label for="feedback" class="block mb-1 text-[#6D2932]">Feedback<span class=" text-red-500">*</span></label>
                <div>
                    <textarea name="feedback" id="feedback" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" rows="10" placeholder="Describe your thoughts / opinions..."></textarea>
                </div>
            </div>

            <!-- Rating -->
            <div class="mb-3 w-full">
                <label for="rating" class="block mb-1 text-[#6D2932]">Rating (Out of 5)<span class=" text-red-500">*</span></label>
                <div>
                    <input type="text" name="rating" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" id="rating" placeholder="Ex: 4.9" required="required" />
                </div>
            </div>

            <div class="pt-3 w-100 d-md-flex align-items-center gap-2">
                <button type="submit" class="bg-[#6D2932] px-5 py-1.5 text-white rounded-md hover:bg-[#572028] w-100 mb-3">
                    Submit
                </button>

                <button type="button" class=" border-[#6D2932] text-[#6D2932] border px-5 py-1.5 hover:text-white rounded-md hover:bg-[#572028] w-100 mb-3">
                    Skip
                </button>
            </div>
        </form>
    </div>

    <!-- DayJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery script -->
    <script>
        $(document).ready(function() {})
    </script>
</body>

</html>


<div class="mt-4 feedback-responsive mx-auto">
    <form>
        <h3 class="pb-2 fw-bold text-center text-md-start">
            Send us some feedback!
        </h3>
        <div class="align-items-center gap-5">
            <!-- Subject -->
            <div class="mb-3 w-100">
                <label for="subject" class="form-label">Subject<span class="text-danger">*</span></label>
                <div>
                    <input type="text" name="subject" class="form-control shadow-none" id="subject" placeholder="Ex: Nice, Ordinary, Best" required="required" />
                </div>
            </div>

            <!-- Feedback -->
            <div class="mb-3 w-100">
                <label for="feedback" class="form-label">Feedback<span class="text-danger">*</span></label>
                <div>
                    <textarea name="feedback" id="feedback" class="form-control" rows="10" placeholder="Describe your thoughts / opinions..."></textarea>
                </div>
            </div>

            <!-- Rating -->
            <div class="mb-3 w-100">
                <label for="rating" class="form-label">Rating (Out of 5)<span class="text-danger">*</span></label>
                <div>
                    <input type="text" name="rating" class="form-control shadow-none" id="rating" placeholder="Ex: 4.9" required="required" />
                </div>
            </div>
        </div>

        <!-- Create Account Button -->
        <div class="pt-3 w-100 d-md-flex align-items-center gap-2">
            <button type="submit" class="btn bg-warning border-black w-100 mb-3" onclick="redirectToDashboard()">
                Submit
            </button>

            <!-- Skip Button -->
            <a href="../passenger-homepage.php?history" id="btn-skip" class="btn bg-secondary text-light w-100 mb-3">
                Skip
            </a>
            <!-- <button type="button" id="btn-skip" class="btn bg-secondary text-light w-100 mb-3">
                        Skip
                    </button> -->
        </div>
    </form>
</div>