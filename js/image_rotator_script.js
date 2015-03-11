$(function() 
   {
    setInterval("rotateImages()", 4500);				 // create the image rotator and rotate every 8 seconds
   });

   function rotateImages() 
   {
    var oCurPhoto = $("#imageRotator div.current");		// get the current photo, ie within photoshow the current div
	var oNxtPhoto = oCurPhoto.next();		                    // get the next sibling to div.current, ie leaf

    // if there is no next photo, ie at 4th photo put nextPhoto = 1st photo in div
    if (oNxtPhoto.length == 0)
        oNxtPhoto = $("#imageRotator div:first");

    oCurPhoto.removeClass('current').addClass('previous');		// remove the current photo and add the previous photo

    // set the css start of with opacity 0 so invisible, put it on top  and animate it up to visible
    // over 2 seconds
    oNxtPhoto.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, 2000,
    function() 
    {
     oCurPhoto.removeClass('previous');						// remove currents photo previous class
    });
  }
