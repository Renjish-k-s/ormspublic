$(document).ready(function () {
    $("#ethicsReview").click(function (e) {
        e.preventDefault(); // Prevent default link behavior
        $("#contentchange").load("initial.php");
    });

    $("#scientificReview").click(function (e) {
        e.preventDefault();
        $("#contentchange").load("./scientific_review/index.php");
    });
});