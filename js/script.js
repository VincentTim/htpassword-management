$(document).ready(function(){

    var template = $('#hidden-template').html();
    var templateAdd = $('#add-hidden-template').html();

    $(".delete-btn").click(function(e){
        e.preventDefault();
        if(confirm('Voulez-vous supprimer cet utilisateur')){
            $.ajax({
                url: 'of/delete.php',
                type: 'post',
                data: 'username=' + $(this).data('username') + '&file=' + $(this).data('file'),
                success: function(html){
                    window.location.reload();

                }
            })
        }
    })

    $('.add-customer').click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'of/addCustomer.php',
            type: 'post',
            data: $("#addCustomerForm").serialize(),
            success: function(html){
                window.location.reload();

            }
        })

    })

    /* Mise à jour d'un utilisateur */
    $(".update-btn").click(function(e){
        e.preventDefault();
        $(this).parent().append(template);
        $('#updateForm').find('input#username').val($(this).data('username'));
        $('#updateForm').find('input#file').val($(this).data('file'));

    })

    $(document).on('click', '.update-user', function(e){
        e.preventDefault();
        $.ajax({
            url: 'of/add.php',
            type: 'post',
            data: $("#updateForm").serialize(),
            success: function(html){
                window.location.reload();

            }
        })
    })

    clear('.clear-update-user');

    /* Ajout d'un utilisateur */
    $(".add-user-btn").click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).parent().append(templateAdd);
        $('#addForm').find('input#file').val($(this).data('file'));

    })

    $(document).on('click', '.add-user', function(e){
        e.preventDefault();
        $.ajax({
            url: 'of/add.php',
            type: 'post',
            data: $("#addForm").serialize(),
            success: function(html){
                window.location.reload();
            }
        })
    })

    clear('.clear-add-user');

    $('.list-header').click(function(e){
        e.preventDefault();

        if($(this).hasClass('open')){
            $(this).next('.list-admin').slideUp();
        } else {
            $(this).next('.list-admin').slideDown();
        }
        $(this).toggleClass('open');
    })

})

function clear(bloc){
    $(document).on('click', bloc, function(e){
        e.preventDefault();
        $(this).parent().remove();
        if(bloc == '.clear-add-user'){
            console.log(bloc)
            $(bloc).parents('.list-group-item').find('.add-user-btn').toggleClass("active");
        }
    })
}