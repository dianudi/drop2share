const inputFile = document.querySelector('div > input[type="file"]');
if (inputFile) {
    inputFile.addEventListener("change", () => {
        const inputName = document.querySelector('div > input[name="name"]');
        inputName.value = inputFile.files[0].name;
    });
}
