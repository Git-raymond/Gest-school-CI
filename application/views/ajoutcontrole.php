
<form class="col-sm-12 box text-center text-primary mt-5 mb-5" action="" method="post">
    <h1 class="box-logo box-title text-warning">Ajouter un contrôle</h1>
    <div class="text-center">
        <br>
        <input type="text" class="box-input mb-3" name="intitule" placeholder="Intitule" required /><br>
        <input type="text" class="box-input mb-3" name="note" placeholder="Note" required /><br>
        <textarea class="box-input mb-3" name="commentaire" placeholder="Commentaires" required></textarea><br>
        <input type="date" class="box-input mb-3" name="date" placeholder="Date" required /><br>

    </div>
    <div class="col-sm-12">
        <label>Elève inscrit au cursus</label>
        <div class="col-sm-12">
            <select name="eleve_id">
                <tbody>
                    <?php if ($listeelevecursusprof) : ?>
                        <?php foreach ($listeelevecursusprof as $elevecursusprof) : ?>
                            <option value="<?php echo $elevecursusprof->eleve_id; ?>"><?php echo $elevecursusprof->username; ?> : <?php echo $elevecursusprof->matiere; ?> (<?php echo $elevecursusprof->annee ?>)</option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="mt-3">
            <a href='<?= site_url('page/indexenseignant'); ?>' class='btn btn-primary'>Annuler</a>
            <input type="submit" name="valider" class="btn btn-success" value="Valider">
        </div>
    </div>
</form>


</body>

</html>