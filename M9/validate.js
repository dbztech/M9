function hasHtml5Validation () {
    return typeof document.createElement('input').checkValidity === 'function';
}
if (hasHtml5Validation()) {
    $('.validate-form').submit(function (e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('invalid');
            $('#status').html('invalid');
        } else {
            $(this).removeClass('invalid');
            $('#status').html('submitted');
        }
    });
}