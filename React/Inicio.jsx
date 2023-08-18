import { useState, useEffect } from "react";
import axios from "axios";


const Inicio = () => {
    const [anime, setAnime] = useState([]);
    const [search, setSearch] = useState("");
    const [numPag, setNumPag] = useState(1); 

    useEffect(()=>{
        async function obtenerDatos() {
            try {
                const res = await axios.get(` https://api.jikan.moe/v4/anime?page=${numPag}`);
                console.log(res.data.data[0]);
                setAnime(res.data.data);
            } catch (err) {
                console.log(err)
                if(err.response.status === 404){
                    alert("No se encontro la ruta indicada")
                }
    
                console.log(`Ocurrio un error: ${err}`);
            }
        }
        obtenerDatos()
    },[anime, numPag]);

    useEffect(()=>{
        async function buscador(){
            try{
                const res = await axios.get(`https://api.jikan.moe/v4/anime?q=${search}&limit=20`)
                setAnime(res.data.data)
            } catch (err) {
                console.log(err)
                if(err.response.status === 404){
                    alert("No se encontro la ruta indicada")
                }
            }
        }
        buscador()
    },[search]);

    const estilos = {
        CajaP: "grid grid-cols-5 content-center justify-items-center gap-8  font-['Amarante'] font-bold p-[15px]" ,
        Caja: "col-span-1  flex flex-col items-center justify-center h-[auto] rounded-md shadow-[-7px_15px_15px_3px_rgba(0,0,0,0.3)] gap-3 p-2 w-[260px] ",
        Ancla:"flex flex-col items-center justify-center gap-3",
        Imagen: "rounded-r-lg w-[180px] h-[250px] shadow-md shadow-stone-900 mt-2 hover:-translate-y-1 hover:scale-110 cursor-pointer",
        Parrafo: " text-xl drop-shadow-lg text-center",
        Main:"m-[20px]",
        Input: "rounded-2xl border border-slate-400 w-[500px] text-center h-[40px] hover:border-current bg-slate-200 ",
        Imagenes: "w-[30px]",
        Caja2: "w-[100px] flex justify-around",
        Nav:"flex justify-center items-center pb-[30px]",
        Button:" flex justify-center items-center gap-8 pt-[30px]",
        Flechas:"w-[100px]"
    }
    return ( 
        <main className={estilos.Main} >
            <nav className={estilos.Nav}>
                <div style={{
                        display:"flex",
                        justifyContent:"center",
                        flexGrow:"1"
                        }}>
                    <input type="search"
                        placeholder="Buscar tu anime preferido"
                        className={estilos.Input}
                        value={search}
                        onChange={(e) => setSearch(e.target.value)}
                    />
                </div>
                <div className={estilos.Caja2}>
                    <button>
                        <img 
                            className={estilos.Imagenes}
                            src="./moon.png" 
                            alt="nocturno" 
                            onClick={()=>{
                                document.body.classList.remove("bg-blue-200" , "text-black");
                                document.body.classList.add("bg-slate-900", "text-white");
                            }}
                        />
                    </button>
                    <button>
                        <img 
                            className={estilos.Imagenes} 
                            src="./sun.png" 
                            alt="claro" 
                            onClick={()=>{
                                document.body.classList.remove("bg-slate-900", "text-white");
                                document.body.classList.add("bg-blue-200" , "text-black");
                            }}
                        />
                    </button>
                </div>
            </nav>
            <div className={estilos.CajaP}>
                {
                    anime.map(
                        (element)=> (
                        <div className= {estilos.Caja}>
                            <a className={estilos.Ancla} href={element.url}>
                                <img 
                                    className= {estilos.Imagen} 
                                    src={element.images.jpg.image_url} 
                                    alt={element.title} 
                            />
                            </a>
                            <p className={estilos.Parrafo}>{element.title}</p>
                        </div>
                        
                        )
                    )
                }
            </div>
            <div className={estilos.Button}>
                <button
                    onClick={
                        ()=>{
                            (numPag > 1)
                            ? setNumPag(numPag - 1)
                            : setNumPag(25);
                        }
                    }
                >
                    <img className={estilos.Flechas} src="./flecha-izq.png" alt="" />
                </button>
                <button
                    onClick={
                        ()=>{
                            (numPag <= 25)
                            ? setNumPag(numPag + 1)
                            : setNumPag(1);
                        }
                    }
                >
                    <img className={estilos.Flechas} src="./flecha-derecha.png" alt="" />
                </button>
            </div>
        </main>
    );
}

export default Inicio;