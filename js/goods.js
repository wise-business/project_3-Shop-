let xhr = new XMLHttpRequest();
xhr.open('GET',`/handlers/handler_goods.php`);
xhr.send();
xhr.addEventListener('load',()=>{
    let goodsQauntity = xhr.responseText;
    let quantityEl = document.querySelector('.block-and-icon__quantity');
    console.dir(quantityEl);
    if(goodsQauntity == 0) {
        goodsQauntity = '( Корзина пустая )';
    }
    quantityEl.innerText = `${goodsQauntity}`;
});

let buttonEl = document.querySelector('.add-to-basket');
buttonEl.addEventListener('click',function() {

    let id = this.getAttribute('data-id');
    let xhr = new XMLHttpRequest();
    xhr.open('GET',`/handlers/handler_goods.php?id=${id}`);
    xhr.send();
    xhr.addEventListener('load',()=>{
        let goodsQauntity = xhr.responseText;
        let quantityEl = document.querySelector('.block-and-icon__quantity');
        quantityEl.innerText = `( ${goodsQauntity} )`;
    });
});