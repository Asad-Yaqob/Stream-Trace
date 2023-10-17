<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212121;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .feedback-container {
            background-color: #333333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        
        .form-group label {
            font-weight: bold;
            color: #f44336;
        }
        
        .form-control {
            background-color: #444444;
            border-color: #555555;
            color: white;
        }
        
        .submit-btn {
            background-color: #f44336;
            border-color: #f44336;
            color: white;
        }
        
        .submit-btn:hover {
            background-color: #d32f2f;
            border-color: #d32f2f;
        }
    </style>
    <title>Feedback Form</title>
</head>
<body>
        <div class="container mt-5">
            <h1 class="text-start">Feedback form</h1>
            <div class="row mt-5">
                <div class="col-xl-6">
                <form action="" method="post">
            <div class="mb-3">
                <div class="row">
                    <div class="col-xl-6">
                        <label for="first" class="form-label">First Name</label>
                        <input type="text" name="first" class="form-control" id="first" required>
                    </div>
                    <div class="col-xl-6">
                        <label for="last" class="form-label">Last Name</label>
                        <input type="text" name="last" class="form-control" id="last" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback:</label>
                <textarea class="form-control" name="msg" id="feedback" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn submit-btn" name="feedback">Submit</button>
        </form>
                </div>
            </div>
        </div>
        
    <?php
    if (isset($_POST['feedback'])) {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $msg = $_POST['msg'];
        
        try {
            $query = $pdo->prepare("INSERT INTO feed (first, last, email, msg, contact) VALUES (:first, :last, :email, :msg, :contact)");
            $query->bindParam(':first', $first);
            $query->bindParam(':last', $last);
            $query->bindParam(':email', $email);
            $query->bindParam(':msg', $msg);
            $query->bindParam(':contact', $contact);
            $query->execute();
            
            $to = "babulbrohi43@example.com"; 
            $subject = "Feedback Form";
            $headers = "From: $first $last <$email>";
            mail($to, $subject, $msg, $headers);
            
            echo "<script>alert('Thanks for your feedback!'); window.location.href='main.php';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
    ?>
</body>
</html>
