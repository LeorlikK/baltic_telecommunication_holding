document.getElementById('formCreateId').addEventListener('click', (event) => deleteProduct(event))
document.getElementById('addProductBtnId').addEventListener('click', addProduct)

function deleteProduct(event) {
    console.log(event.target)
    if (event.target.classList.contains('addProductDelete')){
        event.target.parentNode.parentNode.remove()
    }
}
function addProduct() {
    const element = document.querySelectorAll('.add-product-block')
    const length = element.length

    const htmlString =
        `<div class="add-product-block">
            <div class="box-create box-atr">
                <label for="addProductNameId_${length+1}">Название</label>
                <label for="addProductValueId_${length+1}">Значение</label>
            </div>
            <div class="box-create box-atr">
                <input id="addProductNameId_${length+1}" name="article"">
                <input id="addProductValueId_${length+1}" name="name">
                <button type="button" class="addProductDelete" id="addProductDeleteId_${length+1}">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                    </svg>
                </button>
            </div>
        </div>`

    if (length > 0){
        const elementAfterAdd = element[length-1]
        elementAfterAdd.insertAdjacentHTML('afterend', htmlString)
    }else {
        const elementAfterAdd = document.getElementById('textAtrId')
        elementAfterAdd.insertAdjacentHTML('afterend', htmlString)
    }
}
