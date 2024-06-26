const subscriptionStatus = document.querySelectorAll('.unsubscribe');

subscriptionStatus.forEach((el) => {
    el.addEventListener('click', (e) => {
        e.preventDefault();
        var getId = el.getAttribute('href').split('=').pop();
        const data = {id: getId};

        fetch('../dashboard/unsubscribe.php', {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Accept' : 'application/json',
                'Content-Type' : 'application/json'   
            }
            }).then((response) => {
                return response.json
            }).then((res) => {
                if(res.status === 201){
                    console.log('post sucessful');
                } 
            }).catch((error) => {
                console.log(error);
            })
            
            location.reload();
    })
})