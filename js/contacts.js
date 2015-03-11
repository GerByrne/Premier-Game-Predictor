// Add a class to top-level list items.
$(document).ready(function() {
  $('#other-links > li').addClass('horizontal');
  $('#other-links li:not(.horizontal)').addClass('sub-level');
});

// Add a class to links.
$(document).ready(function() {
  $('a[href^=mailto:]').addClass('mailto');
  $('a[href$=.docx]').addClass('wordlink');
    
  $('a').filter(function() {
    return this.hostname && this.hostname != location.hostname;
  }).addClass('external');
});

// Give classes to even and odd table rows for zebra striping.
$(document).ready(function() {
  // $('tr:odd').addClass('alt');
  $('tr:nth-child(even)').addClass('alt');

  $('td:contains(Henry)').nextAll().andSelf().addClass('highlight');//.siblings()
  $('th').parent().addClass('table-heading');
});
