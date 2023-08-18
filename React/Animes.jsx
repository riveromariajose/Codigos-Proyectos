import { useEffect ,useState } from "react";
import axios from "axios";

const Animes = () => {
    const [search, setSearch] = useState("");
    const [anime, setAnime]=useState([]);
    const [numPag, setNumPag] = useState(1); 

    useEffect(()=>{
        async function obtenerDatos() {
            try {
                const res = await axios.get(` https://api.jikan.moe/v4/anime/${numPag}/full`)
                    console.log(res.data.data);
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
        },[numPag]);

        // useEffect(()=>{
        //     async function buscador(){
        //         try{
        //             const res = await axios.get(`https://api.jikan.moe/v4/anime?q=${search}&limit=20`)
        //             setAnime(res.data.data)
        //         } catch (err) {
        //             console.log(err)
        //             if(err.response.status === 404){
        //                 alert("No se encontro la ruta indicada")
        //             }
        //         }
        //     }
        //     buscador()
        // },[search]);

    const estilos={
        Main:"fle justify-center items-center",
        Div:"flex flex-col justify-center items-center w-[50%] ml-[450px] gap-2  p-[20px] rounded-md shadow-[-7px_15px_15px_10px_rgba(0,0,0,0.3)] font-['Amarante'] font-bold text-[20px]",
        Imagen: "rounded-md w-[200px] h-[300px] shadow-md shadow-stone-900 mt-2 hover:-translate-y-1 hover:scale-110 cursor-pointer",
        Button:" flex justify-center items-center gap-8 pt-[30px]",
        Flechas:"w-[100px]",
        Input: "rounded-2xl border border-slate-400 w-[500px] text-center h-[40px] hover:border-current bg-slate-200 ",
        Imagenes: "w-[30px]",
        Caja2: "w-[100px] flex justify-around",
        Nav:"flex justify-center items-center pb-[30px]",
    }

    console.log(anime)
    return ( 
        <main className={estilos.Main}>
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
                {(anime != null)
                    ? <div className={estilos.Div}>
                        <p>{anime.mal_id}</p>
                        {(anime.images.jpg.image_url != null)
                        ? <img className={estilos.Imagen} src={anime.images.jpg.image_url} alt={anime.title} />
                        : <img className={estilos.Imagen} src="./../../public/sunny.webp" alt={anime.title} />
                        }
                        
                        <p>Titulo: {anime.title}</p>
                        <p>Titulo en Japones: {anime.title_japanese}</p>
                        <p>Año: {anime.year}</p>
                        <p>Capitulos: {anime.episodes}</p>
                        <p>Descripción: {anime.background}</p>
                    </div> 
                    : <p>Esperando datos</p>
                }
            
            <div className={estilos.Button}>
                <button
                    onClick={
                        ()=>{
                            (numPag > 1)
                            ? setNumPag(numPag - 1)
                            : setNumPag(24559);
                        }
                    }
                >
                    <img className={estilos.Flechas} src="./flecha-izq.png" alt="" />
                </button>
                <button
                    onClick={
                        ()=>{
                            (numPag <= 24559)
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

export default Animes;