$(function() {
    // get table where id = 'theList' and even rows
    // Even rows are bright green / odd rows are dark green
        $("#windowsList tr:even").addClass("stripe1");
        $("#windowsList tr:odd").addClass("stripe2");

	// hover takes 2 functions, when mouse enters and when mouse exits
        $("#windowsList tr").hover(
            function() {
            // toggleclass adds an element on if not there and takes it off if there.
            // ie highlights when mouse over it and removes when mouse is not over it
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
    