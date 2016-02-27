jQuery(document).ready(function($){

  

   $('button.image-upload').click(function(){
   

   	tb_show('', 'media-upload.php?post_id=35&type=image&TB_iframe=1');
    

   	return false;
   });

  window.send_to_editor = function(html){
  	
  	var imagesrc = $('img', html).attr('src');
    
   $('.upload_class').val(imagesrc);
   $('.MyClass').attr('src', imagesrc);
   var imgattr = $('.MyClass').attr('src');
   if(imgattr){
       $('.MyClass').show();
       $('button.delete-image').show();
  }
   
  	tb_remove();
  }

  $('button.delete-image').click(function(){
   
    $('.upload_class').val('');
    $('.MyClass').hide();
    $('button.delete-image').hide();

    return false;
  });

});