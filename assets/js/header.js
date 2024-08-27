


document.addEventListener("DOMContentLoaded", function () {
    // <a> etiketini bulun
    var btnnn = document.getElementById("btnnn");

    // <a> etiketine tıklandığında bir sınıf eklemek için bir olay dinleyici ekleyin
    btnnn.addEventListener("click", function () {
        // Sınıfı ekleyin
        btnnn.classList.add("active");
    });
});
