const pedro_soares = {

    limitsInput:document.querySelectorAll('input[data-limit]');
    limitCaracteres(){
        this.limitsInput.forEach((v,i)=>{
            const number = v.dataset.limit;
            v.onkeyup = ()=>{
                if(v.value.length > parseInt(number)){

                    

                }
            };
        });
    },
    init(){

    }
}
pedro_soares.init();
