document.getElementById('caricaBtn').addEventListener('click', () => {
  fetch('TabellaTennisCommunity.csv')
    .then(response => {
      if (!response.ok) {
        throw new Error('Errore nel caricamento del file CSV');
      }
      return response.text();
    })
    .then(csvData => {
      parseCsv(csvData);
    })
    .catch(error => {
      alert(error.message);
    });
});

function parseCsv(csvData) {
  const lines = csvData.split('\n').filter(line => line.trim() !== '');
  const table = document.createElement('table');
  table.border = "1";

  lines.forEach((line, index) => {
    const cells = line.split(',');
    const row = document.createElement('tr');

    cells.forEach(cellData => {
      const cell = document.createElement(index === 0 ? 'th' : 'td');
      cell.textContent = cellData.trim();
      row.appendChild(cell);
    });

    table.appendChild(row);
  });

  const container = document.getElementById('csvContainer');
  container.innerHTML = '';
  container.appendChild(table);
}
