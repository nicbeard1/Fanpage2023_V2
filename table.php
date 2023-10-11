<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Legion of Justice Fansite</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">The Legion of Justice Fansite</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php">Characters</a></li>
                    </ul>
                </div> 
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold"> The Legion of Justice </h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">The Legion of Justice are a team of OC superheroes who use their powers to protect Metcalfe from danger. Through their adventures, the Legion members will make allies, enemies and discoveries about their respective pasts and their very powers. </p>
                        <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- characters -->
        <section class="page-section" id="about">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Table: name and powers</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                                    <!-- table -->
            <tbody>
                <table class="table table-dark table-striped table-hover">
                <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">powers</th>
                </tr>
                </thead>
                    <tbody>
                            <?php
                                function getDBConnection() {
                                    // get connection to local MySQL database
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "eternalsfansite";

                                    // Create connection
                                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                                    // Check connection
                                    if (!$conn) {
                                      die("Connection failed: " . mysqli_connect_error());
                                    }
                                    return $conn;
                                }

                                function getData() {
                                    $conn = getDBConnection();
                                    $sql = "SELECT * FROM tlojpowers ";
                                    // WHERE name=
                                    $result = mysqli_query($conn,$sql);

                                    if (mysqli_num_rows($result) > 0) {    
                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<tr> ";
                                                echo " <td>" . $row["id"] . "</td>";
                                                echo " <td>" . $row["name"] . "</td>";
                                                echo " <td>" . $row["powers"] . "</td>";
                                                echo "</tr>\n";       // Add a newline at the end
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                    mysqli_close($conn);    // remember to close db connection
                                }

                                getData()
                            ?>
                            </tbody>
                        </table>
                    </tbody>
                    <h1>Origins...</h1>
                    <p>After the death of Elijah, Amos decided to investigate the origins of the Legion's powers. Through his investigation, Amos discovered a top-secret military division that came into posession of a collection of totems, objects with no discernible history in human mythology or religion, that could grant a person who holds them superpowers. <br><br>

                    With WWI looming on the horizon, the british government decided to initiate Project:Totembearer in Metcalfe, a group of people recruited to use the totems during the war on missions. the project was comprised of four teams: Valour, Power, Bravery and Justice. after the war, those involved with the project were given a decision: leave the organisation under an NDA, without their totems, or stay and continue to research the objects. <br><br>

                    While Valour, Bravery and Power disbanded and left their totems behind, per their agreement, the members of Justice discovered that the totems were able to physically change a persons makeup to be able to use the powers the totem provided. Finally, the project was discontinued before the start of WWII, citing how the Armed forces had evolved in the past 20 years. <br><br>

                    But there was one detail in Amos' research that shook him to the core: the members of Justice were the Legion of Justice's grandparents, whos powers went dormant from not being used after the project was discontinued. <br><br>

                    When Boost and Crossbolt are sent back to 1910's Metcalfe, they spy on the Ethereals, a race of superhumans from an alternate dimension, who leave a chest containing the totems in the middle of a field. Time Mask rescues them just before the police arrive to investigate. </p>
                    </section>
                </div>
            </div>
        </section>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Return to the login page</h2>
                <a class="btn btn-light btn-xl" href="index.php">log out</a>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Red Ransom</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
