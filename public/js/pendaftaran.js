document.addEventListener("DOMContentLoaded", () => {
    const nominal = document.getElementById("nominal");
    const nominalBackend = document.getElementById("nominal_backend");

    nominal?.addEventListener("input", () => {
        let value = nominal.value.replace(/\D/g, "");
        if (value === "") return;
        nominal.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });

    const dropArea = document.getElementById("drop-area");
    const inputFile = document.getElementById("gambar");
    const previewContainer = document.getElementById("preview-container");
    const previewThumb = document.getElementById("preview-thumb");
    const previewIcon = document.getElementById("preview-icon");
    const deleteBtn = document.getElementById("delete-preview");

    function handleFile(file) {
        if (!file) return;

        if (file.size > 2 * 1024 * 1024) {
            alert("File terlalu besar (max 2MB)");
            inputFile.value = "";
            return;
        }

        dropArea.style.display = "none";
        previewContainer.style.display = "flex";

        document.getElementById("preview-name").textContent = file.name;
        document.getElementById("preview-size").textContent =
            (file.size / 1024).toFixed(1) + " KB";

        previewThumb.style.display = "none";
        previewIcon.style.display = "none";

        if (file.type.includes("image")) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewThumb.src = e.target.result;
                previewThumb.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            previewIcon.style.display = "block";
        }
    }

    dropArea?.addEventListener("click", () => inputFile.click());
    inputFile?.addEventListener("change", () => handleFile(inputFile.files[0]));

    ["dragenter", "dragover", "dragleave", "drop"].forEach((evt) => {
        dropArea?.addEventListener(evt, (e) => e.preventDefault());
    });

    dropArea?.addEventListener("dragover", () =>
        dropArea.classList.add("border-blue-400", "bg-blue-50")
    );
    dropArea?.addEventListener("dragleave", () =>
        dropArea.classList.remove("border-blue-400", "bg-blue-50")
    );
    dropArea?.addEventListener("drop", (e) => {
        dropArea.classList.remove("border-blue-400", "bg-blue-50");
        const file = e.dataTransfer.files[0];
        inputFile.files = e.dataTransfer.files;
        handleFile(file);
    });

    deleteBtn?.addEventListener("click", () => {
        inputFile.value = "";
        previewContainer.style.display = "none";
        previewThumb.style.display = "none";
        previewIcon.style.display = "none";
        dropArea.style.display = "block";
    });

    const form = document.getElementById("form-pendaftaran");
    form?.addEventListener("submit", (e) => {
        if (nominal) {
            const numericValue = nominal.value.replace(/\./g, "");
            if (parseInt(numericValue, 10) < 10000) {
                e.preventDefault();
                alert("Nominal minimal Rp 10.000");
                return;
            }
            nominalBackend.value = numericValue;
        }

        form.querySelector('button[type="submit"]').disabled = true;
    });
});
