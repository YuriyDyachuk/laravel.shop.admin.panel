/** подтверждение удаления **/
$('.delete').click(function () {
    var res = confirm('Подтвердите действие !');
    if (!res) return false;
});

/** редактирование заказа **/
$('.redact').click(function () {
    var res = confirm('Можко только изменить комментарий');
    return res;
});

/** Удаление заказа из DB **/
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
