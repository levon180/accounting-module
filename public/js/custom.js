var openModal = function (type, id) {
    var action = '/' + type + '/' + id;

    $("#modal-form").attr('action', action);
};