let currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"

$(()=>{
    $.ajax({
        url: currentFilePath + "../server/adminHome.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
          console.log(response)
          pieChart(d3.select("#pieChart"), response['flyCompanyNumber'].map(item => [item.numeroVoli, item.compagnia]))
          histogramChart(d3.select("#arrivalHistogramChart"), response['arrivalHourModa'].map(item => [item.FasciaOrariaArrivo, item.NumeroVoliArrivo]))
          histogramChart(d3.select("#departureHistogramChart"), response['departureHourModa'].map(item => [item.FasciaOrariaPartenza, item.NumeroVoliPartenza]))
        },
        error: function(xhr, status, error) {
          console.error("Errore nella richiesta:", error)
        }
    })
})

let pieChart = (div, data, height = 400 , width = 400) =>{
  let radius = Math.min(width, height) / 2

  let svg = div.append("svg")
  .attr("width", width)
  .attr("height", height)

  //create group element to appen piechart
  let g = svg.append("g")
  .attr("transform", "translate(" + radius + "," + radius + ")")

  let color = d3.scaleOrdinal(d3.schemeCategory10)

  let pie = d3.pie().value((d)=>{
    return d[0]
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
  .attr("stroke-width", 2) // Imposta la larghezza del contorno

  arc.append("g")
  .attr("transform", function (d) {
    // Calcola il punto medio dell'arco
    let centroid = path.centroid(d)
    // Sposta il testo verso il punto medio e aggiungi uno spazio di 10 pixel
    centroid[0] *= 1.5 // Moltiplica la coordinata x per spostare il testo più lontano dal centro
    centroid[1] *= 1.5 // Moltiplica la coordinata y per spostare il testo più lontano dal centro
    return "translate(" + centroid + ")"
  })
  .append("text")
  .attr("text-anchor", "middle")
  .text(function (d) {
    return d.data[1] // Sostituisci "compagnia" con il nome appropriato per le etichette dei tuoi dati
  })
  .append("tspan") // Aggiungi un nuovo elemento <tspan> per il secondo testo
  .attr("dy", "1.3em") // Sposta il secondo testo di una riga sotto il primo
  .attr("dx", (d)=>{
    return d.data[1].length * 5 * -1
  }) // Sposta il secondo testo di 10 pixel verso sinistra
  .text(function (d) {
    return d.data[0] // Sostituisci "count(*)" con il nome appropriato per le etichette dei tuoi dati
  }) 
}

let histogramChart = (div, data, height = 450, width = 550) => {
  let margin = { top: 20, right: 20, bottom: 30, left: 40 }
  
  // Calcola il valore massimo sull'asse delle y
  let maxCount = d3.max(data, function(d) {
    return d[1]
  })

  // Scala per l'asse delle x (fascia oraria)
  let xScale = d3
    .scaleBand()
    .domain(data.map(function(d) {
      return d[0]
    }))
    .range([margin.left, width - margin.right])
    .padding(0.25)

  // Scala per l'asse delle y (numero di voli)
  let yScale = d3
    .scaleLinear()
    .domain([0, maxCount])
    .range([height - margin.bottom, margin.top])

  // Crea l'elemento SVG dell'istogramma
  let svg = div
    .append("svg")
    .attr("width", width)
    .attr("height", height)

  // Aggiungi le barre all'istogramma
  svg.selectAll("rect")
    .data(data)
    .enter()
    .append("rect")
    .attr("x", function(d) {
      return xScale(d[0])
    })
    .attr("y", function(d) {
      return yScale(d[1])
    })
    .attr("width", xScale.bandwidth())
    .attr("height", function(d) {
      return height - margin.bottom - yScale(d[1])
    })
    .attr("fill", function(_, i) {
      return d3.schemeCategory10[i % 10]
    })

  // Aggiungi i valori come testo sopra le barre
  svg.selectAll("text")
    .data(data)
    .enter()
    .append("text")
    .text(function(d) {
      return d[1]
    })
    .attr("x", function(d) {
      return xScale(d[0]) + xScale.bandwidth() / 2
    })
    .attr("y", function(d) {
      return yScale(d[1]) - 5
    })
    .attr("text-anchor", "middle")
    .attr("font-size", "12px")
    .attr("fill", "white")

    // Aggiungi gli assi
    let xAxis = d3.axisBottom(xScale)
    let yAxis = d3.axisLeft(yScale)

    let gX = svg.append("g")
      .attr("transform", "translate(0," + (height - margin.bottom) + ")")
      .call(xAxis)

    gX.selectAll("path, line")
      .style("stroke", "white")

    gX.selectAll("text")
      .style("fill", "white")
      .style("font-size", "14px")

    let gY = svg.append("g")
      .attr("transform", "translate(" + margin.left + ",0)")
      .call(yAxis)

    gY.selectAll("path, line")
      .style("stroke", "white")

    gY.selectAll("text")
      .style("fill", "white")
      .style("font-size", "14px")



}
