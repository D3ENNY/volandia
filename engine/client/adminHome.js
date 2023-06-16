let currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"

$(()=>{
    $.ajax({
        url: currentFilePath + "../server/adminHome.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
          console.log(response);
          pieChart(d3.select("#pieChart"), response)
        },
        error: function(xhr, status, error) {
          console.error("Errore nella richiesta:", error);
        }
    })
})

let pieChart = (div, data, height = 300, width = 500) =>{
  let radius = Math.min(width, height) / 2

  let svg = div.append("svg")
  .attr("width", width)
  .attr("height", height)

  //create group element to appen piechart
  let g = svg.append("g")
  .attr("transform", "translate(" + radius + "," + radius + ")")

  let color = d3.scaleOrdinal(d3.schemeCategory10);

  let pie = d3.pie().value((d)=>{
    return d['count(*)']
  })

  let path = d3.arc()
  .outerRadius(radius)
  .innerRadius(0)

  let arc = g.selectAll("arc")
  .data(pie(data))
  .enter()
  .append("g")
  

  arc.append("path")
  .attr("d", path)
  .attr("fill", (d, i)=>{
    return color(i)
  })
  .attr("stroke", "white") // Aggiungi un contorno bianco intorno a ogni spicchio
  .attr("stroke-width", 2); // Imposta la larghezza del contorno

  arc.append("g")
  .attr("transform", function (d) {
    // Calcola il punto medio dell'arco
    let centroid = path.centroid(d);
    // Sposta il testo verso il punto medio e aggiungi uno spazio di 10 pixel
    centroid[0] *= 1.5; // Moltiplica la coordinata x per spostare il testo più lontano dal centro
    centroid[1] *= 1.5; // Moltiplica la coordinata y per spostare il testo più lontano dal centro
    return "translate(" + centroid + ")";
  })
  .append("text")
  .attr("text-anchor", "middle")
  .text(function (d) {
    return d.data.compagnia; // Sostituisci "compagnia" con il nome appropriato per le etichette dei tuoi dati
  })
  .append("tspan") // Aggiungi un nuovo elemento <tspan> per il secondo testo
  .attr("dy", "1.3em") // Sposta il secondo testo di una riga sotto il primo
  .attr("dx", (d)=>{
    return d.data.compagnia.length * 5 * -1
  }) // Sposta il secondo testo di 10 pixel verso sinistra
  .text(function (d) {
    return d.data['count(*)']; // Sostituisci "count(*)" con il nome appropriato per le etichette dei tuoi dati
  }); 
}
