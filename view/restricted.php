<?php
$this->layout('layout/layout', ['title' => 'Accès restreint']);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Accès restreint</h3>
                </div>
                <div class="card-body">
                    <p>Votre licence est soit expirée, soit inactive.</p>
                    <p>Pour plus d'informations, veuillez contactez l'administrateur système.</p>

                    <?php if ($licenseStatus['data']['status_code'] === 1) : ?>
                        <h4>Statut : Expired</h4>
                        <p>Suivez ce <a href="/renew-license">lien</a> pour renouveler votre licence.</p>
                    <?php elseif ($licenseStatus['data']['status_code'] === 2) : ?>
                        <h4>Statut : Invalid</h4>
                        <p>Votre licence est invalide. Contactez le support pour obtenir une nouvelle licence.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>