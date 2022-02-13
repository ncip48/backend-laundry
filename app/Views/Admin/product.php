<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-gray-800"></i> <?= $title ?>
                        <div class="float-right mr-1">
                            <a href="" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#importData"><i class="fa fa-plus"></i> Tambahkan</a>
                        </div>
                        <div class="float-right pr-1">
                            <button id="refresh-data" class="btn btn-block btn-outline-danger btn-sm"><i class="fa fa-sync-alt"></i> Refresh</button>
                        </div>
                    </h1>
                    <div id="result_wrapper" class="d-none alert alert-danger alert-dismissible fade show" role="alert">
                        <div id="result_error"></div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-4" id="loader">
                        <div class="spinner-border text-danger text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div id="mytablediv" class="table-responsive">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-result">
                                <!-- <td colspan="7">Loading...</td> -->
                                <!--  -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->

<!-- Modal -->
<!--delete Data-->
<div id="delete_modal">
    <div class="modal fade" id="deleteData" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewDataLabel">Hapus Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="delete-data">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mytablediv").hide();
        loadData();
        BindTable();

        $("#refresh-data").click(function() {
            $("#mytable").DataTable().clear()
            loadData();
        });

    });

    //untuk modal hapus
    $(document).on("click", "#delete-modal", function() {
        var id = $(this).data('iddelete');
        var nama = $(this).data('nama');
        $('#delete_modal #deleteData #delete-data').html('<div class="modal-body"><p>Anda yakin ingin menghapus <b>' + nama + '</b></p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button><button onclick="DeleteData(' + id + ')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></div>')
    });

    function BindTable() {
        myTable = $("#mytable").DataTable({
            "autoWidth": false,
            'columnDefs': [{
                "targets": 0, // your case first column
                "className": "text-center",
                "width": "4%"
            }]

        });
    }

    function loadData() {
        $(".table-loading").hide();
        $.ajax({
            type: "GET",
            url: "<?= site_url('api/produk'); ?>",
            headers: {
                "Authorization": "Bearer <?= $user['token'] ?>"
            },
            beforeSend: function(xhr) {
                $("#mytablediv").hide();
                $("#loader").addClass("d-flex");
            },
            complete: function() {
                $("#loader").removeClass("d-flex").addClass('d-none');
                $("#mytablediv").show();
            },
            success: function(response) {
                var jsonObject = (response.data);
                if (!response.success) {
                    $("#loader").removeClass("d-flex").addClass('d-none');
                    $("#mytablediv").show();
                    $('#result_wrapper').removeClass('d-none')
                    $('#result_error').html(response.error)
                } else {
                    var result = jsonObject.map(function(item, index) {
                        var result = [];
                        result.push(index + 1);
                        result.push(item.kode);
                        result.push(item.nama_produk);
                        result.push(item.satuan);
                        result.push(formatRupiah(item.harga));
                        result.push('<a href="<?= base_url('admin/produk_edit?id=') ?>' + item.id + '" class="badge badge-success mr-1"><i class="fa fa-edit"></i> Edit</a><button onclick="DeleteData(' + item.id + ')" class="btn btn-danger badge badge-danger"><i class="fa fa-trash"></i> Hapus</button>');
                        return result;
                    });
                    myTable.rows.add(result);
                    myTable.draw();
                    $('#result_wrapper').addClass('d-none')
                }
            },
            failure: function() {
                $("#loader").removeClass("d-flex").addClass('d-none')
                $("#mytablediv").show();
                $('#result_error').html('Error!!')
            }
        });
    }

    function DeleteData(id) {
        $.ajax({
            type: "DELETE",
            url: "<?= site_url('api/produk/'); ?>" + id,
            headers: {
                "Authorization": "Bearer <?= $user['token'] ?>"
            },
            beforeSend: function(xhr) {
                $("#loader").addClass("d-flex");
            },
            complete: function() {
                $("#loader").removeClass("d-flex").addClass('d-none');
            },
            success: function(response) {
                $('#deleteData').modal('hide')
                var jsonObject = (response.data);
                if (!response.success) {
                    alert(response.error)
                } else {
                    $("#mytable").DataTable().clear()
                    loadData()
                }
            },
            failure: function() {
                $('#deleteData').modal('hide')
                alert('error!')
            }
        });
    }
</script>