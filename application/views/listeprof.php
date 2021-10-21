
<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des enseignants</h2>
    <br>
   
        <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
            <tr class="text-warning" >
                <td>Nom</td>
                <td>Email</td>
                <td width="300">Statut (1=actif, 0=nul)</td>
                <td width="70px">EDIT</td>
            </tr>
            <tbody>
            <?php if ($listeprofs) : ?>
                <?php foreach ($listeprofs as $prof) : ?>
                    <tr>
                        <td><?php echo $prof->username; ?></td>
                        <td><?php echo $prof->email; ?></td>
                        <td><?php echo $prof->status; ?></td>
                        <td><a href='<?= site_url('page/editcompte/'. $prof->id);?>' class='btn btn-info'>Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>
</html>
