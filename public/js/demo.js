

function goto(destination, forward, scrollToTop){

    var pages = $('#pages');

    //Determine in what way the pages should be moved
    var page_out = 'page_out_backward';
    var page_in  = 'page_in_backward';
    if(forward){
        page_out = 'page_out_forward';
        page_in  = 'page_in_forward';
    }

    //Select the current and target page
    var current = pages.children('.page_in_forward, .page_in_backward, .start');
    var target  = pages.children('.page_'+destination);

    //Clean up old classes so they don't mess up this new transition
    pages.children().removeClass('start page_in_forward page_in_backward page_out_forward page_out_backward');

    //Scroll the target page to its top
    if(scrollToTop){
        target.prop({ scrollTop: 0 });
    }

    //Hide the current page
    current.addClass(page_out);

    //Show the new page
    target.addClass(page_in);

    //Set focus to the new window, since the old one doesn't really disappear
    setTimeout(function(){

        //TODO: check if this is even needed, and if it can function without the timeout
        target.focus();
    }, 100);

    //Older browsers need a hand (this could be done in CSS but that would screw up the animated transitions for newer browsers)
    if(!Modernizr.cssanimations){
        if(!forward){
            current.css('z-index',  2);
            target.css('z-index',     3);
        }
        else{
            current.css('z-index',  2);
            target.css('z-index',     3);
        }
    }
}

$(function(){

    //If there is no support for CSS3 animations we'll have to show the login-page with javascript
    if(!Modernizr.cssanimations){
        var pages = $('#pages');
        pages   .find('.page_in').css('opacity', 1).css('top', 0);
    }
});