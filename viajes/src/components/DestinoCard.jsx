
function DestinoCard({ destino, esFavorito, onFavorito, onDetalles, mostrarDetalles }) {
  return (
    <article className="destino-card">

      <img
        src={destino.imagen}
        alt={destino.nombre}
        className="destino-imagen"
      />

      <div className="destino-contenido">

        <span className="categoria">
          {destino.categoria}
        </span>

        <h3>{destino.nombre}</h3>

        <p className="ubicacion">
           {destino.pais}
        </p>

        <p className="precio">
          Desde ${destino.precio.toLocaleString("es-MX")} MXN
        </p>

        <div className="botones">

          <button
            className="btn-favorito"
            onClick={onFavorito}
          >
            {esFavorito ? "♥ Quitar favorito" : "♡ Agregar favorito"}
          </button>

          <button
            className="btn-detalles"
            onClick={onDetalles}
          >
            {mostrarDetalles ? "Ocultar detalles" : "Ver detalles"}
          </button>

        </div>

        {mostrarDetalles && (
          <p className="descripcion">
            {destino.descripcion}
          </p>
        )}

      </div>
    </article>
  );
}

export default DestinoCard;