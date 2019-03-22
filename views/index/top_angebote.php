<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 25.02.2019
 * Time: 10:05
 * © : 2019
 */

?>
<aside>
    <div class="text-eins">
        <h1>Unsere Schnäpchen des Monats für Sie! </h1>
        <h2>Jetzt noch einmal kräftig bei Ihrer Immobiliesparen!</h2>

        <ul class="hausbox">
            <?php
            for ($i = 0; $i < count($this->top_angebote); $i++) {
                ?>
                <li class="haus-item">Schnäpchenhaus in <?php echo $this->top_angebote[$i]['nummer']; ?><br>
                    <img class="textbild" src="<?php echo PUBLIC_URL; ?>images/seitenbilder/12617.1.jpg"
                         alt="Schnäpchenhaus...">
                    <p>Neubauvilla in La Zenia, Spanien <br>
                        Wohnflache&nbspca.&nbsp105&nbspm², Grundstück&nbsp;225&nbsp;m²,
                        4&nbspZimmer, 3&nbspSchlafzimmer, 2&nbspBäder </p>
                    <p class="preis">Ppreis:250.000 €</span><br>
                        <a class="haus-link"
                           href="<?php echo URL; ?>expose/show/<?php echo $this->top_angebote[$i]['nummer']; ?>"
                           title="Exposé L1004 anschauen">zum
                            Exposé <?php echo $this->top_angebote[$i]['nummer']; ?></a></p></li>

            <?php } ?>
        </ul>

    </div>
</aside>
