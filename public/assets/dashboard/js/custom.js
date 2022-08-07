// tinymce editor
tinymce.init({
    selector: "#content",
});

// edit kategori postingan
$(document).ready(function () {
    const flashData = $("#flash-data");
    const flashMessage = flashData.data("message");
    if (flashData && flashData.data("session") == "success") {
        Swal.fire({
            title: "Sukses",
            text: flashMessage,
            icon: "success",
            // showCancelButton: true,
            // confirmButtonColor: "#5e72e4",
            // cancelButtonColor: "#d33",
            // cancelButtonText: "Batal",
            // confirmButtonText: "Hapus",
        });
    }
});

// edit kategori postingan
$(document).ready(function () {
    $(document).on("click", ".post-edit", function () {
        const categoryId = $(this).data("id");
        const categoryName = $(this).data("name");
        $("#name-edit").val(categoryName);
        $("#form-edit").attr(
            "action",
            "/dashboard/post-categories/" + categoryId
        );
    });
});

// delete data
$(document).ready(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        const formDelete = this.parentElement;
        Swal.fire({
            title: "Yakin?",
            text: "Anda akan menghapus data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                formDelete.submit();
            }
        });
    });
});

// keluar
$(document).ready(function () {
    $(document).on("click", ".logout", function (e) {
        e.preventDefault();
        const formLogout = this.parentElement;
        Swal.fire({
            title: "Yakin?",
            text: "Sesi masuk anda akan berakhir!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batal",
            confirmButtonText: "Keluar",
        }).then((result) => {
            if (result.isConfirmed) {
                formLogout.submit();
            }
        });
    });
});

// detail carousel
$(document).ready(function () {
    $(document).on("click", ".carousel-detail", function () {
        $("#carousel-image").html(
            '<img src="/storage/' +
                $(this).data("image") +
                '" class="rounded mb-2" height="100px">'
        );
        $("#carousel-title").text($(this).data("title"));
        $("#carousel-subtitle").text(
            $(this).data("subtitle") ? $(this).data("subtitle") : "-"
        );
        $(".modal-title").text("Detail tayangan " + $(this).data("loop"));
        $("#carousel-edit").attr(
            "href",
            "/dashboard/carousels/" + $(this).data("id") + "/edit"
        );
        $("#carousel-delete").attr(
            "action",
            "/dashboard/carousels/" + $(this).data("id")
        );
    });
});

// detail feature
$(document).ready(function () {
    $(document).on("click", ".feature-detail", function () {
        $("#feature-name").text($(this).data("name"));
        $("#feature-content").html($(this).data("content"));
        $(".feature-title").text("Detail layanan " + $(this).data("loop"));
        $("#feature-edit").attr(
            "href",
            "/dashboard/features/" + $(this).data("id") + "/edit"
        );
        $("#feature-delete").attr(
            "action",
            "/dashboard/features/" + $(this).data("id")
        );

        const dataImage = $(this).data("image");
        if (dataImage) {
            $("#feature-image").html(
                '<img src="/storage/' +
                    $(this).data("image") +
                    '" class="rounded mb-2" height="100px">'
            );
        } else {
            $("#feature-image").text("-");
        }
    });
});

// delete data
$(document).ready(function () {
    $(document).on("click", "#deleteInModal", function (e) {
        e.preventDefault();
        const formDelete = this.parentElement;
        Swal.fire({
            title: "Yakin?",
            text: "Anda akan menghapus data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                formDelete.submit();
            }
        });
    });
});
