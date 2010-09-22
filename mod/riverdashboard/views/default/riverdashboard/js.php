<?php
/**
 * js for ImprovedRiverdashboard
 *
 * @package ImprovedRiverdashboard
 */
/**
 * @author Snow.Hellsing <snow.hellsing@firebloom.cc>
 * @copyright FireBloom Studio
 * @link http://firebloom.cc
 */
global $CONFIG;
?>
<script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(function(){
            toggleImgSize();
            addComment();
            processCommentPageLink();
            reloadComments();
            preloadImgs();
        });
    });

    function toggleImgSize(){
        $('.river_object_image_create .goto_full').before('<a href="" class="toggle_size"><?php echo elgg_echo('river:image:toggle_size'); ?></a> - ');
		
        $('.river_object_image_create .toggle_size').click(function(){
            var e = this.nextSibling;
            while('IMG' != e.nodeName){
                e = e.nextSibling;
            }
            var size = e.src.substr(e.src.length-5,5);
            var src = e.src.substr(0,e.src.length-5);
            if('small' == size){
                e.src = '../../_graphics/ajax_loader.gif';
                e.src = src+'large';
            }else{
                e.src = '../../_graphics/ajax_loader.gif';
                e.src = src+'small';
            }

            return false;
        });
    }
    /**
     * load page via ajax when click on comments page link
     */
    function processCommentPageLink(){
        $('.river_item .pagination a').click(function(eventObject){
            var annoff = this.href.split("=")[1];
			
            var guid = this.parentNode.parentNode.id.split('-')[1];
			
            var comment_div_id = '#river_item_comments-'+guid;
			
            var url = '../riverdashboard/get_comments';
			
            $(comment_div_id).load(url,{'guid':guid,'annoff':annoff},processCommentPageLink);
			
            return false;
        });
    }
    /**
     * post comment via ajax and reload comments
     */
    function addComment(){
        $('.river_item .item_comments form').submit(function(eventObject){
            for(i in this.elements){
                switch(this.elements[i].name){
                    case 'entity_guid':
                        var guid = this.elements[i].value;
                        break;
					
                    case 'generic_comment':
                        var comment = this.elements[i].value;
                        this.elements[i].value = "";
                        break;
                }
            }
			
            if(guid){
                var url = '../riverdashboard/add_comment';
				
                var comment_div_id = '#river_item_comments-'+guid;
                $(comment_div_id).load(url,{'entity_guid':guid,'generic_comment':comment},processCommentPageLink);
            }
		
            return false;
        });
    }
    /**
     * reload comments to avoid elgg's pagenation bug
     */
    function reloadComments(){
        $('.river_item .item_comments').each(function(){
            var guid = this.id.split('-')[1];
            var url = '../riverdashboard/get_comments';
            $(this).load(url,{'guid':guid},processCommentPageLink);
        });
    }
    /**
     * load some img before other img begins to load
     * for example the loading icon
     */
    function preloadImgs(){
        $('body').prepend('<img src="../../_graphics/ajax_loader.gif" class="preloadImg"/>');
    }
</script>