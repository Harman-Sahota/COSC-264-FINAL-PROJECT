window.onload = function (e) {
    document.getElementById("submit").onclick = function () { myFunction() };
    function myFunction() {
        var highlights = document.querySelectorAll(".hilightable");

        for (var i = 0; i < highlights.length; i++) {
            highlights[i].addEventListener("focus", function (e) {
                var event = e.target;
                event.classList.toggle("highlight");
            });
            highlights[i].addEventListener("blur", function (g) {
                var blur_event = g.target;
                blur_event.classList.toggle("highlight");
            });
        }
        document.getElementById("contactForm").onsubmit = function name(e) {

            var required = document.querySelectorAll(".required");
            var hrequired = document.querySelectorAll(".hilightable");

            for (var j = 0; j < required.length; j++) {
                if (required[j].value == null || required[j].value == "") {
                    e.preventDefault();
                    required[j].classList.toggle("error");
                }
            }
        }
        document.getElementById("contactForm").onchange = function name(e) {
            var currentSelect = e.target;

            if (currentSelect.value != null || currentSelect.value != "") {
                currentSelect.classList.toggle("error");
            }
        }
    }
}