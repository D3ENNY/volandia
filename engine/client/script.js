$(()=>{
    const path = window.location.origin + "/progetti/volandia"

    $('#user').attr('src', path+'/assets/img/icon.jpg');

    $('#user').click(()=>{
        let element = $('#account')
        element.toggleClass('hidden')
    })

    $(window).scroll(()=>{
        if(!$("#account").hasClass('hidden'))
            $('#account').addClass('hidden')
    })

    $('#register').click(()=>{
        window.location.replace(path+'/pages/register.php')
    })

    $('#login').click(()=>{
        window.location.replace(path+'/pages/login.php')
    })

    $("#home").click(()=>{
        window.location.replace(path+'/index.php')
    })

    $("#adminPanel").click(()=>{
        window.location.replace(path+'/pages/admin.php')
    })

    $('#hamburger').click(()=>{ 
        $('#adminNav').toggleClass('hidden')
    })

    //--------------------------//

    $('#instagram').click(()=>{
        window.location.href ='https://www.instagram.com/d3enny_2004/'
    })

    $('#twitter').click(()=>{
        window.location.href = 'https://twitter.com/D3ENNY04'
    })

    $('#telegram').click(()=>{
        window.location.href = 'https://t.me/d3enny04'
    })
})
