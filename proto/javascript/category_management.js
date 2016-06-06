
var selectedCategory = -1;
var category_management = true;

$(document).ready(function () {
        $('#categoryContainer').slimScroll({
            height: '55vh',
            allowPageScroll: 'true',
            alwaysVisible: 'true'
        });
    prepareListForSelection();
});

$('#save-form-button').click(function(e){
    e.preventDefault();
    if(selectedCategory < 0)
        addCategory($('#category-box').val());
    else
        editCategory($('#category-box').val(), selectedCategory);
});


function addCategory(category){
    console.log(category);
    $.ajax({
        url:BASE_URL+'api/category/add_category.php',
        method: "POST",
        data: {'category': category}
    }).done(function(html){
        console.log(html);
        var jsonResponse = JSON.parse(html);
        if('success' in jsonResponse){
            loadAllCategories();
            prepareListForSelection();
        } else {
            // ALERT ERROR
        }
    });
}


function editCategory(category, id){
    $.ajax({
        url:BASE_URL+'api/category/edit_category.php',
        method: "POST",
        data: {'category': category, 'id': id}
    }).done(function(html){
        console.log(html);
        var jsonResponse = JSON.parse(html);
        if('success' in jsonResponse){
            loadAllCategories();
            prepareListForSelection();
        } else {
            // ALERT ERROR
        }
    });
}

function prepareListForSelection() {
    $('li.category-element').unbind('click');
    $('li.category-element').bind('click', function (e) {
        var newSelection = $(this).data('id');
        if (selectedCategory != newSelection) {
            if (selectedCategory == -1) {
                selectedCategory = newSelection;
                toggleCategory(newSelection, true);
            } else {
                toggleCategory(newSelection, true);
                toggleCategory(selectedCategory, false);
                selectedCategory = newSelection;
            }
            $('#save-form-button').html('<span class="glyphicon glyphicon-edit"></span>');
            $('#category-box').attr('placeholder', 'Edite a categoria "' + $('li#category-' + selectedCategory + ' div p').html() + '"');
            $('#category-box').val($('li#category-' + selectedCategory + ' div p').html());
        } else {
            selectedCategory = -1;
            toggleCategory(newSelection, false);
            $('#save-form-button').html('<span class="glyphicon glyphicon-plus"></span>');
            $('#category-box').attr('placeholder', 'Adicione uma categoria');
            $('#category-box').val('');

        }

    });
    toggleCategory(selectedCategory, true);
}

function toggleCategory(id, selected){
    if(selected) {
        $('li#category-' + id).css('background-color', '#ddd');
    }
    else {
        $('li#category-' + id).css('background-color', '');
    }

}

$('#category-box').keydown(function(a) {
    if(a.which == 13) {
        a.preventDefault();
    }
});