<?php
include('../config.php');
include('../includes/session_management.php');

if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <script type="text/javascript">
        const appURL = '<?php echo APP_URL; ?>';
    </script>
</head>

<body>
    <div class="container">
        <form id="reg-form" form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" id="inputFullname" placeholder="Fullname">
                    <div class="invalid-feedback" id="fullname-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputUsername">Username</label>
                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                    <div class="invalid-feedback" id="username-feedback"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    <div class="invalid-feedback" id="email-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    <div class="invalid-feedback" id="password-feedback"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAbout">About Me</label>
                    <textarea name="about" class="form-control" id="inputAbout" placeholder="About Me" rows="5" style="resize: vertical;"></textarea>
                    <div class="invalid-feedback" id="about-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <select name="city" id="inputCity" class="form-control">
                        <option value="İstanbul">İstanbul</option>
                        <option value="Ankara">Ankara</option>
                        <option value="İzmir">İzmir</option>
                        <option value="Adana">Adana</option>
                        <option value="Adıyaman">Adıyaman</option>
                        <option value="Afyonkarahisar">Afyonkarahisar</option>
                        <option value="Ağrı">Ağrı</option>
                        <option value="Aksaray">Aksaray</option>
                        <option value="Amasya">Amasya</option>
                        <option value="Antalya">Antalya</option>
                        <option value="Ardahan">Ardahan</option>
                        <option value="Artvin">Artvin</option>
                        <option value="Aydın">Aydın</option>
                        <option value="Balıkesir">Balıkesir</option>
                        <option value="Bartın">Bartın</option>
                        <option value="Batman">Batman</option>
                        <option value="Bayburt">Bayburt</option>
                        <option value="Bilecik">Bilecik</option>
                        <option value="Bingöl">Bingöl</option>
                        <option value="Bitlis">Bitlis</option>
                        <option value="Bolu">Bolu</option>
                        <option value="Burdur">Burdur</option>
                        <option value="Bursa">Bursa</option>
                        <option value="Çanakkale">Çanakkale</option>
                        <option value="Çankırı">Çankırı</option>
                        <option value="Çorum">Çorum</option>
                        <option value="Denizli">Denizli</option>
                        <option value="Diyarbakır">Diyarbakır</option>
                        <option value="Düzce">Düzce</option>
                        <option value="Edirne">Edirne</option>
                        <option value="Elazığ">Elazığ</option>
                        <option value="Erzincan">Erzincan</option>
                        <option value="Erzurum">Erzurum</option>
                        <option value="Eskişehir">Eskişehir</option>
                        <option value="Gaziantep">Gaziantep</option>
                        <option value="Giresun">Giresun</option>
                        <option value="Gümüşhane">Gümüşhane</option>
                        <option value="Hakkâri">Hakkâri</option>
                        <option value="Hatay">Hatay</option>
                        <option value="Iğdır">Iğdır</option>
                        <option value="Isparta">Isparta</option>
                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                        <option value="Karabük">Karabük</option>
                        <option value="Karaman">Karaman</option>
                        <option value="Kars">Kars</option>
                        <option value="Kastamonu">Kastamonu</option>
                        <option value="Kayseri">Kayseri</option>
                        <option value="Kırıkkale">Kırıkkale</option>
                        <option value="Kırklareli">Kırklareli</option>
                        <option value="Kırşehir">Kırşehir</option>
                        <option value="Kilis">Kilis</option>
                        <option value="Kocaeli">Kocaeli</option>
                        <option value="Konya">Konya</option>
                        <option value="Kütahya">Kütahya</option>
                        <option value="Malatya">Malatya</option>
                        <option value="Manisa">Manisa</option>
                        <option value="Mardin">Mardin</option>
                        <option value="Mersin">Mersin</option>
                        <option value="Muğla">Muğla</option>
                        <option value="Muş">Muş</option>
                        <option value="Nevşehir">Nevşehir</option>
                        <option value="Niğde">Niğde</option>
                        <option value="Ordu">Ordu</option>
                        <option value="Osmaniye">Osmaniye</option>
                        <option value="Rize">Rize</option>
                        <option value="Sakarya">Sakarya</option>
                        <option value="Samsun">Samsun</option>
                        <option value="Siirt">Siirt</option>
                        <option value="Sinop">Sinop</option>
                        <option value="Sivas">Sivas</option>
                        <option value="Şırnak">Şırnak</option>
                        <option value="Tekirdağ">Tekirdağ</option>
                        <option value="Tokat">Tokat</option>
                        <option value="Trabzon">Trabzon</option>
                        <option value="Tunceli">Tunceli</option>
                        <option value="Şanlıurfa">Şanlıurfa</option>
                        <option value="Uşak">Uşak</option>
                        <option value="Van">Van</option>
                        <option value="Yalova">Yalova</option>
                        <option value="Yozgat">Yozgat</option>
                        <option value="Zonguldak">Zonguldak</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inputCheck" name="check">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    <div class="invalid-feedback" id="check-feedback"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="index.php" class="btn btn-secondary">Main Menu</a>
        </form>
    </div>
    <?php
    include './footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/reg_validation.js"></script>
</body>

</html>