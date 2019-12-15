$(document).ready(function() {

    // START Character Edit button code

    let $editCharBtn = $("#editButton");
    let $editCharStatus = false;

    $editCharBtn.click(function () {
        if (!$editCharStatus) {
            $("input").prop("disabled", false);
            $('textarea').prop("disabled", false);
            $editCharStatus = true;
        } else {
            $('input').prop("disabled", true);
            $('textarea').prop("disabled", true);
            $editCharStatus = false;
        }

    });

    // END Character Edit Button Code

    // Enable Fields for New Character
    let $queryType = $('#queryType');

    if ($queryType.prop("value") === "insert") {
        $("input").prop("disabled", false);
        $('textarea').prop("disabled", false);
    }

    let $deleteButton = $('#deleteChar');

    $deleteButton.click(function(e){

        $("input").prop("disabled", false);
        $('textarea').prop("disabled", false);

    });

});
