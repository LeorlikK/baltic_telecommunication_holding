const addProduct = document.getElementById('addProductId')
if (addProduct) {
    addProduct.addEventListener('click', addProductFunc)
}
function addProductFunc(event) {
    console.log(addProduct.hidden)
    const windowAddProduct = document.getElementById('windowAddProductId')
    windowAddProduct.style.visibility === 'visible' ?
        windowAddProduct.style.visibility = 'hidden' :
        windowAddProduct.style.visibility = 'visible'
}
