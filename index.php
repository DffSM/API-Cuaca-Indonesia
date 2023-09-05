  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hayu Tobat</title>
    <link rel="icon" type="image/x-icon" href="dist/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="dist/css/styles.css" rel="stylesheet" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">HAYU TOBAT</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#solat">Jadwal Sholat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Al-Qur'an</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Lu Pasti Bisa</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Percaya Sama gue</h2>
                    <a class="btn btn-primary" href="#solat">Kuy Mulai</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="solat">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Tenang Allah maha pemaaf ko..</h2>
                    <p class="text-white-50">
                        "Sesungguhnya Allah mengampuni dosa-dosa semuanya. Sesungguhnya Dia-lah Yang Maha Pengampun lagi Maha Penyayang. Dan kembalilah kamu kepada Tuhanmu, dan berserah dirilah kepada-Nya sebelum datang azab kepadamu kemudian kamu tidak dapat ditolong (lagi).” <br>
                        (QS. Az Zumar {39} : 53-54)

                    </p>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <h2 class="text-white mb-4">Nih Mending lu liat jadwal sholat dulu</h2>
                    <br>



                    <?php
                    $url = file_get_contents('https://raw.githubusercontent.com/lakuapik/jadwalsholatorg/master/kota.json');
                    $kota = json_decode($url, true);
                    // var_dump($kota);
                    ?>
                    <div>
                        <br>
                        <h6 class="text-white mb-4">Pilih Kota lu dulu yak</h6>

                        <form action="" method="post">
                            <select name="kota">
                                <option value="">Pilih Kota</option>
                                <?php

                                foreach ($kota as $key => $value) {
                                    echo "<option value='$value'>" . ucfirst($value);
                                    "</option>";
                                }
                                ?>
                            </select>
                            <button type="submit">Pilih</button>
                    </div>
                    </form>
                    <div>
                        <br>
                        
                        <br>
                        
                        <?php

                        if (!isset($_POST['kota'])) {
                            $kota = 'bandung';
                        } else {
                            $kota = $_POST["kota"];
                        }
                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://muslimsalat.p.rapidapi.com/$kota.json",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                                "X-RapidAPI-Host: muslimsalat.p.rapidapi.com",
                                "X-RapidAPI-Key: 46fae1d379msh4ab3095bfdd85acp1e4504jsnb0df66e6ff0c"
                            ],
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        }

                        $response = json_decode($response, true);

                        ?>
                        <div>
                        
                            <h5 class="text-white text-lg-end"><iframe class="iframe-lg-end" src="https://free.timeanddate.com/clock/i8gdnqha/n437/tlid38/fs20/fcfff/tct/pct/tt0" frameborder="0" width="343" height="25" allowtransparency="true"></iframe></h5>
                        
                            <h5 class="text-white text-lg-start"> Jadwal Solat kota <?php echo $kota?></h5>
                    </div>
                        <table class="table table-dark">
                            <thead>
                                <tr>

                                    <th scope="col">Subuh</th>
                                    <th scope="col">Dzuhur</th>
                                    <th scope="col">Asar</th>
                                    <th scope="col">Magrib</th>
                                    <th scope="col">Isya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td><?php echo $response['items'][0]['fajr'] ?></td>
                                    <td><?php echo $response['items'][0]['dhuhr'] ?></td>
                                    <td><?php echo $response['items'][0]['asr'] ?></td>
                                    <td><?php echo $response['items'][0]['maghrib'] ?></td>
                                    <td><?php echo $response['items'][0]['isha'] ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div>
                        <?php
                        $urlkiblat = file_get_contents('https://time.siswadi.com/qibla/?lat=' . $response['latitude'] . '&lng=' . $response['longitude'] . '');
                        $kiblat = json_decode($urlkiblat, true);
                        // var_dump($kiblat);
                        ?>
                        <img src="<?php echo $kiblat['data']['image'] ?>" alt="kiblat">


                    </div>
                    <div>
                        <br>
                    </div>

                </div>
            </div>
            <!-- <img class="img-fluid" src="dist/assets/img/alquran.png" width="700px" alt="..." /> -->
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5 ">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col gx-0 mb-4 mb-lg-5 text-center ">
                    <h2>Jangan Lupa Baca Al-Qur'an juga yee</h2>
                    <h6>kalo lu ga cakep minimal bisa ngaji lah</h6>
                </div>
                <div>
                <?php
                     $urlalquran = file_get_contents('https://equran.id/api/surat/');
                     $alquran = json_decode($urlalquran, true);
                    //  var_dump($alquran);
                        ?>
                <form action="" method="post">
                            <select name="surat">
                                <option value="">Pilih Surat</option>
                                <?php

                                foreach ($alquran as $key) {
                                    echo "<option value='$key[nomor]'>". ucfirst($key['nama_latin']);
                                    "</option>";
                                }
                                ?>
                            </select>
                            <button type="submit">Pilih</button>
                    </div>
                    </form>
                </div>
                <div>
                    <?php
                if (!isset($_POST['surat'])) {
                            $nosurat = '1';
                            $urlalquran1 = file_get_contents('https://equran.id/api/surat/'.$nosurat);
                            $alquran1 = json_decode($urlalquran1, true);
                        } else {
                            $nosurat = $_POST["surat"];
                            $urlalquran1 = file_get_contents('https://equran.id/api/surat/'.$nosurat);
                            $alquran1 = json_decode($urlalquran1, true);
                            // var_dump($alquran1);
                        }
                    
?>
<div class="col gx-0 mb-4 mb-lg-5 text-center ">
    <h2><?php echo $alquran1['nama_latin'];?></h2>
</div>
                        <table>
                        
                            <thead>
                                <tr>
                                    <th>Arti</th>
                                    <th>Ayat</th>
                                    <th>No</th>
 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        foreach ($alquran1['ayat'] as $quran1) {                         
                                            ?>
                                     
                                    <td><?php echo $quran1['idn'];?></td>
                                    <td><?php echo $quran1['ar'];?></td>
                                    <td><?php echo $quran1['nomor'];?></td>
                                </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                            
                        </table>
                            <br>
                        <br>

                </div>
               
            </div>
           
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white ">Semoga Istiqomah ye!</h2>
                    <h6 class="text-white ">Allah Still Love U</h6>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            
                        


                            <i class="fab fa-instagram text-primary mb-2"></i>
                            <img src="https://scontent.cdninstagram.com/v/t51.2885-19/241237778_255922062924778_5816511543231438151_n.jpg?stp=dst-jpg_s150x150&_nc_ht=scontent.cdninstagram.com&_nc_cat=110&_nc_ohc=SOH-9qPgAlMAX9Q0wqv&edm=APs17CUBAAAA&ccb=7-5&oh=00_AT8Fhj_j9Z6YWUqTIAt6tHTlbZqF6KLE_miEs15YKr796Q&oe=6302EB3D&_nc_sid=978cb9" alt="">
                            <h4 class="text-uppercase m-0">Instagram</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">
                                <a href="https://www.instagram.com/gemjeeh/">@gemjeeh</a>
                                

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
           <br>
           
        </div>
        <div class="text-center">
        <h6 class="text-align-mid">btw kalo ada yang nemu cindo islam DM gue yak</h6>
        </div>
        
        <br><br>
    </section>
   
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="dist/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
 
</body>

</html>