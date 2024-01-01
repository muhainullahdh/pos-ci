<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <h4>Setting</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($this->session->flashdata('msg') == 'double_customers') { ?>
        <script>
            $(document).ready(function () {
                swal({
                    title: "Opss",
                    text: "Data <?= $this->session->flashdata('msg_val') ?> tidak boleh sama",
                    icon: "warning",
                })
            })
        </script>
    <?php } ?>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Setting Struk</h6><br>
                        <form action="<?= base_url('setting/struk') ?>" method="POST">
                            <div class="row mt-2">
                                <div class="col-xl-6">
                                    <input type="hidden" name="action" value="edit">
                                    <!-- <textarea id="editor" name="content" cols="30" rows="10" placeholder="Tuliskan isi pikiranmu...">awdwadwa</textarea> -->
                                                <textarea name="editor1" id="editor1" rows="5" cols="10"><?= $setting['struk'] ?></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-4">
                                   <button class="btn btn-primary btn-square" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<!-- footer start-->

<script>

    $(document).on('click', '.delete_customers', function (e) {
        e.preventDefault();
        var pid = this.id;
        swal({
            title: "Delete",
            text: "Apakah anda yakin ingin delete customers?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "<?= site_url('user/delete_customer'); ?>",
                    method: "POST",
                    data: { id: pid },
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        swal({
                            title: "Berhasil..!",
                            text: "customers berhasil didelete",
                            icon: "success",
                        }).then((willDelete) => {
                            if (willDelete) {
                                location.reload();
                            }
                        });
                    }
                })
            }
        });
    })
</script>