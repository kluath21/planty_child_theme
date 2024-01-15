<?php

$produits = get_field_id('galerie_produit');
?>
        <main class="commande-fond">
            <div class="commande">
                <h1><?php the_field('titre_principal'); ?></h1>
                <hr class="white-hr">
                <h3 class="commande-title"><?php the_field('sous_titre'); ?></h3>
                <div class="image-gout">
                    <div class="quantite-produit">
                        <div class="image-fruit">
                            <img src="<?php echo esc_url( $produits['image_1']['url'] ); ?>" alt="<?php echo esc_attr( $produits['image_1']['alt'] ); ?>">
                            <div class="fruit-petit">
                                <?php echo esc_html( $produits['nom_du_produit1'] );?> 
                                <br> <?php  if($produits['nom_1_sur_2_lignes'] == true) {echo esc_html( $produits['nom_du_produit1b']);} ; ?>
                            </div>
                        </div>
                        <input class="quantity" type="quantity" value="0">
                    </div>
                    <div class="quantite-produit">
                        <div class="image-fruit">

                                <br> <?php  if($produits['nom_2_sur_2_lignes'] == true) {echo esc_html( $produits['nom_du_produit2b']);} ; ?>
                            </div>
                        </div>
                        <input class="quantity" type="quantity" value="0">
                    </div>
                    <div class="quantite-produit">
                        <div class="image-fruit">
                            <img src="<?php echo esc_url( $produits['image_3']['url'] ); ?>" alt="<?php echo esc_attr( $produits['image_3']['alt'] ); ?>">
                            <div class="fruit-petit">
                                <?php echo esc_html( $produits['nom_du_produit3'] );?> 
                                <br> <?php  if($produits['nom_3_sur_2_lignes'] == true) {echo esc_html( $produits['nom_du_produit3b']);} ; ?>
                            </div>
                        </div>
                        <input class="quantity" type="quantity" value="0">
                    </div>
                    <div class="quantite-produit">
                        <div class="image-fruit">

                                <br> <?php  if($produits['nom_4_sur_2_lignes'] == true) {echo esc_html( $produits['nom_du_produit4b']);} ; ?>
                            </div>
                        </div>
                        <input class="quantity" type="quantity" value="0">
                    </div>
                </div>
                <hr class="white-hr">
                <div class="command-form">
                <?php echo do_shortcode( '[contact-form-7 id="62de59e" title="Formulaire Commande"]' ); ?>
                </div>
                <?php echo do_shortcode( '[contact-form-7 id="62de59e" title="Formulaire Commande"]' ); ?>                
            </div>    

            <?php
   
