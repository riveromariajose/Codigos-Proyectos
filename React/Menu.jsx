import { NavLink } from "react-router-dom";
const Menu = () => {
    const apariencia={
        Nav:"flex justify-between items-center ml-[20px] mt-[20px] mb-[30px] font-['Amarante'] font-bold",
        Span:"text-[30px] hover:-translate-y-1 hover:scale-110",
        Div:"flex justify-end mr-[20px] gap-6"
    }

    return ( 
        <nav className={apariencia.Nav}>
            <h1 style={{fontSize:"50px"}}>Lista de Anime</h1>
            <div className={apariencia.Div}>
                <span className={apariencia.Span}>
                    <NavLink to="/">Lista de Anime</NavLink>
                </span>
                <span className={apariencia.Span}>
                    <NavLink to="/Categorias">Categorias</NavLink>
                </span>
                <span className={apariencia.Span}>
                    <NavLink to="/Animes">Animes</NavLink>
                </span>
            </div>
        </nav>
    );
}

export default Menu;