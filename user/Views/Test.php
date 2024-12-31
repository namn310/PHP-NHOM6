<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="product-list">

    </div>
    <script>
        axios.get("index.php?controller=test&action=productApi")
            .then(response => {
                const product = response.data;
                console.log(product);
                const productList = document.getElementById("product-list");
                product.forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.innerHTML = `
                    <h2>${product.namePro}</h2>
                    <p>Price: $${product.giaban}</p>
                    <p>${product.mota}</p>
                    <hr>
                `;
                    productList.appendChild(productDiv);
                });
            })
            .catch(error => {
                console.error('Có lỗi xảy ra:', error);
            });
    </script>
</body>

</html>