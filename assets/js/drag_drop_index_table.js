$(function () {
  function saveColumnOrder() {
    var columnOrder = $(".sortableTable__header > th")
      .map(function () {
        return $(this).data("col");
      })
      .get();
    localStorage.setItem("columnOrder", JSON.stringify(columnOrder));
  }

  // Function to load the column order from local storage
  function loadColumnOrder() {
    var columnOrder = localStorage.getItem("columnOrder");
    if (columnOrder) {
      columnOrder = JSON.parse(columnOrder);
      // Rearrange the table headers based on the stored order
      columnOrder.forEach(function (colData) {
        var th = $(".sortableTable__header > th").filter(function () {
          return $(this).data("col") === colData;
        });
        if (th.length > 0) {
          $(".sortableTable__header").append(th);
        }
      });
      // Rearrange the table body columns based on the stored order
      columnOrder.forEach(function (colData) {
        var cells = orderedValuesOfCol(colData);
        tableRows().each(function (idx) {
          var matchingCell = cells[idx];
          $(this).append(matchingCell);
        });
      });
    }
  }

  // Initialize the table with the stored column order
  loadColumnOrder();

  $(".sortableTable__header > th").dblclick(function (event) {
    dehydrateColumn(event);
  });

  $(".sortableTable__header")
    .sortable({
      placeholder: "placeholder",
      items: "> .value",
      helper: "clone",
      revert: 150,
      axis: "x",
      start: function (event, ui) {
        ui.placeholder.width(ui.item.width());
      },
      stop: function (event, ui) {
        sortcells(ui.item);
        saveColumnOrder();
      },
    })
    .disableSelection();
});

function dehydrateColumn(event) {
  var tar = $(event.target);
  var colData = tar.data("col");

  if (!colData) {
    return;
  }

  var matchingCells = orderedValuesOfCol(colData);
  var store = {
    header: colData,
    values: matchingCells.map(function (elem) {
      return elem.clone(true);
    }),
  };
  var btn = $("<button>")
    .text(title(colData))
    .data("column", store)
    .appendTo($(".sortableTable__discard"))
    .click(function (event) {
      hydrateColumn(event);
    });

  tar.remove();
  $(matchingCells).each(function (idx, elem) {
    elem.remove();
  });
}

function hydrateColumn(event) {
  var dat = $(event.target).data();
  var values = dat.column.values;
  var head = dat.column.header;
  var th = $("<th>")
    .text(title(head))
    .attr("data-col", head)
    .addClass("value")
    .addClass("ui-sortable-handle")
    .dblclick(function (event) {
      dehydrateColumn(event);
    });
  $(".sortableTable__header").append(th);
  event.target.remove();

  tableRows().each(function (idx) {
    $(this).append(values[idx]);
  });
}

function orderedValuesOfCol(colName) {
  var ret = [];
  tableRows().each(function (idx, row) {
    var cellValue = getMatchingCell($(this), colName);
    ret.push(cellValue);
  });
  return ret;
}

function sortcells(item) {
  var newIndex = $(".sortableTable__header").children().index(item);
  var column = item.data("col");

  tableRows().each(function (idx, row) {
    var matchingDataCol = getMatchingCell($(this), column);
    moveTo($(this), newIndex, $(matchingDataCol));
  });
}

function getMatchingCell(container, columnData) {
  var ret = container
    .children()
    .filter(function () {
      return $(this).data("col") === columnData;
    })
    .first();
  return ret;
}

function moveTo(container, index, element) {
  var movingLeft = index < element.index();
  elementAtGivenIndex = container.children().eq(index);
  if (movingLeft) {
    elementAtGivenIndex.before(element);
  } else {
    elementAtGivenIndex.after(element);
  }
}

function tableRows() {
  return $(".sortableTable__body > tr");
}

function title(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}
