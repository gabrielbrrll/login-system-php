<?php

    if(isset($_SESSION['u_id'])) {
        echo "Welcome, ";
        echo $_SESSION['u_first']." ".$_SESSION['u_last']."!";

            // Create database connection
        $db = mysqli_connect("localhost", "root", "", "loginsystem");

        // Initialize message variable
        $msg = "";

            // If upload button is clicked ...
        if (isset($_POST['upload'])) {
            // Get image name
            $image = $_FILES['image']['name'];
            // Get text
            $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $property_type = mysqli_real_escape_string($db, $_POST['property_type']);

            // image file directory
            $target = "images/".basename($image);

            $sql = "INSERT INTO properties (property_type, image, image_text, title) VALUES ('$property_type', '$image', '$image_text', '$title')";
            // execute query
            mysqli_query($db, $sql);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else{
                $msg = "Failed to upload image";
            }
        }

        $result = mysqli_query($db, "SELECT * FROM properties");  

        ?>

        <!-- form -->

        <form method="POST" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <br>
            <div>
                <input type="file" name="image">
                <select name="property_type" value="project-name">
                    <option value="Ayala Land">Ayala Land</option>
                    <option value="Camella">Camella</option>
                    <option value="St. Catherine Realty">St. Catherine Realty</option>
                    <option value="Filinvest">Filinvest</option>
                    <option value="Moldex">Moldex</option>
                </select>
            </div>
            <div>
                <input type="text" name="title" placeholder="title">
            </div>
            <div>
                <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Say something about this image..."></textarea>
            </div>
            <div>
                <button type="submit" name="upload">POST</button>
            </div>
        </form>     
    <?php
    } 
    ?>