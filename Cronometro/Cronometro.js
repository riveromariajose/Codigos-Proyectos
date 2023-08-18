
let boton= document.getElementById("Iniciar");
let boton2= document.getElementById("Detener");
let boton3= document.getElementById("Reiniciar");
let boton4= document.getElementById("Registros");

let minutos= document.getElementById("minutos");
let segundos= document.getElementById("segundos");
let milisegundos= document.getElementById("milisegundos");

let conmin=0;
let conseg=0;
let conmil=0;
let vuelta=0;
let incremento;

let varmilesimas=0;
let varsegundos=0;
let varminutos=0;

let start=()=>{
    const conteo= ()=>{
        conmil++
        if(conmil<100){
            if(conmil<10){
                milisegundos.innerText="0"+conmil;
            }else{
                milisegundos.innerText=conmil;
            }
        }else{
            conmil=0;
            conseg++;
            if(conseg<60){
                if(conseg<10){
                    segundos.innerText="0"+conseg;
                }else{
                    segundos.innerText=conseg;
                }
            }else{
                conseg=0;
                conmin++;
                if(conmin<60){
                    if(conmin<10){
                        minutos.innerText="0"+conmin;
                    }else{
                        minutos.innerText=conmin;
                    }
                }else{
                    conmin=0;
                }
            }
        }
    }
    incremento=setInterval(conteo,10);
    boton.removeEventListener("click", start);
}

boton.addEventListener("click", start);

boton2.addEventListener("click",()=>{
    clearInterval(incremento)
    boton.addEventListener("click", start);
});

boton3.addEventListener("click", ()=>{
    conmil=0;
    conseg=0;
    conmin=0;
    minutos.innerText="00";
    segundos.innerText="00";
    milisegundos.innerText="00";
    lista.innerHTML="";
    lista.classList.add("hidden")
});

boton4.addEventListener("click",()=>{
    if(conmil>0 && conseg>=0){
        let parrafo= document.createElement("p");
        if(conmin<10){
            if(conseg<10){
                if(conmil<10){
                    parrafo.textContent=(`0${conmin}:0${conseg}:0${conmil}`);
                }
                else{
                    parrafo.textContent=(`0${conmin}:0${conseg}:${conmil}`);
                }
            }else{
                parrafo.textContent=(`0${conmin}:${conseg}:${conmil}`);
            }
        }else{
            parrafo.textContent=(`${conmin}:${conseg}:${conmil}`);
        }
        parrafo.classList.add("text-[25px]", "italic", "font-bold", "text-black");
        lista.classList.remove("hidden");
        lista.classList.add("bg-black/25","rounded-xl","flex","flex-col","items-center","py-4");
        lista.appendChild(parrafo);
    }
});










