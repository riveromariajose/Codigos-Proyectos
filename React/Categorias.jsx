import axios from "axios";
import {useEffect, useState } from "react";

const Categorias = () => {
    const [categoria, setCategoria]= useState([]);
    const [search, setSearch] = useState("");

    useEffect(()=>{
        axios.get(`https://api.jikan.moe/v4/genres/anime`)
        .then(
            function(res){
                console.log(res.data.data[0]);
                setCategoria(res.data.data);
            }
        )
        .catch(
            function(err){
                console.log(err)
            }
        );
    });

    useEffect(()=>{
        async function buscador(){
            try{
                const res = await axios.get(`https://api.jikan.moe/v4/genres/anime?q=${search}`)
                setCategoria(res.data.data)
            } catch (err) {
                console.log(err)
                if(err.response.status === 404){
                    alert("No se encontro la ruta indicada")
                }
            }
        }
        buscador()
    },[search]);

    const estilos={
        Section:"grid grid-cols-4 content-center justify-items-center gap-4 p-[30px] w-[90%] ml-[100px] mb-[30px] rounded-md shadow-[-7px_15px_15px_10px_rgba(0,0,0,0.3)] font-['Amarante'] font-bold text-[25px] ",
        Parrafo: "hover:-translate-y-1 hover:scale-110 cursor-pointer",
        Input: "rounded-2xl border border-slate-400 w-[500px] h-[40px] text-center hover:border-current bg-slate-200 ",
        Imagenes: "w-[30px]",
        Caja2: "w-[100px] flex justify-around",
        Nav:"flex justify-center items-center pb-[30px]",
        Main:"fle justify-center items-center bg-blue-200"
    }


    return ( 
        <main>
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
            <section className={estilos.Section}>
                {
                    categoria.map((element)=>(
                        <p className={estilos.Parrafo}>{element.name}</p>
                    ))
                }
            </section>
        </main>
    );
}

export default Categorias;