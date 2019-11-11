/** подтверждение удаления */
$('.delete').click(function () {
    var res = confirm('Подтвердите действие !');
    if (!res) return false;
});

/** редактирование заказа */
$('.redact').click(function () {
    var res = confirm('Можко только изменить комментарий');
    return res;
});

/** Удаление заказа из DB */
$('.deletebd').click(function () {
    var res = confirm('Подтвердите действие !');
    if (res) {
        var ress = confirm('ВЫ УДАЛИТЕ ЗАКАЗ ИЗ БД !');
        if (!ress)
            return false;
    }
    if (!res)
    return false;
});

/** Активное меню */
$('.sidebar-menu a').each(function () {
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if (location === link ) {
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});

// language=JQuery-CSS
/** KCEditor */
$('#editor1').ckeditor();
