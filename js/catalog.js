// ================================================ Catalog выводит весь каталог ===========================================
// сперва узнаем GET параметры пришедшие
    let GET = window.location.search.substring(4);
    console.log(GET);

// узнаем и пишем, что в корзине (количество)
let xhr = new XMLHttpRequest();
xhr.open('GET',`/handlers/handler_goods.php`);
xhr.send();
xhr.addEventListener('load',()=>{

    let goodsQauntity = xhr.responseText;
    let quantityEl = document.querySelector('.block-and-icon__quantity');

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
    static fileRoad(subvalue) {
        let h1 = document.querySelector('.h1');
        let road = document.querySelector('.road');
        if(subvalue == 'all') {

            h1.innerText = 'Общий каталог';
            road.innerHTML = `
                <span>Главная /</span>
                <span> Все </span>
            `;
        } else if (subvalue == 1) {

            h1.innerText = 'Мужчинам';
            road.innerHTML = `
            <span>Главная /</span>
            <span> Мужчинам /</span>
        `;
        } else if (subvalue == 2) {

            h1.innerText = 'Женщинам';
            road.innerHTML = `
            <span>Главная /</span>
            <span> Женщинам /</span>
        `;
        } else if (subvalue == 3) {

            h1.innerText = 'Детям';
            road.innerHTML = `
            <span>Главная /</span>
            <span> Детям /</span>
        `;
        }
    }
    static preoloaderOn(insertEl) {
        let preloader = document.createElement('div');
        preloader.classList.add('preloader');
        preloader.innerHTML = '<div class="loader"></div>'; 
        insertEl.appendChild(preloader);
    }
    static preoloaderOff(insertEl) {
        let preloader = insertEl.querySelector('.preloader');
        preloader.style.display = 'none';
    }
    cleanCatalog() {
        this.parentGoods.innerHTML = '';
    }
    renderPagination(data,catalogId) {
            let pagPagesBlock = document.querySelector('.pagination');
            let counter = data['allPages'];
            pagPagesBlock.innerHTML = '';
            for(let i = 1; i <= counter; i++) {

                let pagPagesItem = document.createElement('div');
                if (data['currentPage'] == i) {
                    pagPagesItem.classList.add('pagination__item_current');
                } else if(data['currentPage'] == 0 && i == 1){
                    pagPagesItem.classList.add('pagination__item_current');
                }            
                pagPagesItem.classList.add('pagination__item');
                pagPagesItem.innerText = i;
                pagPagesItem.addEventListener('click',()=> {
                    this.renderCatalog(catalogId,i);
                });
                pagPagesBlock.appendChild(pagPagesItem);
            }; 
    }
    renderCatalog(catalogId = 'all', pageNum = 1, price = 'all_prices', GET='') {

        this.cleanCatalog(); 
        Catalog.preoloaderOn(this.parentGoods);
        let flagPrice = price;
        let catalog = catalogId;

        // AJAX 
        let xhr = new XMLHttpRequest();
        xhr.open('GET',`/handlers/handler_catalog.php?category=${catalog}&page=${pageNum}`);
        xhr.send();
        xhr.addEventListener('load', ()=>{
  
            Catalog.preoloaderOff(this.parentGoods);
            let data = JSON.parse(xhr.responseText);
            data['products'].forEach( (val,index) => {
                let good = new Goods(val.id, val.pic, val.alt, val.title, val.price);
                good.renderGoods();
            });
            this.renderPagination(data['pagination'], catalogId);
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
let form = document.querySelector('.search');
let categories = form.querySelector('[name="categories"]');
let subCategories = form.querySelector('.sub-categories');
let subPrice = form.querySelector('.sub-price');

// выводим нужный контент,если перешли по ссылке

if (GET) {
    let catalog = new Catalog().renderCatalog(GET);
    Catalog.fileRoad(GET);
    categories.value = `${GET}`;
}
let catalog = new Catalog().renderCatalog();

// создаем обработчик change для формы + подгрузка товара по подкатегориям

categories.addEventListener('change', function() {

    Catalog.fileRoad(this.value);
    catalog = new Catalog().renderCatalog(this.value);
    if(this.value == 'all') {

        subCategories.style.display  = 'none';
        subPrice.style.display = 'none';
    } else {

        if(this.value == '1') {

            subCategories.innerHTML = `
                <option value="all">Все</option>
                <option value="4">Обувь</option>
                <option value="5">Куртки</option>
                <option value="6">Джинсы</option>
                <option value="7">Рюкзаки</option>`;
        } else if(this.value == '2'){

            subCategories.innerHTML = `
                <option value="all">Все</option>
                <option value="8">Верхняя одежда</option>
                <option value="9">Туфли</option>
                <option value="10">Шляпки</option>`;
        } else if(this.value == '3') {
            subCategories.innerHTML = `<option value="all">Пусто</option>`;
        }
        subCategories.style.display = 'block';
    }
});

subCategories.addEventListener('change', function() {

    catalog = new Catalog().renderCatalog(this.value);
    subPrice.style.display = 'block';
});

