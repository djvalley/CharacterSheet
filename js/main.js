$(document).ready(function() {

    // START Character Edit button code

    let $editCharBtn = $("button");
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

});