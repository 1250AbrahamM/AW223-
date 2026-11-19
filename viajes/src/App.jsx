
import { useState } from "react";
import DestinoCard from "./components/DestinoCard";
import "./App.css";

function App() {

 
  const destinos = [


    {
      id: 3,
      nombre: "Tokio",
      pais: "Japón",
      categoria: "Ciudad",
      precio: 25000,
      imagen: "https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=800",
      descripcion: "Explora una ciudad que combina tecnología, tradición y cultura japonesa."
    },
    {
      id: 4,
      nombre: "Nueva York",
      pais: "Estados Unidos",
      categoria: "Ciudad",
      precio: 22000,
      imagen: "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800",
      descripcion: "Visita Times Square, Central Park y disfruta de sus grandes rascacielos."
    }
  ];

  
  const [busqueda, setBusqueda] = useState("");
  const [favoritos, setFavoritos] = useState([]);
  const [soloFavoritos, setSoloFavoritos] = useState(false);
  const [detallesAbiertos, setDetallesAbiertos] = useState([]);

 
  const cambiarFavorito = (id) => {
    if (favoritos.includes(id)) {
      setFavoritos(favoritos.filter(favorito => favorito !== id));
    } else {
      setFavoritos([...favoritos, id]);
    }
  };

 
  const cambiarDetalles = (id) => {
    if (detallesAbiertos.includes(id)) {
      setDetallesAbiertos(
        detallesAbiertos.filter(detalle => detalle !== id)
      );
    } else {
      setDetallesAbiertos([...detallesAbiertos, id]);
    }
  };

  const destinosFiltrados = destinos.filter(destino => {

    const coincideBusqueda =
      destino.nombre.toLowerCase().includes(busqueda.toLowerCase()) ||
      destino.pais.toLowerCase().includes(busqueda.toLowerCase());

    const coincideFavorito =
      !soloFavoritos || favoritos.includes(destino.id);

    return coincideBusqueda && coincideFavorito;
  });

  return (
    <div className="app">

      {}
      <header className="header">
        <h2> TravelApp</h2>

        <nav>
          <a href="#inicio">Inicio</a>
          <a href="#destinos">Destinos</a>
          <a href="#favoritos">Favoritos</a>
        </nav>
      </header>

      <main className="contenedor" id="inicio">

        {/* Banner */}
        <section className="banner">
          <h1>Descubre tu próximo destino</h1>
          <p>Explora lugares increíbles y planea tus próximas vacaciones.</p>
        </section>

        {/* Contador de favoritos */}
        <section className="contador" id="favoritos">
          <div>
            <h3>Destinos favoritos</h3>
            <p>Tu próxima aventura comienza aquí.</p>
          </div>

          <strong>{favoritos.length}</strong>
        </section>

        {/* Buscador */}
        <section className="explorar" id="destinos">

          <h2>Explora destinos turísticos</h2>

          <input
            type="text"
            placeholder="Buscar destino turístico..."
            value={busqueda}
            onChange={(e) => setBusqueda(e.target.value)}
          />

          <button
            className="btn-filtro"
            onClick={() => setSoloFavoritos(!soloFavoritos)}
          >
            {soloFavoritos ? "Mostrar todos" : "Mostrar favoritos"}
          </button>

        </section>

        {/* Tarjetas */}
        <section className="destinos-grid">

          {destinosFiltrados.length > 0 ? (

            destinosFiltrados.map(destino => (

              <DestinoCard
                key={destino.id}
                destino={destino}
                esFavorito={favoritos.includes(destino.id)}
                onFavorito={() => cambiarFavorito(destino.id)}
                onDetalles={() => cambiarDetalles(destino.id)}
                mostrarDetalles={detallesAbiertos.includes(destino.id)}
              />

            ))

          ) : (

            <p className="sin-resultados">
              No se encontraron destinos turísticos.
            </p>

          )}

        </section>

      </main>

    </div>
  );
}

export default App;