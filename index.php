<?php

session_start();

// Only change code below this line

// instruction: require all the files you need here.
require "includes/class-contact-form.php";
require "includes/class-database.php";


// Only change code above this line

if (class_exists('ContactForm'))
    $contact_form = new ContactForm();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Only change code below this line

    // instruction: get the data from the form and pass it to the submit method
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $auth = new ContactForm(
        $name,
        $email,
        $message
    );

    $error = $auth->submit(
        $name,
        $email,
        $message
    );

    // [bonus point] instruction: if the data is inserted into database, send email to admin email via SMTP API (postmark, mailgun, etc.)


    // Only change code above this line
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <style type="text/css">
        body {
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-2 mx-auto" style="max-width: 700px;">
        <div class="min-vh-100">

            <!-- contact form -->
            <div class="card">
                <div class="card-body">

                    <h5 class="text-center pb-2">Contact Us</h5>

                    <!-- Only change code below this line -->

                    <!-- Instruction: Put error message or success message here -->
                    <?php if (isset($error['status']) && $error['status'] == 'success') : ?>
                        <div class="alert alert-info" role="alert">
                            <?= $error['message']; ?>
                        </div>
                    <?php endif ?>

                    <?php if (isset($error['status']) && $error['status'] == 'error') : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error['message']; ?>
                        </div>
                    <?php endif ?>
                    <!-- Only change code above this line -->

                    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Send
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>