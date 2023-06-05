<?php $title = "Emi - Welcome" ?>
<?php

use Emi\model\entities\Role;
ob_start();
session_start();
?>
<main class="container">
    <p>
        <mark>Date d'entrée en vigueur : 02 Juin 2023</mark><br>
        <br>

        Les présentes conditions générales d'utilisation régissent l'utilisation du site web et des services fournis par
        EMI (Environmental Measures for Industries). En accédant au site web d'EMI et en utilisant nos services, vous
        acceptez d'être lié par les présentes Conditions. Veuillez les lire attentivement avant d'utiliser nos services.<br>
        <br>

        1. Description des services<br>
        <br>

        EMI conçoit, fabrique et vend des prototypes de gilets multifonctions dotés de capteurs de mesure de la qualité
        environnementale tels que le CO2, la température superficielle de la peau, le gaz et l'humidité. Nos produits sont
        destinés à aider les industries à surveiller et à évaluer les conditions environnementales en temps réel des ouvriers
        pendant leur service.<br>
        <br>

        2. Utilisation du site web et des services<br>
        <br>

        2.1 Inscription : Pour accéder à certains services ou fonctionnalités de notre site web, vous devrez peut-être vous
        inscrire et créer un compte. Vous êtes responsable de fournir des informations précises et à jour lors de l'inscription,
        et de maintenir la confidentialité de vos identifiants de connexion.<br>
        <br>

        2.2 Utilisation autorisée : Vous vous engagez à utiliser notre site web et nos services uniquement à des fins légales
        et conformément aux présentes Conditions. Vous ne devez pas utiliser nos services d'une manière qui pourrait porter
        atteinte à nos droits ou à ceux de tiers, ou violer les lois en vigueur.<br>
        <br>

        2.3 Restrictions : Vous n'êtes pas autorisé à copier, modifier, distribuer, transmettre, afficher, exécuter,
        reproduire, publier, concéder sous licence, créer des œuvres dérivées, transférer ou vendre toute information,
        logiciel, produit ou service obtenu à partir de notre site web ou de nos services.<br>
        <br>

        3. Propriété intellectuelle<br>
        <br>

        Tous les droits de propriété intellectuelle relatifs à notre site web, à nos services et à nos produits restent
        la propriété exclusive de EMI. Vous acceptez de respecter ces droits de propriété intellectuelle et de ne pas les
        violer de quelque manière que ce soit.<br>
        <br>

        4. Responsabilité<br>
        <br>

        4.1 Exclusion de garantie : EMI fournit une garantie totale quant à l'exactitude, à l'exhaustivité, à la fiabilité
        ou à la pertinence des informations fournies sur notre site web ou par le biais de nos services.<br>
        <br>

        4.2 Limitation de responsabilité : Dans toute la mesure permise par la loi applicable, EMI décline toute
        responsabilité pour tout dommage direct, indirect, accessoire, spécial, consécutif ou exemplaire découlant
        de l'utilisation de notre site web ou de nos services.<br>
        <br>

        5. Confidentialité<br>
        <br>

        La collecte et l'utilisation des informations personnelles sont régies par notre politique de confidentialité,
        disponible sur notre site web. En utilisant nos services, vous acceptez notre politique de confidentialité.<br>
        <br>

        6. Modifications des conditions générales<br>
        <br>

        EMI se réserve le droit de modifier les présentes Conditions à tout moment. Les modifications prendront effet
        dès leur publication sur notre site web. Il est de votre responsabilité de consulter régulièrement les Conditions
        pour prendre connaissance d' éventuelles modifications.<br>

    </p>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
