<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Exclusão de <?= $model ?></h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja excluir este <?= $model ?>? <?php if (!empty($msg)) print $msg; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" id="deleteConfirm" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a>
            </div>
        </div>
    </div>
</div>
<script>
    var deleteUrl;
    $(document).ready(function () {
        $('.btn.delete').click(function (e) {
            e.preventDefault();
            deleteUrl = $(this).attr('href');
            $('#delete').modal('show').on('shown', function () {
                $('#deleteConfirm').focus();
            });
        });

        $('#deleteCancel').click(function (e) {
            e.preventDefault();
            $('#delete').modal('hide');
        });

        $('#deleteConfirm').click(function (e) {
            e.preventDefault();
            window.location = deleteUrl;
        });
    });
</script>
