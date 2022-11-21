$(function(){

    $('.toast').toast('show');
    $('.editor').trumbowyg({
        svgPath: $('base').attr('href')+'/node_modules/trumbowyg/dist/ui/icons.svg'
    });

    $('.delete').click(function(e){
        e.preventDefault();

        if(confirm('Are you sure want to delete this item?')){
            $(this).parent('form').submit();
        }
    });

    $('#images').change(function(){
        let files = document.querySelector('#images').files

        $('#images-container').html('');

        for(let file of files){
            let fr = new FileReader();

            fr.readAsDataURL(file)

            fr.onload=function(e){
                let img = e.target.result;

                $('#images-container').append('<div class="col-4 mt-3"><img src="'+img+'" class="img-fluid"></div>');
            }
        }
    });

});
