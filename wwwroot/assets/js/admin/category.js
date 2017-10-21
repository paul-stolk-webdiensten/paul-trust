var addButton = $("#addEntry");
var updateButton = $("#updateEntry");
var deleteButton = $("#deleteEntry");

$("#url_example").html($("#url").val());

$("#url").on("keyup", function () {
    $("#url_example").html($(this).val());
});

//function for creating an entry
addButton.on("click", function () {
    "use strict";
    event.preventDefault();

    addButton.attr("disabled", true);
    addButton.html("Toevoegen...");
    $("#addEntryFeedback").html("");
    $("#entryAdded").html("");

    var insertData = {
        url: $("#url").val(),
        name: $("#name").val()
    };


    $.ajax({
        type: "POST",
        url: "/ajax/createCategory",
        data: insertData,
        success: function (addResult) {
            addResult = $.parseJSON(addResult);

            if ("error" in addResult) {
                $.each(addResult.error, function (fieldName, errorText) {
                    $("#addEntryFeedback").append("<div class='alert alert-danger'>" + errorText + "</div>");
                });
                window.location.hash = '#notify';
                location.hash = '';

                addButton.attr("disabled", false);
                addButton.html("Categorie toevoegen");
            } else {
                $("#entryAdded").html("<div class='alert alert-success'>De categorie is aangemaakt!</div>");
                window.location.hash = '#notify';
                location.hash = '';
                $("#url").val("");
                $("#name").val("");

                addButton.attr("disabled", false);
                addButton.html("Categorie toevoegen");
            }
        },
        error: function () {
            $("#addEntryFeedback").html("<div class='alert alert-danger'>De categorie kon niet worden opgeslagen. Probeer de pagina opnieuw te laden en probeer het opnieuw.</div>");
            window.location.hash = '#notify';
            location.hash = '';

            addButton.attr("disabled", false);
            addButton.html("Categorie toevoegen");
        }
    });
});


//function for updating an entry
updateButton.on("click", function() {
    "use strict";
    event.preventDefault();

    updateButton.attr("disabled", true);
    updateButton.html("Opslaan...");
    $("#updateEntryFeedback").html("");
    $("#entryAdded").html("");

    var updateData = {
        url: $("#url").val(),
        name: $("#name").val()
    };


    $.ajax({
        type: "POST",
        url: "/ajax/updateCategory/" + entryId,
        data: updateData,
        success: function (addResult) {
            addResult = $.parseJSON(addResult);

            //move success text to top bar
            //clear fields
            //hide #video_information
            if("error" in addResult) {
                $.each(addResult.error, function(fieldName, errorText) {
                    $("#updateEntryFeedback").append("<div class='alert alert-danger'>" + errorText + "</div>");
                });
                window.location.hash = '#notify';
                location.hash = '';

                updateButton.attr("disabled", false);
                updateButton.html("Categorie opslaan");
            } else {
                $("#entryAdded").html("<div class='alert alert-success'>De categorie is aangepast!</div>");
                window.location.hash = '#notify';
                location.hash = '';

                updateButton.attr("disabled", false);
                updateButton.html("Categorie opslaan");
            }
        },
        error: function() {
            $("#updateEntryFeedback").html("<div class='alert alert-danger'>De categorie kon niet worden gevonden. Probeer de pagina opnieuw te laden en probeer het opnieuw.</div>");
            window.location.hash = '#notify';
            location.hash = '';

            updateButton.attr("disabled", false);
            updateButton.html("Categorie opslaan");
        }
    });
});

//function for deleting an entry
deleteButton.on("click", function() {
    "use strict";
    event.preventDefault();

    deleteButton.attr("disabled", true);
    deleteButton.html("Verwijderen...");
    $("#addEntryFeedback").html("");

    var deleteData = {new_category: $("#new_category").val()};
    $.ajax({
        type: "POST",
        data: deleteData,
        url: "/ajax/deleteCategory/" + entryId,
        success: function (addResult) {
            addResult = $.parseJSON(addResult);
            if("error" in addResult) {
                $.each(addResult.error, function(fieldName, errorText) {
                    $("#addEntryFeedback").append("<div class='alert alert-danger'>" + errorText + "</div>");
                });

                deleteButton.attr("disabled", false);
                deleteButton.html("Verwijderen");
            } else {
                $("#entryAdded").html("<div class='alert alert-success'>Categorie is verwijderd!</div>");
                $(".panel").hide();

                deleteButton.attr("disabled", false);
                deleteButton.html("Verwijderen");
            }
        },
        error: function() {
            $("#addEntryFeedback").html("<div class='alert alert-danger'>Verwijderen niet gelukt. Er leek iets mis te gaan met de verbinding met de database.</div>");

            deleteButton.attr("disabled", false);
            deleteButton.html("Verwijderen");
        }
    });
});

//button on _read page for going to the update page
$(".edit-button").on("click", function() {
    "use strict";
    window.location.href = "/admin/update/category/" + $(this).closest("tr").attr('attr-entry-id');
});

//button on _read page for going to the delete page
$(".delete-button").on("click", function() {
    "use strict";
    window.location.href = "/admin/delete/category/" + $(this).closest("tr").attr('attr-entry-id');
});