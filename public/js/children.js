var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="genric-btn info circle text-uppercase add_child_link">Añadir hijo/a</button>');
var $newLinkLi = $('<div class="children"></div>').append($addTagButton);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('div.children');

    // add a delete link to all of the existing tag form li elements
    // $collectionHolder.find('div.child').each(function(key, value) {
    //     //addTagFormDeleteLink($(this));
    // });

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    updateChildrenIndex();

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });

    $('div.remove button.genric-btn.danger-border.circle').on('click', function(e){
        $(this).parent().parent().parent().parent().remove();
        updateChildrenIndex();
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<div class="child"></div>').append(newForm);
    $newLinkLi.before($newFormLi);
    addTagFormDeleteLink($newFormLi);
    updateChildrenIndex();

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        language: 'es'
    });
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormButton = $('<button type="button" class="genric-btn danger-border circle text-uppercase">Borrar hijo/a</button>');
    $tagFormLi.find('.remove').append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $tagFormLi.remove();
        updateChildrenIndex();
    });
}

function updateChildrenIndex(){
    $collectionHolder = $('div.children');
    $collectionHolder.find('div.child').each(function(key, value) {
        var currentValue = key + 1;
        $(this).find('.child_number').html('Hijo/a número ' + currentValue);
    });
}