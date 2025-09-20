async function caricaCSV(file) {
    // Pulisce la tabella prima di ricaricarla
    document.getElementById("intestazione").innerHTML = "";
    document.getElementById("contenuto").innerHTML = "";

    // Legge il file CSV scelto
    const response = await fetch(file);
    const testo = await response.text();

    // Divide il CSV in righe
    const righe = testo.split("\n").map(r => r.trim()).filter(r => r.length > 0);

    // Intestazioni
    const intestazioni = righe[0].split(",");
    const headRow = document.getElementById("intestazione");
    intestazioni.forEach(col => {
        const th = document.createElement("th");
        th.textContent = col;
        headRow.appendChild(th);
    });

    // Dati
    const tbody = document.getElementById("contenuto");
    righe.slice(1).forEach(riga => {
        const valori = riga.split(",");
        const tr = document.createElement("tr");
        valori.forEach(val => {
            const td = document.createElement("td");
            td.textContent = val;
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });
}

// Quando la pagina si apre, carica di default la Serie A
caricaCSV("seriea.csv");
