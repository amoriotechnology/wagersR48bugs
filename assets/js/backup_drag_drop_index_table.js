$(function() {
  $(".sortableTable__header > th").dblclick(function(event) {
    dehydrateColumn(event);
  });

  $(".sortableTable__header")
    .sortable({
      placeholder: "placeholder",
      items: "> .value",
      helper: "clone",
      revert: 150,
      axis: "x",
      start: function(event, ui) {
        ui.placeholder.width(ui.item.width());
      },
      stop: function(event, ui) {
        sortcells(ui.item);
      }
    })
    .disableSelection();
});

////////////////
// COLUMN HIDING
////////////////

function dehydrateColumn(event) {
  // Store column data in a button and remove column from the sortable table.
  var tar = $(event.target);
  var colData = tar.data("col");

  if (!colData) { return; }

  var matchingCells = orderedValuesOfCol(colData);
  var store = {
    header: colData,
    values: matchingCells.map(function(elem) {
      return elem.clone(true);
    })
  };
  var btn = $("<button>")
    .text(title(colData))
    .data("column", store)
    .appendTo($(".sortableTable__discard"))
    .click(function(event) {
      hydrateColumn(event);
    });

  tar.remove();
  $(matchingCells).each(function(idx, elem) {
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
    .dblclick(function(event) {
      dehydrateColumn(event);
    });
  $(".sortableTable__header").append(th);
  event.target.remove();

  tableRows().each(function(idx) {
    $(this).append(values[idx]);
  });
}

function orderedValuesOfCol(colName) {
  // Return all td elements matching a given th element.
  var ret = [];
  tableRows().each(function(idx, row) {
    var cellValue = getMatchingCell($(this), colName);
    ret.push(cellValue);
  });
  return ret;
}

/////////////////
// COLUMN SORTING
/////////////////

function sortcells(item) {
  // Move tds matching associated sorted th to the same index as the th.
  var newIndex = $(".sortableTable__header").children().index(item);
  var column = item.data("col");

  tableRows().each(function(idx, row) {
    var matchingDataCol = getMatchingCell($(this), column);
    moveTo($(this), newIndex, $(matchingDataCol));
  });
}

function getMatchingCell(container, columnData) {
  // Retrieve elment from a collection matching certain data attribute.
  var ret = container
    .children()
    .filter(function() {
      return $(this).data("col") === columnData;
    })
    .first();
  return ret;
}

function moveTo(container, index, element) {
  // Move an element to a certin index within a container.
  // Element is first removed from children(), then then inserted.
  // The length of children() may change in between.
  var movingLeft = index < element.index();
  elementAtGivenIndex = container.children().eq(index);
  if (movingLeft) {
    elementAtGivenIndex.before(element);
  } else {
    elementAtGivenIndex.after(element);
  }
}

//////////////
// UTILITY FNS
//////////////

function tableRows() {
  // Return all tr elements of the sortable table.
  return $(".sortableTable__body > tr");
}

function title(str) {
  // Capitalize first letter of a string.
  return str.charAt(0).toUpperCase() + str.slice(1);
}
