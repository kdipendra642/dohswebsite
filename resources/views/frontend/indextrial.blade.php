<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sticky Header Example</title>
    <style>
        body {
            margin: 0; /* Remove default body margin */
        }
        .header {
            position: fixed; /* Stick to the top */
            top: 0; /* Align to the top */
            left: 0;
            right: 0;
             /* Header background color */
            color: white;
            padding: 20px; /* Padding for the header */
            z-index: 1000; /* Ensure it stays above other content */
        }
        .header img {
            width: 100px; /* Adjust size as needed */
            vertical-align: middle; /* Align vertically with text */
        }
        .content {
            margin-top: 100px; /* Space for header height */
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-left" style="background-color: #264f8b;">
                    <img src="https://giwmscdnone.gov.np/static/assets/image/Emblem_of_Nepal.png" alt="Logo">
                    <h3>नेपाल सरकार</h3>
                    <h5>सञ्चार तथा सूचना प्रविधि मन्त्रालय</h5>
                    <h5>सूचना प्रविधि विभाग</h5>
                    <p>गैरिहिङ—३, तिनकुने, काठमाण्डौ</p>
                </div>
                <div class="col-md-6 text-right"
                    style="
                    background-image: url('https://giwmscdn.prixacdn.net/media/albums/topbg_CUCDohGKGe.png');
                    background-repeat: no-repeat;
                    "
                    >
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Your main content goes here -->
        <p>This is the main content of the page.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
