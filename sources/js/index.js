
// Data select
$('.btn-page').on("click", function (e) {
    $(this).toggleClass('blocked')
    let questionId = $(this).attr('data-qid')
    let responseId = $(this).attr('data-oid')
    // console.log('responseId', responseId)
    // console.log('optionId', optionId)
    let data = JSON.stringify({
        questionId: questionId,
        responseId: responseId
    })
    $.ajax({
        type:"POST", 
        url:"./ajax/serv.ajax.php",
        data:{SAVE: data},
        success:function(response){ 

            let buttons = $('.btn-page');
            let data = JSON.parse(response)
            buttons.each((i, e) => {
                if( $(e).attr('data-oid') ==  data.idResponse ) {
                    $(e).addClass(data.className)
                    $(e).addClass('effect')
                } else {
                    $(e).addClass('effect-incorrect')
                }
            })

            setTimeout( () => {
                // $('.cont-loader').toggleClass('active_loader')
                window.location.reload()
            }, 1200)

        },
    })
})

$('.btn-menu').on("click", function (e) {
    $($(this).parent()).parent().children(1).toggleClass('active')
})