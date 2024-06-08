<?php @session_start();

require_once('../classes/common/Database.php');

$db = new Database();

if (isset($_GET["serviceId"])) {

    $serviceId = $_GET["serviceId"];
    $ssName = $_SESSION["serviceSeekerName"];

    $query = "SELECT service_seeker_id FROM table_service_seeker WHERE name = '$ssName'";
    $getUserId = $db->getMultipleData($query);

    $ssId = $getUserId[0]['service_seeker_id'];

    // echo $ssId;
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
    <h3 class="text-center text-xl font-bold text-[#6D2932] block pt-10">
        Almost done 🤗 &<span class="py-1 px-3 ">Feel free to share your experience</span>

    </h3>
    <small class=" text-[#8a535a] text-center block mt-3">It will help us to enhance our service in the future to our valuable Service Seekers.</small>
    <div class="bg-[#e3dbd1] w-full max-w-[600px] mx-auto rounded-lg p-6 mt-4">
        <form method="post" id="feedback-form">
            <h3 class="text-[#6D2932] font-semibold text-center text-md-start">
                Send us some feedback!
            </h3>

            <input type="hidden" name="service-id" id="" value="<?php echo $serviceId; ?>" />
            <input type="hidden" name="ss-id" value="<?php echo $ssId; ?>">

            <!-- Subject -->
            <div class="mb-3 w-full">
                <label for="subject" class="block mb-1 text-[#6D2932]">Subject<span class=" text-red-500">*</span></label>
                <div>
                    <input type="text" name="subject" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5] capitalize" id="subject" placeholder="Ex: Nice, Ordinary, Best" required="required" autocomplete="off" />
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

            <div class="pt-3 w-full flex items-center gap-x-3 align-items-center gap-2">
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
        $(document).ready(function() {

            const feedbackFormEl = document.querySelector("#feedback-form");

            const validator = new window.JustValidate(feedbackFormEl);

            // Subject
            validator.addField(
                "#subject",
                [{
                        rule: "required",
                    },
                    {
                        rule: "minLength",
                        value: 3,
                    },
                    {
                        rule: "maxLength",
                        value: 10,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                }
            );

            validator.addField("#feedback",
                [{
                        rule: "required",
                    },
                    {
                        rule: "minLength",
                        value: 20,
                    },
                    {
                        rule: "maxLength",
                        value: 255,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.addField("#rating",
                [{
                        rule: "required",
                    },
                    {
                        rule: "number",
                    },
                    {
                        rule: "minLength",
                        value: 1,
                    },
                    {
                        rule: "maxLength",
                        value: 4,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.onSuccess((e) => {
                e.preventDefault();

                $(document).on("submit", "#feedback-form", function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    const formData = new FormData(feedbackFormEl);

                    formData.append("request", "addServiceFeedback");

                    $.ajax({
                        type: "POST",
                        url: "../ajax-file/ajax.php",
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(response) {
                            // console.log(response);
                            const jsonData = JSON.parse(response);
                            const {
                                status,
                                message
                            } = jsonData[0];

                            if (status == "200") {
                                Swal.fire({
                                    title: "Feedback Registered",
                                    text: `Thank you! ${message}`,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "/skill-wave-service-hiring-app/service-seekers/dashboard.php?hiringProcess"
                                        $("#feedback-form")[0].reset();
                                    }
                                });
                            } else if (status == "500") {
                                Swal.fire({
                                    title: "Technical error!",
                                    text: `Sorry! ${message}`,
                                    icon: "error"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "/skill-wave-service-hiring-app/service-seekers/dashboard.php?hiringProcess"
                                        $("#feedback-form")[0].reset();
                                    }
                                });

                            }

                        },
                        error: function(xhr, status, error) {
                            console.log("Status: " + status);
                            console.log("XHR Response: " + xhr.responseText);
                            console.error("Error: " + error);
                        }
                    })
                })


            })


        })
    </script>
</body>

</html>