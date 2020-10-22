<html>
    <head>
        <title>Sistema Aderencia Gre</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            body{
                background-color: #6f9bed; 
            }
            .content{
                margin: 10%;
                background-color: #fff;
                padding: 4rem 1rem 4rem 1rem;
                box-shadow: 0 0 5px rgba(0,0,0, .05);
            }
            .form-control{
                width: 100%;
                border-color: #6f9bed !important;
                border-style: solid !important;
                border-width: 0 0 1px 0 !important;
                padding: 0px !important;
            }
        </style>
    </head>

    <body>
        <div class='container'>
            <div class='row content shadow-lg'>
                <div class='col-md-6'>
                    <h3 class='signin-text mb-3'>Efetue seu login</h3>
                    <form action="../Controller/php/login.php" method="post" onsubmit="return check(this.form)">
                        <div class='form-group'>
                            <label for='email'>Email</label>
                            <input type='email' name='Email' title='insira seu email' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='password'>Senha</label>
                            <input type='password' name='Senha' title='insira sua senha' class='form-control'>
                        </div>
                        <input type="button" value="Entrar" class='btn btn-primary'>
                    </form>
                </div>
                <div class='col-md-6'>
                    <h4>Bem vindo ao nosso sistema!</h4>
                </div>
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>


<?php

?>