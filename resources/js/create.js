document.getElementById('formCreateId').addEventListener('click', (event) => deleteProduct(event))
document.getElementById('addProductBtnId').addEventListener('click', addProduct)

function deleteProduct(event) {
    if (event.target.classList.contains('addProductDelete')){
        event.target.parentNode.remove()
    }
}
function addProduct() {
    const element = document.querySelectorAll('.add-product-block')
    const length = element.length

    const htmlString =
        `<div class="add-product-block">
            <label for="sizeId">Название</label>
            <input class="add-product-name" id="addProductNameId_${length+1}" name="attributes_name[${length+1}]">
            <label for="sizeId">Значение</label>
            <input class="add-product-value" id="addProductValueId_${length+1}" name="attributes_value[${length+1}]">
            <button type="button" class="addProductDelete" id="addProductDeleteId_${length+1}">Delete</button>
        </div>`

    if (length > 0){
        const elementAfterAdd = element[length-1]
        elementAfterAdd.insertAdjacentHTML('afterend', htmlString)
    }else {
        const elementAfterAdd = document.getElementById('selectorStatusId')
        elementAfterAdd.insertAdjacentHTML('afterend', htmlString)
    }
}
