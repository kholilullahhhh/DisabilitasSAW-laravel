/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// swal btn set status barang
const setStatus = (id, tabel, status) => {
    console.log(id, tabel, status);
    let token = $("meta[name='csrf-token']").attr("content");
    swal({
        title: "Perbarui Status Barang?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                type: "PUT",
                url: `/dashboard/${tabel}/status/${id}`,
                data: {
                    status: status,
                },
                success: function (response) {
                    if (response) {
                        swal(
                            "Status barang diperbarui",
                            "Aktif : data akan tampil disemua table\n Tidak aktif : data tidak akan tampil di table manapun",
                            "success"
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        swal("Error", "Failed to update data.", response);
                    }
                },
                error: function (error) {
                    console.error("AJAX Error:", error);
                    swal("Error", "Ajax Error.", error);
                },
            });
        }
    });
};

// modal detail barang
// $("#detail-barang").fireModal({title: 'Detail Barang',body: 'Modal body text goes here.', center: true});
const detailBarang = (id) => {
    console.log(id);
    fireModal({
        title: "Detail Barang",
        body: "Modal body text goes here.",
        center: true,
    });
};

// swal btn hps data
const deleteData = (id, tabel) => {
    console.log(id, tabel);
    let token = $("meta[name='csrf-token']").attr("content");

    swal({
        title: "Apakah anda yakin?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                type: "POST",
                url: `/dashboard/${tabel}/hapus/${id}`,
                success: function (response) {
                    console.log(response);
                    if (response) {
                        swal("Terhapus", "Data telah dihapus", "success").then(
                            () => {
                                location.reload();
                            }
                        );
                    } else {
                        swal("Error", "Failed to delete data.", "error");
                    }
                },
                error: function (error) {
                    console.error("AJAX Error:", error);
                    swal("Error", "Ajax Error.", "error");
                },
            });
        }
    });
};

// proses detail
const getDetail = (id, tabel) => {
    console.log(id, tabel);
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: `/dashboard/${tabel}/show/${id}`,
        type: "GET",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": token, // Sertakan token CSRF dalam permintaan AJAX
        },
        success: function (data) {
            console.log(data);
            $.fireModal({
                title: "Detail " + tabel,
                body: data.html, // data.html harus berisi HTML untuk ditampilkan di modal
                center: true,
                size: "modal-lg", // Ukuran modal (opsional)
                buttons: [
                    {
                        text: "Tutup",
                        class: "btn btn-secondary",
                        handler: function (modal) {
                            // Handler untuk tombol "Tutup"
                            modal.modal("hide");
                        },
                    },
                ],
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
        },
    });
};

$(document).on("click", '[data-toggle="custom-modal"]', function () {
    const id = $(this).data("id");
    const tabel = $(this).data("table");
    const kode = $(this).data("kode");
    const nama = $(this).data("nama");
    console.log("Triggered by data-attribute:", id, tabel);

    // Contoh menggunakan fireModal
    // $("#dynamicModal").fireModal({
    //     body: "Modal body text goes here.",
    //     center: true,
    // });
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: `/dashboard/${tabel}/show/${kode}`,
        type: "GET",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": token, // Sertakan token CSRF dalam permintaan AJAX
        },
        success: function (data) {
            console.log(data);

            if (data.status) {
                $("#modalTitle").text(
                    "Detail " + tabel + ` - ${nama} (${kode})`
                );
                $("#modalBody").html(data.html);

                // Menampilkan modal
                $("#dynamicModal").modal("show");
                return;
            }
            $("#modalTitle").text(
                "Barang tidak ditemukan di " + tabel + ` - ${nama} (${kode})`
            );
            // Menampilkan modal
            $("#dynamicModal").modal("show");

        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
        },
    });
});
