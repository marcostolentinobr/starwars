<!-- modal_msg -->
<div class="modal fade" id="modal_msg" data-bs-backdrop="static" style="z-index: 1056;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <!-- title -->
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- body -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- fim modal_msg -->

<!-- table -->
<table id="<?= $this->modulo ?>Datatable" class="display cell-border" style="width:100%">
    <thead>
        <?= $this->datatableTh ?>
    </thead>
    <tfoot>
        <?= $this->datatableTh ?>
    </tfoot>
</table>
<!-- fim table -->

<script>
    var modal_msg = new bootstrap.Modal(document.getElementById('modal_msg'));
    var datatable = null;

    //planeta
     function planeta(url) {
        $.ajax({
            url: url,
            success: function(data) {
                $('#modal_msg .modal-title').html(data.name);
                $('#modal_msg .modal-body').html(
                    '<b>Clima: </b>' + data.climate + '<br>' +
                    '<b>Diametro: </b>' + data.diameter + '<br>' +
                    '<b>Gravidade: </b>' + data.gravity + '<br>' +
                    '<b>Terreno: </b>' + data.terrain + '<br>'
                );
                modal_msg.show();
            }
        });
    }
    //fim planeta

    $(document).ready(function() {

        //datatable
        datatable = $('#<?= $this->modulo ?>Datatable').DataTable({
            columnDefs: [{
                orderable: false,
                targets: [<?= implode(',', $this->datatableNoSort) ?>]
            }],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
            },
            searchDelay: 350,
            processing: true,
            serverSide: true,
            responsive: true,
            serverMethod: 'post',
            ajax: {
                url: 'api/<?= $this->modulo ?>/datatable'
            }
        });
        //fim datatable

    });
</script>