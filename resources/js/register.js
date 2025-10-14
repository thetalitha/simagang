document.addEventListener("DOMContentLoaded", () => {
    const roleSelect = document.getElementById("role");
    const institusiField = document.getElementById("institusi-field");
    const institusiInput = document.getElementById("institusi-input");

    roleSelect.addEventListener("change", () => {
        if (roleSelect.value === "peserta") {
            institusiField.style.display = "block";
            institusiInput.setAttribute("required", "true");
        } else {
            institusiField.style.display = "none";
            institusiInput.removeAttribute("required");
            institusiInput.value = ""; // reset kalau sempat diisi
        }
    });
});
