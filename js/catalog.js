// ================================================ Catalog выводит весь каталог ===========================================
// сперва узнаем и пишем, что в корзине (количество)

let xhr = new XMLHttpRequest();
xhr.open('GET',`/handlers/handler_goods.php`);
xhr.send();
xhr.addEventListener('load',()=>{

    let goodsQauntity = xhr.responseText;
    let quantityEl = document.querySelector('.block-and-icon__quantity');
    console.dir(quantityEl);
    if(goodsQauntity == 0) {
        goodsQauntity = 'Корзина пустая';
    }
    quantityEl.innerText = `( ${goodsQauntity} )`;
});
// создаем класс каталог и класс товар

class Catalog {
    constructor() {
        this.parentGoods = document.querySelector('.goods');
    }
    preoloaderOn() {
        let preloader = document.createElement('div');
        preloader.classList.add('preloader');
        preloader.innerHTML = '<div class="loader"></div>'; 
        this.parentGoods.appendChild(preloader);
    }
    preoloaderOff() {
        let preloader = this.parentGoods.querySelector('.preloader');
        preloader.style.display = 'none';
    }
    cleanCatalog() {
        this.parentGoods.innerHTML = '';
    }
    renderCatalog(catalogId = 1) {
        this.cleanCatalog(); 
        this.preoloaderOn();
        let catalog = catalogId;

        // AJAX 
        let xhr = new XMLHttpRequest();
        xhr.open('GET',`/handlers/handler_catalog.php?category=${catalog}`);
        xhr.send();
        xhr.addEventListener('load', ()=>{
  
            this.preoloaderOff();
            let data = JSON.parse(xhr.responseText);
            data.forEach( (val,index) => {
                let good = new Goods(val.id,val.pic, val.alt, val.title, val.price);
                console.log(val);
                good.renderGoods();
            });
        });
    }
}

// Goods выводит карточки товаров
class Goods {

    constructor(id,pic,alt,title,price) {
        this.id = id;
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
            <a href="/goods.php?id=${this.id}">
                <img src="/images/catalog-img/${this.pic}" alt="${this.alt}">
            </a>
            <div class="goods-item-title">${this.title}</div>
            <div class="goods-item-price">${this.price} руб</div>       
        `;
        this.parentGoods.appendChild(goodsItem);
    };
};

let catalog = new Catalog().renderCatalog();

// создаем обработчик change для формы + подгрузка товара по категориям

let form = document.getElementById('search');
let categories = form.querySelector('[name="categories"]');

categories.addEventListener('change', function() {
    let catalog = new Catalog().renderCatalog(this.value);
});

