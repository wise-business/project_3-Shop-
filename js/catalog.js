// Catalog выводит весь каталог
class Catalog {
    constructor() {
        this.parentGoods = document.querySelector('.goods');
    }
    preoloaderOn() {
        let preloader = document.createElement('div');
        preloader.classList.add('preloader');
        preloader.innerText = 'Download...';
        this.parentGoods.appendChild(preloader); 
    }
    preoloaderOff() {
        let preloader = this.parentGoods.querySelector('.preloader');
        preloader.remove();
    }
    renderCatalog() {

        // AJAX 
        let xhr = new XMLHttpRequest();
        this.preoloaderOn();
        // создать соединение с сервером
        xhr.open('GET','/handlers/handler_catalog.php');

        // отправить данные на сервер
        xhr.send();

        xhr.addEventListener('load', ()=>{

            this.preoloaderOff();
            let data = JSON.parse(xhr.responseText);
            console.log(xhr);
            data.forEach( (val,index)=> {
                new Goods(val.pic,val.alt,val.title,val.price).renderGoods()
            });
        });
    }
}

// Goods выводит карточки товаров
class Goods {

    constructor(pic,alt,title,price) {
        this.pic = pic;
        this.alt = alt;
        this.title = title;
        this.price = price;
        this.parentGoods = document.querySelector('.goods');
    };
    renderGoods() {

        let goodsItem = document.createElement('div');

        goodsItem.classList.add('goods-item');
        goodsItem.innerHTML = `           
            <img src="/images/catalog-img/${this.pic}" alt="${this.alt}">
            <div class="goods-item-title">${this.title}</div>
            <div class="goods-item-price">${this.price} руб</div>       
        `;
        this.parentGoods.appendChild(goodsItem);
    };
};

new Catalog().renderCatalog();
