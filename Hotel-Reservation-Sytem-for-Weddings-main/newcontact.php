<?php require_once('connection.php');?>
<?php
$username = $_POST['username'];
$inquiry = $_POST['inquiry'];
$comment = $_POST['textarea'];
?>
<?php

    //set a table variable
    $table_list = "";

    //set query
    $query = 'SELECT * FROM support';

    $table = mysqli_query($connection, $query);

    if ($table){
        while($row = mysqli_fetch_assoc($table)){
            $table_list .= "<tr>";
            $table_list .= "<td>{$row['Id']}</td>";
            $table_list .= "<td>{$row['Username']}</td>";
            $table_list .= "<td>{$row['Inquiry_type']}</td>";
            $table_list .= "<td>{$row['Message']}</td>";
            $table_list .= "</tr>";
        }
    }else {
        echo "Database query failed";
    }
    
    ?>

<?php
        $errors=array();

        if(isset($_POST['submit'])){

            if(empty($_POST['username'])){
                $errors[]='Username is required';
            }
        }
    
    
    ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact support page</title>
        <link rel="stylesheet" href="../css/newcontact.css">
        <script>

    const form = document.getElementById('login-form');

    form.addEventListener('submit', function (event) {
    event.preventDefault(); 

    
    fetch(form.action, {
        method: form.method,
        body: new FormData(form)
    })
    .then(response => response.text())
    .then(data => {
    const messageElement = document.querySelector('.message');
        messageElement.innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
    });

        </script>
    </head>
    <body>
        <header>
        <h3>Grand Royal Hotel</h3>
        <h1 class="sup">Support</h1>
        
        </header>
        <nav>
            <div class="navbar">
                <img src="image/logo.jpg" class="logo">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="package.html">Packages</a></li>
                <li><a href="contactus.html">Contactus</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
            </div>
        </nav>
    
    
        
        

        <div class="mainn">
            <div class="container">
                <form id="login-form" method="post">
                    <label for="id">Id:</label>
                    <input type="text" id="identity" name="id">

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>

                    <div class="select">
                        <label for="password">Inquiry type:</label>
                        <select id="iqtype" name="inquiry" required>
                            <option value=""></option>
                            <option value="technicalissues">Technical Issues</option>
                            <option value="login">Login inquiry</option>
                            <option value="payment">Payment issues</option>
                            <option value="agent">Contact an agent</option>
                        </select>
                    </div>
                    <div class="text">
                        <label for="textarea">Comment:</label>
                        <textarea type="textarea" id="comment" name="textarea" rows="15" cols="80" required></textarea>
                    </div>


                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="message">
            <?php echo "<p>Username: $username</p>";
                    echo "<p>Inquiry Type: $inquiry</p>";
                    echo "<p>Comment: $comment</p>";
                ?> 
                
                <div class="table">
                    <table class="block">
                        <tr>
                            <th>ID_No</th>
                            <th>Username</th>
                            <th>Inquiry_Type</th>
                            <th>Message</th>
                        </tr>

                        
                    
                        <?php echo $table_list;?>
                    </table>
                </div>
    


            </div>



            
        </div>
            <footer>
                <div class="social-col">
                    <div class="social">
                        <p class="findus">Find Us on</p>
                        <a href="https://www.facebook.com/"><img src="../image/facebook.png" alt="facebook icon"></a>
                        <a href="https://www.twitter.com/"><img src="../image/twitter.png" alt="twitter icon"></a>
                        <a href="https://www.instagram.com/"><img src="../image/instagram.png" alt="instagram icon"></a>
                        <a href="https://lk.linkedin.com/"><img src="../image/linkedin.png" alt="linkdin icon"></a>
                    </div>
                    <div class="contact">
                            <box class="box">
                                <div class="details">
                                
                                    <h2>Contact Our Support Agent</h2>
                                    <p>Tel      - 0115656566</p>
                                    <p>E-mail   - Grandroyal@gmail.com</p>
                                    <p>Whatsapp - 0775656566</p>
                                </div>
                            </box>
                    </div>
                </div>
                
            </footer>
        




        
    </body>

</html>
<?php mysqli_close($connection); ?>
