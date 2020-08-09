<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Login | Lost Sock');
?>
<div class="container-fluid">
    <div class="row justify-content-center my-auto">        
        <div class="col-xl-10 col-lg-12 col-md-9 login--container">
            <div class="card o-hidden border-0 shadow-lg mt-5 mb-n5">
                <div class="card-body mt-5">
                    <div class="row m-5">
                        <!--div que contiene la imagen que desaparece -->
                        <div class="col-lg-6 d-none d-lg-block login--image"></div>
                        <!-- Div de la derecha -->
                        <div class="col-lg-6 p-5">
                            <div class="d-flex flex-column justify-content-center my-auto">
                                <h3 class="mb-4 mx-auto">Login</h3>
                                <form method="post" id="login-form" class="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" title="Solo se permiten direcciones de correo válidas">
                                    </div>
                                    <div class="form-group">
                                        <label for="clave">Password</label>
                                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Password"  pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                                    </div>
                                    <a class="mx-auto" href=""><small><span class="text-purple">Forgot your password?</span></small></a>
                                    <button type="submit" class="btn btn-primary custom--button float-none w-100 mt-3 text-white">Login now</button>
                                </form>
                                <a class="mx-auto mt-4" href="register.php"><small><span class="text-purple">Create an account</span> to buy in Lost Sock!</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
<?php
Page::footerTemplate('login.js');
?>

