document.addEventListener('DOMContentLoaded', function() {
  fetch('CommunityDatabase.csv')
    .then(response => response.text())
    .then(text => {
      const rows = text.trim().split('\n');
      const table = document.createElement('table');
      rows.forEach((row, i) => {
        const tr = document.createElement('tr');
        row.split(',').forEach(cell => {
          const td = document.createElement(i === 0 ? 'th' : 'td');
          td.textContent = cell;
          tr.appendChild(td);
        });
        table.appendChild(tr);
      });
      document.getElementById('database').appendChild(table);
    });
});