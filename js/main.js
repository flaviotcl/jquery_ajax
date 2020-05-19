$(function(){
    $('#AjaxRequest').submit(function(){
        
        /**
        *   $(this).serialize(); retorna um Array simples.
        * 
        */
       let form = $(this).serialize();
        //console.log(form);


       /**
        *   $(this).serializeArray(); retorna um Array de Objetos.
        * 
        */
       let formArray = $(this).serializeArray();
       //console.log(formArray);  
      

       
       
       let request = $.ajax({
           method: "POST",
           url: "post.php",
           data: form,
           dataType: "json"
           //data: formArray
           /*** Forma + trabalhosa de buscar os campos do Form ***/
           /***
            *   data:{
            *          name: $(':input[name=name]').val(),    
            *          email: $(':input[name=email]').val(),   
            *          tel: $('input[name=tel]').val()
            *       }
            */  
       });

       /***  .done é executado qdo a requisação retorna com sucesso. ***/
       request.done(function(obj){
           

            /***
             * O laço for...in  interage sobre propriedades enumeradas de um objeto, na ordem original de inserção.  
             * O laço pode ser executado para cada propriedade distinta do objeto.
            */
           
            for( let prop in obj){
                   $(':input[name='+prop+']').val(obj[prop]);
            }
            
        });
        /*** .fail em caso de falha. */
       request.fail(function(e){
            console.log("Fail");
            console.log(e);
       })
       /*** .always é executado em todos os casos. */
       request.always(function(e){
            console.log("Always");
            console.log(e);
       })
       return false;
    });
});

/***
 * 
 *      $(document).ready(function(){
 *              $('#AjaxRequest').submit(function(){
 *                   //ajax
 *                   alert("ok");
 *                   return false;
 *               });
 *       });
 * 
 */

