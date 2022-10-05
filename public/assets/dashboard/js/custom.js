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

// select gallery type
$(document).ready(function () {
    $("#type").on("change", function () {
        if ($(this).val() == "image") {
            $(".video-field").addClass("d-none");
            $(".image-field").removeClass("d-none");
            $("#image").attr("required", "");
            $("#video_link").removeAttr("required");
            $("#video_link").val("");
        } else {
            $("#video_link").attr("required", "");
            $("#image").removeAttr("required");
            $(".image-field").addClass("d-none");
            $(".video-field").removeClass("d-none");
            $("#image").val("");
        }
    });
});

// post content editor
tinymce.init({
    selector: "#post-content",
    // width: 600,
    // height: 300,
    plugins: [
        "advlist",
        "autolink",
        "link",
        "image",
        "lists",
        "charmap",
        "preview",
        "anchor",
        "pagebreak",
        "searchreplace",
        "wordcount",
        "visualblocks",
        "code",
        "fullscreen",
        "insertdatetime",
        "media",
        "table",
        "emoticons",
        "template",
        "help",
    ],
    toolbar:
        "undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | " +
        "bullist numlist outdent indent | link image | print preview media fullscreen | " +
        "forecolor backcolor emoticons | help",
    menu: {
        favs: {
            title: "My Favorites",
            items: "code visualaid | searchreplace | emoticons",
        },
    },
    menubar: "favs file edit view insert format tools table help",
    content_style:
        "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
});

// preview gallery video

// detail carousel
$(document).ready(function () {
    $(document).on("click", ".gallery-detail", function () {
        const video_link = $(this).data("video_link");
        const caption = $(this).data("caption") ? $(this).data("caption") : "-";

        $("#gallery-video_link").html(video_link);
        $("#gallery-caption").text(caption);

        $("#gallery-edit").attr(
            "href",
            "/dashboard/galleries/" + $(this).data("id") + "/edit"
        );
        $("#gallery-delete").attr(
            "action",
            "/dashboard/galleries/" + $(this).data("id")
        );
    });
});

// filter gallery type
$(document).ready(function () {
    $("#image-filter").on("click", function () {
        // $(".").parentElement().addClass("active");
        $(".image-lists").removeClass("d-none");
        $(".video-lists").addClass("d-none");
    });
    $("#video-filter").on("click", function () {
        $(".video-lists").removeClass("d-none");
        $(".image-lists").addClass("d-none");
    });
});
