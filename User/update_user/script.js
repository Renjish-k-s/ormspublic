document.addEventListener("DOMContentLoaded", function () {
    const gcp_status = document.getElementById("gcp_status");
    const gcp_display = document.getElementById("gcp_display");
    const profilePhoto = document.getElementById("profilePhoto");
    const photoPreview = document.getElementById("photoPreview");

    gcp_status.addEventListener("change", function () {
        gcp_display.style.display = (this.value === "yes") ? "block" : "none";
    });

    profilePhoto.addEventListener("change", function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            photoPreview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
});