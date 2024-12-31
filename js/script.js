
// cart hover
var cards = document.querySelectorAll(".product-box");
[...cards].forEach((cards) => {
	cards.addEventListener("mouseover", function () {
		cards.classList.add("is-hover");
	});
	cards.addEventListener("mouseleave", function () {
		cards.classList.remove("is-hover");
	});
});
function compareString(a, b) {
	if (a.indexOf(b) > -1 || b.indexOf(a) > -1) {
		return true;
	} else return false;
}
//searchProduct
$(document).ready(function () {
	$("#nameProductSearch").on("keyup", function () {
		var q = document
			.getElementById("nameProductSearch")
			.value.toLowerCase();
		var product = document.querySelectorAll("#product-infor");
		var productName = document.querySelectorAll("#name-product");
		productName.forEach((a) => {
			$(a).parent().parent().filter(function () {
				$(a).parent().parent().toggle($(a).text().toLowerCase().indexOf(q) > -1)
			});
		});
	});
});
