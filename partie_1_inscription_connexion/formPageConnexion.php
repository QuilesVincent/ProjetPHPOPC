<?php
//Affichage d'un type de formulaire en fonction de mauvais mdp (ou username) renseigné
if(empty($_GET['errConnexion']))
                    {?>
                    <form action='connexionFormPost.php' method='post' class='connexionForm'>
                        <div class='mailConnexionContent'> <!-- variable class à changer par userName au lie de mail-->
                            <label for='userNameConnexion'>UserName</label>
                            <input type='text' name='userNameConnexion' id='inputUserNameConnexion'>
                        </div>
                        <div class='passwordConnexionContent'>
                            <label for='passwordConnexion'>Mot de passe</label>
                            <input type='password' name='passwordConnexion' id='inputPasswordConnexion'>
                            <a href='newPassword.php'>Mot de passe oublié ?</a>
                        </div>
                        <div class='buttonConnexionContent'>
                            <input type='submit' name='submitConnexion' value='connexion'></button>
                        </div>
                    </form>
                    <?php
                    }
                    else
                    {?>
                    <form action='connexionFormPost.php' method='post' class='connexionForm'>
                        <div class='mailConnexionContent'> <!-- variable class à changer par userName au lie de mail-->
                            <label for='userNameConnexion'>UserName</label>
                            <input type='text' name='userNameConnexion' id='inputUserNameConnexion' placeholder='mauvais mdp'>
                        </div>
                        <div class='passwordConnexionContent'>
                            <label for='passwordConnexion'>Mot de passe</label>
                            <input type='password' name='passwordConnexion' id='inputPasswordConnexion'>
                            <a href='newPassword.php'>Mot de passe oublié ?</a>
                        </div>
                        <div class='buttonConnexionContent'>
                            <input type='submit' name='submitConnexion' value='connexion'></button>
                        </div>
                    </form>
                    <?php
                    }?>