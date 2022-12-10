(function(){
    function handleMoneyVND(number){
        const arrayString = [...String(number)];
        const money = [];
        for(let i = arrayString.length - 1 ; i >= 0 ; i--){
            if(i % 3 === 0 && i !== arrayString.length- 1 && i !==0 ){
                money.push(arrayString[i],'.');
            }else{
                money.push(arrayString[i]);
            }
        }
        
        return money.reverse().join('') + ' vnd';
      }
      function showPrice(element){
         const price =  element.getAttribute('data-value');
         const money = handleMoneyVND(price);
         element.innerText = money;
    }
    
    const elementList = document.querySelectorAll('.show-price');
    if(elementList){
        Array.from(elementList).forEach(element =>{
             showPrice(element)
        })
    }
    
})();