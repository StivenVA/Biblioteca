const ctx = document.getElementById('myChart').getContext("2d");

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: nombres,
      datasets: [{
        label: 'Cantidad de prestamos por lector en los últimos 7  días',
        data: cant,
        borderWidth: 1,
        cutout:'85%',
        borderRadius:'20'
      }]
    },
    options: {
      responsive:true,
      maintainAspectRatio:false,
    }
  });

  const graph = document.getElementById('cats').getContext("2d");

  new Chart(graph, {
    type: 'doughnut',
    data: {
      labels: cat,
      datasets: [{
        label: 'Cantidad de prestamos por lector en los últimos 30 días',
        data: pres,
        borderWidth: 1,
        cutout:'85%',
        borderRadius:'20'
      }]
    },
    options: {
      responsive:true,
      maintainAspectRatio:false
    }
  });

  const per = document.getElementById('per').getContext("2d");

  new Chart(per, {
    type: 'doughnut',
    data: {
      labels: salas,
      datasets: [{
        label: 'Porcentaje de solicitudes de prestamos por sala',
        data: porcentajes,
        borderWidth: 1,
        cutout:'85%',
        borderRadius:'20'
      }]
    },
    options: {
      responsive:true,
      maintainAspectRatio:false
    }
  });
