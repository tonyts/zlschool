$(document).ready(function(){
	/*Top Navigation Drop Down*/
	$('.navLv1 > li').hover(
		function(){
			var subList = $(this).find('.navLv2 > li');
			if(subList.length > 0){
				var _height = subList.length * 30;
				$(this).find('.navLv2Container').stop().animate({height: _height, opacity: 1}, 200 );
			}
		},
		function(){
			$(this).find('.navLv2Container').stop().animate({height: 0, opacity: 0}, 500 );
		}
	)

	/*3D URL*/
    linkify( '.readMore' );
    linkmr('.subNav a, .postList a');
})

function linkify( selector ) {
	var supports3DTransforms =  document.body.style['webkitPerspective'] !== undefined || document.body.style['MozPerspective'] !== undefined;
    if( supports3DTransforms ) {
        
        var nodes = document.querySelectorAll( selector );

        for( var i = 0, len = nodes.length; i < len; i++ ) {
            var node = nodes[i];

            if( !node.className || !node.className.match( /roll/g ) ) {
                node.className += ' roll';
                node.innerHTML = '<span data-title="'+ node.text +'">' + node.innerHTML + '</span>';
            }
        };
    }
}

function linkmr( selector ) {
    $(selector).hover(
    	function(){
    		$(this).stop().animate({'margin-left': '5px'},200);
    	},
    	function(){
    		$(this).stop().animate({'margin-left': '0px'},200);
    	}
	)
}