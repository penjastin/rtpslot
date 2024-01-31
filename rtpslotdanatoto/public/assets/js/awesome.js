const fontAwesomeUrl =
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css";

fetch(fontAwesomeUrl)
    .then((response) => response.text())
    .then((data) => {
        const style = document.createElement("style");
        style.textContent = data;
        document.head.appendChild(style);

        const iconElement = document.createElement("i");
        iconElement.classList.add("fas", "fa-icon-name"); // Ganti 'fa-icon-name' dengan nama ikon Font Awesome yang Anda inginkan
        document.querySelector(".icon-container").appendChild(iconElement);
    });
