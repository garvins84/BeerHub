$(document).ready(function(){
    $('label.tree-toggler').children('ul.tree').hide();
    $('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });
});