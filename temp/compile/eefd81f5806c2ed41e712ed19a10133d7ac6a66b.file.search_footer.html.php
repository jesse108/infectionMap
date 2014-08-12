<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:55:51
         compiled from "D:\develop\web\www\infectionMap\template\block\search_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:2938953ea332f83b103-84468157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eefd81f5806c2ed41e712ed19a10133d7ac6a66b' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\block\\search_footer.html',
      1 => 1407858944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2938953ea332f83b103-84468157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ea332f846c80_06075824',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ea332f846c80_06075824')) {function content_53ea332f846c80_06075824($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
  $.widget( "custom.catcomplete", $.ui.autocomplete, {
    _create: function() {
      this._super();
      this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
    },
    _renderMenu: function( ul, items ) {
      var that = this;
      ul.addClass('searchTip');
      $.each( items, function( index, item ) {
        var li;
        li = that._renderItemData( ul, item );
        if ( item.category ) {
          li.addClass(item.category);
        }
      });
      ul.append( "<li class='add'><a href='/location/update.php'>添加新地点</a></li>" );
    }
  });

  
$(function() {
	var data = [
      { label: "北京", category: "address" },
      { label: "上海", category: "address" },
      { label: "天津", category: "address" },
    ];
 
    $( "#keyword" ).catcomplete({
      delay: 0,
      source: data
    });
      
});

function search_submit(type){
	var key = $("#search_form input[name=keyword]").val();
	if(!key){
		return false;
	}
	$("#search_form input[name=type]").val(type);
	$("#search_form").submit();
}
</script><?php }} ?>