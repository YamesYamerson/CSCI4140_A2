function showProductInfo(name, description, price) {
    var info = "Product Name: " + name + "<br/>"
             + "Description: " + description + "<br/>"
             + "Price: " + price;

    var infoDiv = document.createElement("div");
    infoDiv.innerHTML = info;
    infoDiv.classList.add("product-info");

    document.body.appendChild(infoDiv);
}
