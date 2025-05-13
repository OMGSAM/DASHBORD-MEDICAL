<?php 
	session_start(); 
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic System - Login</title>
    <link href="https://appli.hsabati.com/assets/css/reset.css" rel="stylesheet">
    <link href="https://appli.hsabati.com/assets/images/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css"
          href="https://appli.hsabati.com/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://appli.hsabati.com/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://appli.hsabati.com/bower_components/animate.css/animate.min.css">
    <link href="https://appli.hsabati.com/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://appli.hsabati.com/bower_components/open-sans-fontface/open-sans.css' rel='stylesheet'
          type='text/css'>
    <link href='https://appli.hsabati.com/assets/fonts/nexa/NexaBold'>
    <link href="https://appli.hsabati.com/assets/css/authentication.css?002" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://appli.hsabati.com/assets/js/fingp.js?001"></script>
    <script>
        // Initialize the agent at application startup.
        const fpPromise = FingpJS.load()
        console.log('visitorId')

        // Get the visitor identifier when you need it.
        fpPromise
            .then(fp => fp.get())
            .then(result => document.cookie = "visitor_id="+result.visitorId+";path=/;domain=hsabati.com")
    </script>
</head>
<body>
	<?php if(isset($_SESSION['message'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: '<?= $_SESSION['success'] == 'danger' ? 'error' : 'success'; ?>',
                title: '<?= $_SESSION['message']; ?>',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    const header = toast.querySelector('.swal2-title');
                                    header.style.fontSize = '1.5rem'; // Augmente la taille du texte

                    // header.style.backgroundColor = '#000';
                    // header.style.color = '#fff';
                    setTimeout(() => {
                        header.style.backgroundColor = '';
                        header.style.color = '';
                    }, 1000); // Après 1 seconde, revenir à la couleur par défaut
                }
            });
        });
    </script>

<?php unset($_SESSION['message']); ?>
<?php endif; ?>


	<?php if(isset($_SESSION['message'])): ?>
															<span class="text-<?= $_SESSION['success']; ?>" >
																<h4>
																	<?= $_SESSION['message']; ?>
																</h4>	
															</span>
														<?php unset($_SESSION['message']); ?>
														<?php endif ?>


<div class="mobile-logo hide">
    <img class="img-responsive" width="70px" alt="Hsabati Square Logo"
         src="https://appli.hsabati.com/assets/images/img_fac/Hsabati-Logo-Sqr.png">
 </div>
<div id="auth_container">
    <div class="left-side">
        <div class="logo-square text-center">
            <img src="assets/img/kk.png" alt="Hsabati SARL Logo">
            <label class="bigtext">Connexion</label>

            <div class="login-container">
              
													<form method="POST" action="model/login.php">
                <div class="form-group" >
					<label class="control-label" for="email">Username</label>
															<input name="username" class="form-control form-control-lg" required/>
				</div>                <div class="form-group" >
					<label class="control-label" for="password">Mot de passe</label>
															<input type="password" name="password" class="form-control form-control-lg" required/>
				</div>                <div class="form-group text-left">
                 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        <b>Connexion</b>
                    </button>
                </div>
                <div class="row auth-retrieve">
                    <div class="col-md-6">
                         
                    </div>
                    </div></form>            </div>
        </div>
    </div>
    <div class="right-side">
        <div class="company-info">
            <div class="logo-square text-center">
                <img class="img-responsive" width="70px"
                     src="assets/img/kk.png"
                     alt="Hsabati Square Logo">
            </div>
            <div class="logo-label text-center">
                
                <h5>LE PARTENAIRE DES DÉCIDEURS</h5>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://appli.hsabati.com/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://appli.hsabati.com/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="https://appli.hsabati.com/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="https://appli.hsabati.com/bower_components/jquery-validation/dist/additional-methods.min.js"></script>
<script src="https://appli.hsabati.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://appli.hsabati.com/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="https://appli.hsabati.com/assets/js/general.js"></script></html>
