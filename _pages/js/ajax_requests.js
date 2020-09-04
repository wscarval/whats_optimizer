    
    $('button.btn_newsletter').click(function(){
        var news_letter_email = $(this).attr('name').value
        $.ajax({
            method:'post',
            data:{'news_letter_email':news_letter_email},
            url:'teste.php'
        }).done(function(){
            alert('Cadastrado email: '+news_letter_email)
        })
    })
