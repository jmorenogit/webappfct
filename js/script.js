//******************************* CUADRO BÚSQUEDA  ************************************//
function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

//******************************* ORDENAR COLUMNA TABLA  ************************************//
window.onload = function() {
  // Table headers
  document.querySelectorAll('th').forEach((elem) => {
    elem.addEventListener('click', headerClick);
  });
};

function headerClick(e) {
  // 'this' keyword can be used. 'e.currentTarget' makes
  // it easier to interpret what is the target element.
  const headerCellEl = e.currentTarget;

  // If the column is NOT sortable then exit this function
  if (!headerCellEl.querySelector('.sortable')) {
    return;
  }

  // Navigate up from the header cell element to get
  // the '<table>' element.
  let table = headerCellEl.closest('table');

  // Navigate down from the 'table' element to get
  // all of the row elements in the table's body.
  let tableRows = table.querySelectorAll('tbody tr');

  const cellIndex = headerCellEl.cellIndex;

  let order_icon = headerCellEl.querySelector('.sortable');
  let order = encodeURI(order_icon.innerHTML).includes('%E2%86%91') ? 'desc' : 'asc';
  // Update the sort arrow
  order_icon.innerHTML = order === 'desc' ? '&darr;' : '&uarr;';

  let cellList = [];

  tableRows.forEach(rowEl => {
    // Value of each field
    let textContent = rowEl.children[cellIndex].textContent.toUpperCase().trim();

    const condensedHtml = condenseHTML(rowEl.outerHTML);

    cellList.push({
      textContent: textContent,
      rowHtml: condensedHtml
    });
  });

  const sortedCellList = sortCellList(cellList, order);

  let html = '';

  sortedCellList.forEach(entry => {
    html += entry.rowHtml;
  });

  table.getElementsByTagName('tbody')[0].innerHTML = html;
}

function condenseHTML(html) {
  return html.split('\n')
    .map(s => {
      return s.replace(/^\s*|\s*$/g, "");
    })
    .filter(x => {
      return x;
    })
    .join("");
}

function sortCellList(cellList, order) {
  if (order === 'desc') {
    return cellList.sort(function(a, b) {
      return a.textContent.localeCompare(b.textContent, undefined, {
        numeric: true,
        sensitivity: 'base'
      });
    });
  }

  return cellList.sort(function(a, b) {
    return b.textContent.localeCompare(a.textContent, undefined, {
      numeric: true,
      sensitivity: 'base'
    });
  });
}