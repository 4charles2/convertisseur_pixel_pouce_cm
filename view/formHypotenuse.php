<h3>Convertie la taille de l'écran en diffèrentes unité :</h3>
<form class="myForm" id="hypotenuseForm" method="post" action="#">
	<?php //wp_nonce_field(-1, "hypotenuseForm-verif", false, false); ?>
    <div class="input-group">
        <label for="hypotenuse">Taille de l'écran en diagonale</label>
        <input class="input" type="number" name="hypotenuse" id="hypotenuse" placeholder="taille de l'écran" required>
    </div>
    <div class="input-group">
        <label for="dpi2">Dpi de l'écran</label>
        <input class="input" type="number" name="dpi" id="dpi2" placeholder="dpi point par pouces" required>
    </div>
    <div class="input-group">
        <label for="unite2">Les unites de mesure (cm, pouces, pixels)</label>
        <select class="input" name="unite" id="unite2" required>
            <option value="CM">cm</option>
            <option value="PIXELS">pixels</option>
            <option value="POUCES" selected>pouces</option>
        </select>
    </div>

    <input type="submit" value="Valider" name="hypotenuseForm">
</form>


    <?php
        if (isset($_GET['erreur'])){
          echo  '<div class="view alert">
                      <p>Vous devez rentrer une valeur numérique et supérieure à zéro</p>
                </div>';
        }
    ?>