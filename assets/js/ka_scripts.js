var $ = jQuery;

$(function() {
  var tableRows = $("#sortable tbody tr"); //find all the rows
  var rowValues = {};
  tableRows.each(function() {
    var rowValue = $(this).find(".ka-content").html();
    if (!rowValues[rowValue]) {
      var rowComposite = new Object();
      rowComposite.count = 1;
      rowComposite.row = $(this).find(".ka-content");
      rowComposite.color = "yellow";
      rowValues[rowValue] = rowComposite;
    } else {
      var rowComposite = rowValues[rowValue];
      rowComposite.count++;
      $(this).find(".ka-content").css('backgroundColor', rowComposite.color);
      $(rowComposite.row).css('backgroundColor', rowComposite.color);
    }
  });
});

$(function() {
  var tableRows = $("#sortable tbody tr"); //find all the rows
  var rowValues = {};
  tableRows.each(function() {
    var rowValue = $(this).find(".keywordSynonyms").html();
    if (!rowValues[rowValue]) {
      var rowComposite = new Object();
      rowComposite.count = 1;
      rowComposite.row = $(this).find(".keywordSynonyms");
      rowComposite.color = "red";
      rowValues[rowValue] = rowComposite;
    } else {
      var rowComposite = rowValues[rowValue];
      rowComposite.count++;
      $(this).find(".keywordSynonyms").css('color', rowComposite.color);
      $(rowComposite.row).css('color', rowComposite.color);
    }
  });
}); 

function generatePDF() {
    // Choose the element that our invoice is rendered in.
    const element = document.getElementById("keyword-analyzer");
    // Choose the element and save the PDF for our user.
    html2pdf()
	  .set({html2canvas:  { scale: 4 }})
      .from(element)
      .save();
  }