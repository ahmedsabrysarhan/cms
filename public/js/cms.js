// Set flash time out
setTimeout(function() {
    $('#flashMessage').fadeOut('fast');
}, 3000);

$('#delete').on('click', (function() {
    alert('Are you sure ?');
}));

// Multible select
$(function() {
    $(".select2").bsMultiSelect();
});