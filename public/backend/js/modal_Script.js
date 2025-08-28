$(document).ready(function () {
    $(document).on("click", '[data-bs-toggle="modal"]', function (e) {
        var target_modal_element = $(e.currentTarget).data("content");
        var target_modal = $(e.currentTarget).data("bs-target");
        var modalBody = $(target_modal + " .modal-content");
        modalBody.load(target_modal_element);
    });
});
