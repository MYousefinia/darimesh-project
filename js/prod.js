// Here we go

function $(id){
    return document.getElementById(id);
}

var actionColl = document.querySelector('.product-action');
var actionGet = actionColl.querySelectorAll('.action');

document.querySelectorAll('.product-container .product-card').forEach(product=>{
    product.onclick = () => {
        actionColl.style.display = 'flex';
        var name = product.getAttribute('data-name');
        actionGet.forEach(action => {
            var target = action.getAttribute('data-target');
            if(name == target){
                action.classList.add('active');
            }
        });
    };
});

actionGet.forEach(close =>{
    close.querySelector('.fa-xmark').onclick = () => {
        close.classList.remove('active');
        actionColl.style.display = 'none';
    }
});

// end