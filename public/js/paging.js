var previous = [];

$(function(){
    previous.push( $('#pages').find('.start').prop('id') );
});


function goto(destination, forward){

    if(destination == null){
        destination = previous.pop();
    }

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
    var target  = pages.children('#'+destination);

    if(target.prop('id') != current.prop('id')){

        if(forward){
            //Add the current page to the stack of previous pages
            previous.push(current.prop('id'));
        }

        //Clean up old classes so they don't mess up this new transition
        pages.children().removeClass('start page_in_forward page_in_backward page_out_forward page_out_backward');

        if(forward){
            //Scroll the target page to its top
            target.find('article').find('ul, div').prop({ scrollTop: 0 });
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
                current.css('z-index',  200);
                target.css('z-index',   300);
            }
            else{
                current.css('z-index',  200);
                target.css('z-index',   300);
            }
        }
    }
}